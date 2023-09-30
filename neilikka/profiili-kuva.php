<?php
include "sivuosat/top.php";
$title = $traCommon['image_add'][$lang];
$script = 'lomake.js';
$css = 'styles-lomake.css';
$fields_file = ['image'];
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
$loggedIn = secure_page(1);

function get_image($field)
{
    $fields_file = $GLOBALS['fields_file'];
    $allowed_images = $GLOBALS['allowed_images'];
    $error_image = false;
    $image = "";
    foreach ($fields_file as $field) {
        if (!isset($_FILES[$field])) continue;
        if (is_uploaded_file($_FILES[$field]['tmp_name'])) {
            $traCommon = $GLOBALS['traCommon'];
            $lang = $GLOBALS['lang'];
            $random = randomString(3);
            $customer_id = $_SESSION['customer_id'];
            $maxsize = PROFILE_IMAGE_SIZE;
            $temp_file = $_FILES[$field]["tmp_name"];
            $filesize = $_FILES[$field]['size'];
            $pathinfo = pathinfo($_FILES[$field]["name"]);
            $filetype = strtolower($pathinfo['extension']);
            $image = $pathinfo['filename'] . "_$customer_id.$filetype";
            $target_dir = PROFILE_IMAGE_FOLDER;
            $target_file = "$target_dir/$image";
            debugger("File $image, $filetype, $filesize tavua" . print_r($_FILES[$field], true) . " " . print_r($pathinfo, true) . " " . print_r($target_file, true));
            /* Check if image file is a actual image or fake image */
            if (!$check = getimagesize($temp_file)) $error_image = "{$traCommon['image_not_valid'][$lang]}.";
            else
    if (file_exists($target_file)) $error_image = "{$traCommon['image_exists'][$lang]}.";
            else if (!in_array($filetype, $allowed_images)) $error_image = "{$traCommon['filetype_wrong'][$lang]}. {$traCommon['image_filetypes_allowed'][$lang]}.";
            else if ($filesize > $maxsize) $error_image = "{$traCommon['image_max_size'][$lang]}.";
            debugger("File $image,mime: {$check['mime']}, $filetype, $filesize tavua");
            if (!$error_image) {
                if (!move_uploaded_file($temp_file, $target_file))
                    $error_image = "{$traCommon['image_save_fail'][$lang]}.";
            }
        }
    }
    return [$image, $error_image];
}

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
        $query = "SELECT password FROM neil_user WHERE customer_id = $customer_id";
        $result = $yhteys->query($query);
        if ($result) {
            $row = $result->fetch_assoc();
            $hash = $row['password'];
            $verifyPassword = password_verify($password, $hash);
            if (!$verifyPassword) $errors['password'] = $traCommon['password_wrong'][$lang];
            if ($verifyPassword) {
                $query_set = "UPDATE neil_user SET image = $image WHERE customer_id = $customer_id";
                $result_set = $yhteys->query($query_set);
                if ($result_set) {
                    header("Location: profiili.php?message=" . urlencode($traCommon['image_saved'][$lang]));
                    // echo "<div>
                    //         <div class='ok block center max-content margin-auto alert' aria-role='alert'>
                    //           <p>{$traCommon['image_saved'][$lang]}</p>
                    //           <p><a href='profiili.php'>{$traCommon['profile'][$lang]}</a></p>
                    //         </div>
                    //       </div>
                    //      ";
                } else {
                    $errors['image'] = $traCommon['image_save_fail'][$lang];
                }
            }
        } else {
            $errors['password'] = $traCommon['password_wrong'][$lang];
        }
    }
}

include "sivuosat/header.php";
?>

<main class="image">
    <section>

        <?php



        ?>



        <?php include "sivuosat/form_language.php" ?>

        <form autocomplete="off" method="post" id="form-image" class="form-image " enctype="multipart/form-data">
            <legend class="scr">
                <?= $traCommon['edit'][$lang]; ?>
            </legend>

            <div class="image-wrap">
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

            <div>
                <label for="password">
                    <?= $traCommon['password'][$lang]; ?>
                </label>
                <input type="password" name="password" id="password" placeholder="<?= $traCommon['password'][$lang]; ?>" <?= pattern('password'); ?> minlength="10" required />
                <div class="error <?= $errors['password'] ? 'block' : ''; ?>">
                    <?= $errors['password'] ?? ''; ?>
                </div>
            </div>

            <button type="submit">
                <?= $traCommon['submit'][$lang]; ?>
            </button>
        </form>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>