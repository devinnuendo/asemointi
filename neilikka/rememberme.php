<?php
defined('REMEMBERME_ACCESS') || die('Direct access not permitted');

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

    $query = "SELECT id, selector, hashed_validator, customer_id, expiry FROM neil_rememberme_tokens
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
    $query = "SELECT customer_id, email FROM neil_user u INNER JOIN neil_rememberme_tokens ON customer_id = u.customer_id
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


function secure_page()
{
    if (!session_id()) session_start();
    if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true) {
        $token = $_COOKIE['rememberme'] ?? '';
        if ($token) {
            $user = [];
            $token = htmlspecialchars($token);
            if ($customer_id = token_is_valid($token)) {
                //if (session_regenerate_id()) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['customer_id'] = $customer_id;
                return true;
                //}
            }
        }
        header("location: kirjaudu.php");
        exit;
    }
    return true;
}

function secure_page_admin()
{
    isset($_SESSION['customer_id']) ? $customer_id = $_SESSION['customer_id'] : $customer_id = 0;
    isset($_SESSION['admin']) ? $admin = $_SESSION['admin'] : $admin = 0;
    if (isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] === true) {
        $query = "SELECT customer_id, admin FROM neil_user WHERE customer_id = ? AND admin = ?";
        $stmt = $GLOBALS['yhteys']->prepare($query);
        $stmt->bind_param('ii', $customer_id, $admin);
        $stmt->execute();
        $result = compact('customer_id', 'admin');
        if ($result['admin'] == 1) {
            return true;
        } else {
            header("location: index.php");
            exit;
        }
    } else {
        header("location: kirjaudu.php");
        exit;
    }
}

function loggedIn()
{
    if (isset($_SESSION['loggedIn']) && $_SESSION["loggedIn"] === true)
        return true;
    if ($token = $_COOKIE['rememberme'] ?? '') {
        $token = htmlspecialchars($token);
        if ($customer_id = token_is_valid($token)) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['customer_id'] = $customer_id;
            //return $customer_id;
            return true;
        }
    }
    return false;
}

function admin()
{
    if (isset($_SESSION['admin']) && $_SESSION["admin"] === true)
        return true;
    else
        return false;
}
