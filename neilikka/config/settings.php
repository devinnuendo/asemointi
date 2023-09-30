<?php
defined('SETTINGS_ACCESS') || die('Direct access not permitted');

define("PROFILE_IMAGE_FOLDER", "img/photos/profiili");
define("PROFILE_IMAGE_SIZE", 2242880);

$allowed_images = ['gif', 'png', 'jpg', 'jpeg'];
$allowed_images_imploded = implode(", ", $allowed_images);

function randomString($length = 5)
{
    return "_" . bin2hex(random_bytes($length));
}

function generate_tokens()
{
    $selector = bin2hex(random_bytes(16));
    $validator = bin2hex(random_bytes(32));
    return [$selector, $validator, $selector . ':' . $validator];
}

function parse_token(string $token)
{
    $parts = explode(':', $token);
    if ($parts && count($parts) == 2) return $parts;
    return null;
}


function insert_rememberme_token(int $customer_id, string $selector, string $hashed_validator, string $expiry)
{
    $query = "INSERT INTO neil_rememberme_tokens(customer_id, selector, hashed_validator, expiry) VALUES(?,?,?,?)";
    $stmt = $GLOBALS['yhteys']->prepare($query);
    $stmt->bind_param('isss', $customer_id, $selector, $hashed_validator, $expiry);
    $result = $stmt->execute();
    $_SESSION['customer_id'] = $customer_id;
    return $result;
}


function find_rememberme_token(string $selector)
{
    $id = "";
    $selector = "";
    $hashed_validator = "";
    $customer_id = "";
    $expiry = "";

    $query =   "SELECT id, selector, hashed_validator, customer_id, expiry 
                FROM neil_rememberme_tokens
                WHERE selector = ? AND expiry >= now() LIMIT 1";
    $stmt = $GLOBALS['yhteys']->prepare($query);
    $stmt->bind_param('s', $selector);
    $stmt->execute();
    $stmt->bind_result($id, $selector, $hashed_validator, $customer_id, $expiry);
    $result = $stmt->fetch();
    return compact('id', 'selector', 'hashed_validator', 'customer_id', 'expiry');
}

function delete_rememberme_token(int $customer_id)
{
    $query = "DELETE FROM neil_rememberme_tokens WHERE customer_id = ?";
    $stmt = $GLOBALS['yhteys']->prepare($query);
    $stmt->bind_param('i', $customer_id);
    $result = $stmt->execute();
    $_SESSION['customer_id'] = null;
    return $result;
}


function find_user_by_token(string $token)
{
    $customer_id = "";
    $email = "";

    $tokens = parse_token($token);
    if (!$tokens) return null;
    $query =   "SELECT customer_id, email FROM neil_user u 
                INNER JOIN neil_rememberme_tokens ON customer_id = u.customer_id
                WHERE selector = ? AND expiry > now() LIMIT 1";
    $stmt = $GLOBALS['yhteys']->prepare($query);
    $stmt->bind_param('s', $tokens[0]);
    $stmt->execute();
    $stmt->bind_result($customer_id, $email);
    $result = $stmt->fetch();
    return compact('customer_id', 'email');
}


function token_is_valid(string $token)
{
    // parse the token to get the selector and validator [$selector, $validator] = parse_token($token);
    [$selector, $validator] = parse_token($token);
    $tokens = find_rememberme_token($selector);
    if (!$tokens) return false;
    $verified_token = password_verify($validator, $tokens['hashed_validator']);
    return $verified_token ? $tokens['customer_id'] : false;
}


function rememberme(int $customer_id, int $day = 30)
{
    [$selector, $validator, $token] = generate_tokens();
    delete_rememberme_token($customer_id);
    $expiry_seconds = time() + 60 * 60 * 24 * $day;
    $hash_validator = password_hash($validator, PASSWORD_DEFAULT);
    $expiry = date('Y-m-d H:i:s', $expiry_seconds);
    if (insert_rememberme_token($customer_id, $selector, $hash_validator, $expiry)) {
        /* Huom. httponly : true */
        setcookie('rememberme', $token, $expiry_seconds, "", "", false, true);
        /* Huom. tätä tarvitaan vain tokenin poistoon rememberme_tokens-taulusta */
        $_SESSION['customer_id'] = $customer_id;
    }
}


function secure_page($level)
{
    if (!session_id()) session_start();
    $loggedIn = loggedIn();
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
        $token = $_COOKIE['rememberme'] ?? '';
        if ($token) {
            $token = htmlspecialchars($token);
            if ($customer_id = token_is_valid($token)) {
                $query =   "SELECT customer_id, role, value FROM neil_user 
                            LEFT JOIN neil_roles r ON role = r.id
                            WHERE customer_id = '$customer_id'";
                $result = $GLOBALS['yhteys']->query($query);

                if ($result) {
                    $row = $result->fetch_assoc();
                    $customer_id = $row['customer_id'];
                    $role = $row['value'];

                    $_SESSION['loggedIn'] = $role;
                    $_SESSION['customer_id'] = $customer_id;
                    if ($loggedIn >= 4) {
                        return $loggedIn;
                    } else {
                        header("location: index.php");
                        exit;
                    }
                }
            }
        }
    }
    if ($level > 0 && $loggedIn >= $level) {
        return $loggedIn;
    } else {
        header("location: index.php");
        exit;
    }
    return $loggedIn;
}

