<?php
include "sivuosat/top.php";

$customer_id = $_SESSION['customer_id'];

$query = "SELECT 
            customer_id, 
            first_name, 
            last_name, 
            phone, 
            email, 
            verified, 
            newsletter, 
            image,
            registration, 
            updated, 
            role, 
            value, 
            name 
            FROM neil_user 
            LEFT JOIN neil_roles r ON role = r.id
            WHERE customer_id = $customer_id 
            LIMIT 1
            ";

$result = $yhteys->query($query);
$row = $result->fetch_assoc();

$title = $row['value'] > 2 ? ucfirst($row['name']) . " " . $traCommon['profile'][$lang] : $traCommon['profile'][$lang];
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
$loggedIn = secure_page(1);
$script = 'lomake.js';
$css = 'styles-lomake.css';
include "sivuosat/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($yhteys->connect_error) {
        debugger("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
        die($traCommon['connection_failed'][$lang] . ": " . $yhteys->connect_error);
    } else {
        $yhteys->set_charset("utf8");

        $customer_id = $_SESSION['customer_id'];

        [$image, $error_image] = get_image($fields_file);
        if ($error_image) $errors['image'] = $error_image;
        $image = ($image) ? "'$image'" : "NULL";

        $password = $_POST['password'];
        $first_name = $yhteys->real_escape_string(strip_tags(trim($_POST['first_name'])));
        $first_name = ucwords($first_name, " ");
        $last_name = $yhteys->real_escape_string(strip_tags(trim($_POST['last_name'])));
        $last_name = ucwords($last_name, " ");
        $phone = $yhteys->real_escape_string(strip_tags(trim($_POST['phone'])));
        $phone = preg_replace('/\s+/u', '', $phone); // remove spaces
        $newsletter = $yhteys->real_escape_string($_POST['newsletter']) === "Kylla" ? 1 : 0;

        $query = "SELECT password FROM neil_user WHERE customer_id = $customer_id";
        $result = $yhteys->query($query);
        if ($result) {
            $row = $result->fetch_assoc();
            $hash = $row['password'];
            $verifyPassword = password_verify($password, $hash);
            if ($verifyPassword) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header('Location: profiili.php?message=' . urlencode("$email ei ole kelvollinen sähköpostiosoite."));
                    exit;
                } else {

                    $duplicateCheckQuery = "SELECT COUNT(*) AS duplicate_count FROM neil_user 
                                            WHERE TRIM(email) = TRIM('$email')";
                    $result = $yhteys->query($duplicateCheckQuery);

                    if ($result) {
                        $row = $result->fetch_assoc();
                        $duplicateCount = $row['duplicate_count'];

                        if ($duplicateCount > 0) {
                            // Duplicate found, display an error message
                            header("Location: profiili.php?muokkaa=muokkaa&message=" . urlencode($traCommon['email_fail'][$lang]));
                        } else {
                            $query = "SELECT image FROM neil_user WHERE customer_id = $customer_id";
                            $result = $yhteys->query($query);
                            if ($result) {
                                $row = $result->fetch_assoc();
                                $old_image = $row['image'];
                                if ($old_image) {
                                    $folder = PROFILE_IMAGE_FOLDER;
                                    unlink("$folder/$old_image");
                                }
                            }
                            $query = "UPDATE neil_user 
                            SET image = $image, 
                            first_name = $first_name, 
                            last_name = $last_name, 
                            phone = $phone, 
                            email = $email, 
                            newsletter = $newsletter 
                            WHERE customer_id = $customer_id";
                            $result = $yhteys->query($query);
                            if ($result) {
                                header("Location: profiili.php?message=" . urlencode($traCommon['saved'][$lang]));
                                // echo "<div>
                                //         <div class='ok block center max-content margin-auto alert' aria-role='alert'>
                                //           <p>{$traCommon['image_saved'][$lang]}</p>
                                //           <p><a href='profiili.php'>{$traCommon['profile'][$lang]}</a></p>
                                //         </div>
                                //       </div>
                                //      ";
                            } else {
                                $errors['image'] = $traCommon['error_saving'][$lang];
                            }
                        }
                    } else {
                        $errors['image'] = $traCommon['error_saving'][$lang];
                    }
                }
            } else {
                $errors['password'] = $traCommon['password_wrong'][$lang];
            }
        } else {
            $errors['password'] = $traCommon['password_wrong'][$lang];
        }
    }
}
?>

