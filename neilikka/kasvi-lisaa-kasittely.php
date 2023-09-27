<?php
include "sivuosat/top.php";
$title = $traLocal['plants'][$lang];
$loggedIn = secure_page_admin();
$script = 'lomake.js';
$css = 'styles-lomake.css';
include "sivuosat/header.php";
?>

<main>
    <section class="admin">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if ($yhteys->connect_error) {
                debugger("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
                die($traCommon['connection_failed'][$lang] . ": " . $yhteys->connect_error);
            }
            $yhteys->set_charset("utf8");

            // Data from the form
            $plant = $yhteys->real_escape_string(strip_tags(ucfirst(trim($_POST['plant']))));
            $sci = $yhteys->real_escape_string(strip_tags(ucwords(trim($_POST['sci']))));
            $amount = intval($_POST['amount']);
            $color = $yhteys->real_escape_string(strip_tags(ucfirst(trim($_POST['color']))));
            $description = $yhteys->real_escape_string(strip_tags(ucfirst(trim($_POST['description']))));
            $price = intval($_POST['price']);
            $length = intval($_POST['length']);
            $habitat = $yhteys->real_escape_string(strip_tags(trim($_POST['habitat'])));
            $type = $yhteys->real_escape_string(strip_tags(trim($_POST['type'])));
            $img_small = $yhteys->real_escape_string(strip_tags(trim($_POST['img_small'])));
            $img_big = $yhteys->real_escape_string(strip_tags(trim($_POST['img_large'])));

            $plant_sv = $yhteys->real_escape_string(strip_tags(ucfirst(trim($_POST['plant_sv']))));
            $color_sv = $yhteys->real_escape_string(strip_tags(ucfirst(trim($_POST['color_sv']))));
            $description_sv = $yhteys->real_escape_string(strip_tags(ucfirst(trim($_POST['description_sv']))));

            $plant_en = $yhteys->real_escape_string(strip_tags(ucfirst(trim($_POST['plant_en']))));
            $color_en = $yhteys->real_escape_string(strip_tags(ucfirst(trim($_POST['color_en']))));
            $description_en = $yhteys->real_escape_string(strip_tags(ucfirst(trim($_POST['description_en']))));

            try {
                // Insert data into the 'plants' table
                $query1 = "INSERT INTO neil_plants_fi (sci, plant, amount, color, description, price, length, habitat, type, img_small, img_large)
                VALUES (?, ?,?,?,?,?,?,?,?,?,?)";

                $stmt1 = $yhteys->prepare($query1);
                $stmt1->bind_param('ssissiissss', $sci, $plant, $amount, $color, $description, $price, $length, $habitat, $type, $img_small, $img_big);

                if (!$stmt1->execute()) {
                    throw new Exception("Error in the first table insertion: " . $stmt1->error);
                }


                $original_id = $yhteys->insert_id;

                $query2 = "INSERT INTO neil_plants_sv (original_id, plant, color, description)
                VALUES ($original_id, '$plant_sv','$color_sv', '$description_sv')";
                $result2 = $yhteys->query($query2);

                $query3 = "INSERT INTO neil_plants_en (original_id, plant, color, description)
                VALUES ($original_id, '$plant_en','$color_en', '$description_en')";
                $result3 = $yhteys->query($query3);


                if ($result2 && $result3) {
                    // Data inserted successfully
                    $yhteys->commit();
                    echo "<p>{$traLocal['success_plant'][$lang]}</p>
                    <p><a href='kasvi-lisaa.php'>{$traCommon['add'][$lang]}</a></p>
                    <p><a href='index.php'>{$traCommon['frontpage'][$lang]}</a></p>
                    ";
                } else {
                    $yhteys->rollback();
                    // Error handling
                    echo "{$traCommon['error_saving'][$lang]}";
                    debugger("Error inserting plant data: " . $yhteys->error);
                }
            } catch (Exception $e) {
                // Handle exceptions if needed
                $yhteys->rollback();
                echo "{$traCommon['error'][$lang]}";
                debugger("Error: " . $e->getMessage());
            }

            // Close the database connection
            $yhteys->close();
        }