function loggedIn()
{
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] > 0)
        return $_SESSION['loggedIn'];
    if ($token = $_COOKIE['rememberme'] ?? '') {
        $token = htmlspecialchars($token);
        if ($customer_id = token_is_valid($token)) {
            $_SESSION['customer_id'] = $customer_id;
            return true;
        }
    }
    return false;
}

function bonus()
{
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] >= 2)
        return true;
    else
        return false;
}

function employee()
{
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] >= 4)
        return true;
    else
        return false;
}

function supervisor()
{
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] >= 8)
        return true;
    else
        return false;
}

function admin()
{
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 16)
        return true;
    else
        return false;
}

$patterns['password'] = "/^.{10,}$/";
$patterns['password2'] = $patterns['password'];
$patterns['first_name'] = "/^[a-zåäöA-ZÅÄÖæÆøØß\pL'\-]+$/iu";
$patterns['last_name'] = $patterns['first_name'];
$patterns['name'] = "/^[a-zåäöA-ZÅÄÖæÆøØß\pL '\-]+$/iu";
$patterns['phone'] = "/^[0-9 ]{7,15}$/";
$patterns['email'] = "/^[\w]+[\w.+-]*@[\w-]+(\.[\w-]{2,})?\.[a-zA-Z]{2,}$/";
$patterns['image'] = "/^[^\s]+\.(jpe?g|png|gif)$/";
$patterns['remember_me'] = "/^remember_me$/";
$patterns['newsletter'] = "/^(Kyllä|Ei)$/";
$patterns['rolenumber'] = "/^(1|2|4|8|16)$/"; // 1 = customer, 2 = bonus, 4 = employee, 8 = supervisor, 16 = admin
$patterns['verified'] = "/^(0|1)$/";
$patterns['id'] = "/^[0-9]+$/";
$patterns['page'] = "/^[0-9]+$/";
$patterns['limit'] = "/^[0-9]+$/";
$patterns['search'] = "/^[a-zåäöA-ZÅÄÖæÆøØ0-9 '\-]+$/";
$patterns['sort'] = "/^[a-zåäöA-ZÅÄÖæÆøØ0-9 '\-]+$/";
$patterns['order'] = "/^(ASC|DESC)$/";
$patterns['date'] = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";
$patterns['time'] = "/^[0-9]{2}:[0-9]{2}$/";
$patterns['datetime'] = "/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}$/";

function pattern($field)
{
    return "pattern=\"" . trim($GLOBALS['patterns'][$field], "/") . "\"";
}

function pagination($search_parameters, $left_disabled, $right_disabled, $prev, $next, $last, $page, $class = "")
{
?>
    <nav aria-label="pagination" class="pagination <?= $class ?>">

        <a class="page-left tooltip <?= $left_disabled; ?>" href="?<?= $search_parameters; ?>&page=1#lista" aria-label="first" data-tooltip="1">
            <span aria-hidden="true">&laquo;</span>
        </a>
        <a class="page-left tooltip <?= $left_disabled; ?>" href="?<?= $search_parameters . '&page=' . $prev; ?>#lista" aria-label="previous" data-tooltip="<?= $prev ?>">
            <span aria-hidden="true">&#8592;</span>
        </a>
        <span class="page-number" aria-label="current page"><?= $page ?></span>
        <a class="page-right tooltip <?= $right_disabled; ?>" href="?<?= $search_parameters . '&page=' . $next; ?>#lista" aria-label="next" data-tooltip="<?= $next ?>">
            <span aria-hidden="true">&#8594;</span>
        </a>
        <a class="page-right tooltip <?= $right_disabled; ?>" href="?<?= $search_parameters . '&page=' . $last; ?>#lista" aria-label="last" data-tooltip="<?= $last ?>">
            <span aria-hidden="true">&raquo;</span>
        </a>

    </nav>
<?php
}

function product_li($filename, $row, $page)
{
    global $traLocal, $traCommon, $lang;
?>
    <li id="<?= $row['name'] ?>-<?= $row['color'] ?>">
        <?php
        ?> <a href="<?= $filename ?>.php?id=<?= $row['id'] ?>&page=<?= $page; ?>">
            <figure>
                <img src="img/photos/<?= $row['img_small'] ?>" alt="<?= $row['name'] ?>, <?= $row['color'] ?>" />
                <figcaption>
                    <div class="item-general">
                        <em><?= $row['name'] ?>, <?= $row['color'] ?></em>
                        <small>
                            <?php
                            // plants_cut tai plants_pot riippuen typestä:
                            ?>
                            <?= $traLocal['plants_' . $row['type']][$lang] ?>, <?= $traCommon['about'][$lang] ?> <?= $row['length'] ?> cm, <?= $row['amount'] . " " . $traCommon['pieces'][$lang] ?>
                        </small>
                        <strong><?= $row['price'] ?> &euro;</strong>
                    </div>
                </figcaption>
            </figure>
        </a>
    </li>
<?php }
