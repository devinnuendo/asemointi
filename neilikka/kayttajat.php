<?php
include "sivuosat/top.php";
$loggedIn = secure_page(4);
$title = $traCommon['user_management'][$lang];
$titleClass = 'wide';
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
$script = 'lomake.js';
$css = 'styles-lomake.css';
include "sivuosat/header.php";
$verifiedSession = $_SESSION['verified'] ?? 1;
$newsletterSession = $_SESSION['newsletter'] ?? 1;
$orderBy = $_SESSION['orderBy'] ?? 'last_name';
$direction = direction();

function direction()
{
    global $direction;
    return $direction == 'ASC' ? 'DESC' : 'ASC';
}

?>

<main class="wide">

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['orderby'])) {
            $orderBy = $_GET['orderby'];
            global $direction;
            $direction = null;
            $direction = isset($_GET['direction']) && $_GET['direction'] == 'ASC' ? $_GET['direction'] : 'DESC';
            $_SESSION['orderBy'] = $orderBy;
        }
        if (isset($_GET['id']) && $loggedIn > 4) {
            $id = $_GET['id'];
            $query = "SELECT 
            customer_id, 
            first_name, 
            last_name, 
            phone, 
            email, 
            verified, 
            newsletter, 
            registration, 
            updated, 
            role, 
            value, 
            name 
            FROM neil_user 
            LEFT JOIN neil_roles r ON role = r.id
            WHERE customer_id = $id
            ORDER BY $orderBy $direction
            ";

            $result = $yhteys->query($query);
            if ($result) {
                $row = $result->fetch_assoc();
                $customer_id = $row['customer_id'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $phone = $row['phone'];
                $email = $row['email'];
                $newsletter = $row['newsletter'];
                $registered = $row['registration'];
                $updated = $row['updated'];
                $roletype = $row['name'];
                $rolenumber = $row['role'];
                $verified = $row['verified'];

    ?>

                <section>
                    <form action="kayttajat-kasittely.php" method="post" class="gap">
                        <legend><?= $traCommon['edit'][$lang] ?> <?= strtolower($traCommon['user'][$lang]); ?></legend>
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="flex">
                            <label for="first_name"><?= $traCommon['name_first'][$lang] ?></label>
                            <input type="text" name="first_name" id="first_name" value="<?= $first_name; ?>" required>
                            <div class="error"></div>
                        </div>
                        <div class="flex">
                            <label for="last_name"><?= $traCommon['name_last'][$lang] ?></label>
                            <input type="text" name="last_name" id="last_name" value="<?= $last_name; ?>" required>
                            <div class="error"></div>
                        </div>
                        <div class="flex">
                            <label for="phone"><?= $traCommon['phone'][$lang] ?></label>
                            <input type="text" name="phone" id="phone" value="<?= $phone; ?>">
                        </div>
                        <div class="flex">
                            <label for="email"><?= $traCommon['email'][$lang] ?></label>
                            <input type="text" name="email" id="email" value="<?= $email; ?>" required>
                            <div class="error"></div>
                        </div>
                        <div class="flex">
                            <label for="newsletter"><?= $traCommon['newsletter'][$lang] ?></label>
                            <input type="checkbox" name="newsletter" id="newsletter" value="1" <?= $newsletter == 1 ? 'checked' : ''; ?>>
                            <div class="error"></div>
                        </div>
                        <div class="flex">
                            <label for="verified"><?= $traCommon['verified'][$lang] ?></label>
                            <input type="checkbox" name="verified" id="verified" value="1" <?= $verified == 1 ? 'checked' : ''; ?>>
                        </div>
                        <div class="flex">
                            <label for="role"><?= $traCommon['role'][$lang] ?></label>
                            <select name="role" id="role">
                                <?php
                                $query = "SELECT id, name FROM neil_roles";
                                $result = $yhteys->query($query);
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $selected = $id == $rolenumber ? 'selected' : '';
                                    echo "<option value='$id' $selected>$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <input type="submit" name="submit" value="<?= $traCommon['save'][$lang] ?>">
                    </form>
                </section>
        <?php
            }
        }
    }

    $query =   "SELECT 
                customer_id, 
                first_name, 
                last_name, 
                phone, 
                email, 
                verified, 
                newsletter, 
                registration, 
                updated, 
                role, 
                value, 
                name 
                FROM neil_user 
                LEFT JOIN neil_roles r ON role = r.id
                WHERE verified = '$verifiedSession' 
                AND newsletter = '$newsletterSession'
                ORDER BY $orderBy $direction
                ";
    $result = $yhteys->query($query);

    if ($result) {
        $rowCount = $result->num_rows;
        ?>

        <section class="tablewrap">
            <?php
            ?>
            <?php
            if (isset($_GET['message']) && isset($_GET['type'])) {
                $message = urldecode($_GET['message']);
                $type = urldecode($_GET['type']);
            ?>
                <div class='<?= $type ?> block center max-content margin-auto alert ' aria-role='alert'>
                    <?= $message ?>
                    <a href="kayttajat.php" class="reset">
                        <span aria-hidden="true">&times;</span>
                        <span class="scr"><?= $traCommon['close'][$lang]; ?></span>
                    </a>
                </div>
            <?php } ?>
            <div class="flex">
                <form method="post" class="reset flex toggle">
                    <legend><?= $traCommon['verified'][$lang]; ?></legend>
                    <button type="submit" id="toggle_verified_yes" name="toggle_verified" value=1 class="toggle_verified yes <?= $verifiedSession == 1 ? 'active' : '' ?>">
                        <?= $traCommon['yes'][$lang]; ?>
                    </button>
                    <button type="submit" id="toggle_verified_no" name="toggle_verified" value=0 class="toggle_verified no  <?= $verifiedSession == 0 ? 'active' : '' ?>">
                        <?= $traCommon['no'][$lang]; ?>
                    </button>
                </form>
                <form method="post" class="reset flex toggle">
                    <legend><?= $traCommon['newsletter'][$lang]; ?></legend>
                    <button type="submit" id="toggle_newsletter_yes" name="toggle_newsletter" value=1 class="toggle_newsletter yes <?= $newsletterSession == 1 ? 'active' : '' ?>">
                        <?= $traCommon['yes'][$lang]; ?>
                    </button>
                    <button type="submit" id="toggle_newsletter_no" name="toggle_newsletter" value=0 class="toggle_newsletter no  <?= $newsletterSession == 0 ? 'active' : '' ?>">
                        <?= $traCommon['no'][$lang]; ?>
                    </button>
                </form>
            </div>
            <p><?= $rowCount > 1 ? $rowCount . ' riviä' : $rowCount . ' rivi' ?></p>
            <table>
                <tbody>
                    <tr>
                        <?php if ($loggedIn > 4) { /* higher than regular employee: supervisor or admin*/ ?>
                            <th>
                                <?= $traCommon['edit'][$lang] ?>
                            </th>
                        <?php } ?>
                        <th>
                            <a href="kayttajat.php?orderby=first_name&direction=<?= direction() ?>">
                                <?= $traCommon['name_first'][$lang] ?>
                            </a>
                        </th>
                        <th>
                            <a href="kayttajat.php?orderby=last_name&direction=<?= direction() ?>">
                                <?= $traCommon['name_last'][$lang] ?>
                            </a>
                        </th>
                        <th>
                            <a href="kayttajat.php?orderby=phone&direction=<?= direction() ?>">
                                <?= $traCommon['phone'][$lang] ?>
                            </a>
                        </th>
                        <th>
                            <a href="kayttajat.php?orderby=email&direction=<?= direction() ?>">
                                <?= $traCommon['email'][$lang] ?>
                            </a>
                        </th>
                        <th>
                            <a href="kayttajat.php?orderby=name&direction=<?= direction() ?>">
                                <?= $traCommon['role'][$lang] ?>
                            </a>
                        </th>
                        <th>
                            <a href="kayttajat.php?orderby=registration&direction=<?= direction() ?>">
                                <?= $traCommon['registered'][$lang] ?>
                            </a>
                        </th>
                        <th>
                            <a href="kayttajat.php?orderby=updated&direction=<?= direction() ?>">
                                <?= $traCommon['updated'][$lang] ?>
                            </a>
                        </th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr class="<?= $row['verified'] == 0 ? 'verified-not' : '';; ?>">
                            <?php if ($loggedIn > 4) { /* higher than regular employee: supervisor or admin */ ?>
                                <td><a href="kayttajat.php?id=<?= $row['customer_id']; ?>"><?= $traCommon['edit'][$lang] ?></a></td>
                            <?php } ?>
                            <td><?= $row['first_name']; ?></td>
                            <td><?= $row['last_name']; ?></td>
                            <td><?= $row['phone']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><small><?= $row['registration']; ?></small></td>
                            <td><small><?= $row['updated']; ?></small></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
</main>

<?php


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["toggle_verified"])) {
                $_SESSION['verified']  = $_POST["toggle_verified"];
                $verifiedSession = $_SESSION['verified'];
                //refresh page:
                echo "<script>window.location.href = 'kayttajat.php';</script>";
            } else if (isset($_POST["toggle_newsletter"])) {
                $_SESSION['newsletter']  = $_POST["toggle_newsletter"];
                $newsletterSession = $_SESSION['newsletter'];
                //refresh page:
                echo "<script>window.location.href = 'kayttajat.php';</script>";
            }
        }
    } else {
        echo $traCommon['connection_failed'][$lang];
        debugger($traCommon['connection_failed'][$lang] . ": " . $yhteys->connect_error);
    }
?>



<?php include "sivuosat/footer.php"; ?>