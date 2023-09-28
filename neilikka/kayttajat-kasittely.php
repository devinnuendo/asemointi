<?php

include "sivuosat/top.php";
$loggedIn = secure_page(8);
$title = $traCommon['user_management'][$lang];
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
$script = 'lomake.js';
$css = 'styles-lomake.css';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["toggle_verified"])) {
    } else if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $newsletter = isset($_POST['newsletter']) ? 1 : 0;
        $verified = isset($_POST['verified']) ? 1 : 0;
        $role = $_POST['role'];
        $query = "UPDATE neil_user SET 
        first_name = '$first_name', 
        last_name = '$last_name', 
        phone = '$phone', 
        email = '$email', 
        newsletter = '$newsletter', 
        verified = '$verified', 
        role = '$role' 
        WHERE customer_id = $id";
        $result = $yhteys->query($query);
        if ($result) {
            header('Location: kayttajat.php?type=ok&message=' . urlencode($traCommon['saved'][$lang]));
            exit;
        } else {
            debugger($traCommon['save_failed'][$lang] . ": " . $yhteys->error);
            header('Location: kayttajat.php?type=error&message=' . urlencode($traCommon['save_failed'][$lang]));
            exit;
        }
    }
}

include "sivuosat/header.php";

?>

<main>
    <section>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>