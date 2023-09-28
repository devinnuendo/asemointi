<?php
include "sivuosat/top.php";
$loggedIn = secure_page(4);
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
            ORDER BY last_name, first_name ASC
            ";
$result = $yhteys->query($query);

if ($result) {
?>
    <main class="wide">
        <section class="tablewrap">
            <table>
                <tbody>
                    <tr>
                        <th><?= $traCommon['name_first'][$lang] ?></th>
                        <th><?= $traCommon['name_last'][$lang] ?></th>
                        <th><?= $traCommon['phone'][$lang] ?></th>
                        <th><?= $traCommon['email'][$lang] ?></th>
                        <th><?= $traCommon['role'][$lang] ?></th>
                        <th><?= $traCommon['newsletter'][$lang] ?></th>
                        <th><?= $traCommon['verified'][$lang] ?></th>
                        <th><?= $traCommon['registered'][$lang] ?></th>
                        <th><?= $traCommon['updated'][$lang] ?></th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr class="<?= $row['verified'] == 0 ? 'verified-not' : '';; ?>">
                            <td><?= $row['first_name']; ?></td>
                            <td><?= $row['last_name']; ?></td>
                            <td><?= $row['phone']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['newsletter'] == 1 ? 'tilattu' : 'ei'; ?></td>
                            <td><?= $row['verified'] == 1 ? 'ok' : 'ei';; ?></td>
                            <td><small><?= $row['registration']; ?></small></td>
                            <td><small><?= $row['updated']; ?></small></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>

<?php   } else {
    echo "Virhe: " . $yhteys->error;
}
?>



<?php include "sivuosat/footer.php"; ?>