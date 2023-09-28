<?php
include "sivuosat/top.php";
$loggedIn = loggedIn();
$loggedIn = secure_page($loggedIn);
$title = $traCommon['users'][$lang];
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $img1920 = 'flower-3231083_1920.jpg';
$script = 'lomake.js';
$css = 'styles-lomake.css';
include "sivuosat/header.php";

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
            ";
$result = $yhteys->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $customer_id = $row['customer_id'];
    $verified = $row['verified'];
    $role = $row['value'];
}
?>

<main>
    <section>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>