<main>

    <?php
    if (isset($_GET['muokkaa'])) {
    ?>
        <section>
            <form method="post" id="form-edit-profile" class="form-edit-profile" enctype="multipart/form-data">
                <legend class="scr">
                    <?= $traCommon['edit'][$lang] . $traCommon['profile'][$lang]; ?>
                </legend>

                <div class="image-wrap flex">
                    <label for="image">
                        <?= $traCommon['image_add'][$lang]; ?>
                    </label>
                    <input id="image" name="image" type="file" accept="image/*" <?= pattern('image'); ?> class="form-control" placeholder="<?= $traCommon['image'][$lang]; ?>"></input>
                    <div class="image-preview-wrap displaynone" id="image-preview-wrap">
                        <img class="image-preview" src="" id="image-preview" width="" height="" />
                        <button type="button" id="image-remove" class="image-remove">
                            <?= $traCommon['image_remove'][$lang]; ?>
                        </button>
                    </div>
                    <div class="error <?= $errors['image'] ? 'block' : ''; ?>">
                        <?= $errors['image'] ?? ''; ?>
                    </div>
                </div>

                <div class="flex">
                    <label for="first_name">
                        <?= $traCommon['name_first'][$lang]; ?>
                    </label>
                    <input type="text" name="first_name" id="first_name" minlength="2" value="<?= $row['first_name'] ?>" required />
                    <div class="error"></div>

                    <label for="last_name">
                        <?= $traCommon['name_last'][$lang]; ?>
                    </label>
                    <input type="text" name="last_name" id="last_name" minlength="2" value="<?= $row['last_name'] ?>" required />
                    <div class="error"></div>

                    <label for="phone">
                        <?= $traCommon['phone'][$lang]; ?>
                    </label>
                    <input type="text" name="phone" id="phone" minlength="2" value="<?= $row['phone'] ?>" />
                    <div class="error"></div>

                </div>
                <div class="flex">
                    <label for="newsletter">
                        <?= $traCommon['newsletter'][$lang]; ?>
                    </label>
                    <input type="checkbox" name="newsletter" id="newsletter" value="1" <?= $row['newsletter'] == 1 ? "checked" : "" ?> />
                    <div class="error"></div>
                </div>

                <div class="flex">
                    <label for="password">
                        <?= $traCommon['current'][$lang] . " " . strtolower($traCommon['password'][$lang]); ?>
                    </label>
                    <input type="password" name="password" id="password" minlength="10" placeholder="<?= $traCommon['current'][$lang] . " " . strtolower($traCommon['password'][$lang]); ?>" required />
                    <div class="error <?= $errors['password'] ? 'block' : ''; ?>">
                        <?= $errors['password'] ?? ''; ?>
                    </div>
                </div>
                <small class="block label-padding-left"><a href="salasana-vaihda.php"><?= $traCommon['new'][$lang] . " " . strtolower($traCommon['password'][$lang]) ?>?</a> &nbsp; <a href="profiili-sahkoposti.php"><?= $traCommon['new'][$lang] . " " . strtolower($traCommon['email'][$lang]) ?>? </a></small>

                <button type="submit">
                    <?= $traCommon['submit'][$lang]; ?>
                </button>

            </form>
        </section>
    <?php
    }
    ?>

    <section>

        <?php
        if (isset($_GET['message'])) {
            $message = urldecode($_GET['message']);
            echo "<div class='error block' aria-role='alert'>$message</div>";
        } ?>
        <div class="row flex gap">
            <?php if ($row['image']) { ?>
                <p class="profile-wrap"><img src="img/photos/profiili/<?= $row['image'] ?>" alt="<?= $traCommon['profile'][$lang] ?> <?= strtolower($traCommon['image'][$lang]) ?>" class="max-width profile" /></p>
            <?php } ?>
            <table class="profile-table">
                <tbody>
                    <tr>
                        <th><?= $traCommon['name'][$lang] ?></th>
                        <td><?= $row['first_name'] . " " . $row['last_name'] ?> </td>
                    </tr>
                    <tr>
                        <th><?= $traCommon['phone'][$lang] ?></th>
                        <td><?= $row['phone'] ?></td>
                    </tr>
                    <tr>
                        <th><?= $traCommon['username'][$lang] ?></th>
                        <td><?= $row['email'] ?></td>
                    </tr>
                    <tr>
                        <th><?= $traCommon['newsletter'][$lang] ?></th>
                        <td><?= $row['newsletter'] == 1 ? $traCommon['yes'][$lang] : $traCommon['no'][$lang] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section>
        <a href="profiili.php?muokkaa=muokkaa"><?= $traCommon['edit'][$lang]  . " " . strtolower($traCommon['profile'][$lang])  . " " . strtolower($traCommon['image'][$lang]) ?></a>

        <a href="profiili-kuva.php"><?= $traCommon['add'][$lang] . "/" . $traCommon['change'][$lang] . " " . strtolower($traCommon['image'][$lang]) ?></a>

        <a href="salasana-vaihda.php"><?= $traCommon['new'][$lang] . " " . strtolower($traCommon['password'][$lang]) ?></a>

        <?php if ($loggedIn > 2) { ?>
            <a href="kayttajat.php"><?= $loggedIn > 4 ? $traCommon['edit'][$lang] . " " . strtolower($traCommon['users'][$lang]) : $traCommon['users'][$lang] ?></a>
        <?php } ?>

    </section>

    <aside>
        <p><?= $traCommon['registration'][$lang] ?>: <?= $row['registration'] ?> </p>
        <p><?= $traCommon['updated'][$lang] ?>: <?= $row['updated'] ?> </p>
    </aside>

</main>

<?php include "sivuosat/footer.php"; ?>