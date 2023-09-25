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
                die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
            }
            $yhteys->set_charset("utf8");

            // Data from the form
            $plant = $yhteys->real_escape_string(strip_tags(trim($_POST['plant'])));
            $sci = $yhteys->real_escape_string(strip_tags(trim($_POST['sci'])));
            $amount = intval($_POST['amount']);
            $color = $yhteys->real_escape_string(strip_tags(trim($_POST['color'])));
            $description = $yhteys->real_escape_string(strip_tags(trim($_POST['description'])));
            $price = intval($_POST['price']);
            $length = intval($_POST['length']);
            $habitat = $yhteys->real_escape_string($_POST['habitat']);
            $type = $yhteys->real_escape_string($_POST['type']);

            $plant_sv = $yhteys->real_escape_string(strip_tags(trim($_POST['plant_sv'])));
            $color_sv = $yhteys->real_escape_string(strip_tags(trim($_POST['color_sv'])));
            $description_sv = intval($_POST['description_sv']);

            $plant_en = $yhteys->real_escape_string(strip_tags(trim($_POST['plant_en'])));
            $color_en = $yhteys->real_escape_string(strip_tags(trim($_POST['color_en'])));
            $description_en = intval($_POST['description_en']);

            // Validation and data processing here...

            try {
                // Insert data into the 'plants' table
                $query1 = "INSERT INTO neil_plants_fi (sci, plant, amount, color, description, price, length, habitat, type)
    VALUES (?, ?,?,?,?,?,?,?,?)";

                $stmt1 = $yhteys->prepare($query1);
                $stmt1->bind_param('ssissiiss', $sci, $plant, $amount, $color, $description, $price, $length, $habitat, $type);

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
                    echo "Kasvi lisätty onnistuneesti
                    <p><a href='kasvi-lisaa.php'>Lisää uusi kasvi</a></p>
                    <p><a href='index.php'>Etusivulle</a></p>
                    ";
                } else {
                    $yhteys->rollback();
                    // Error handling
                    echo "Error inserting plant data: " . $yhteys->error;
                    debugger("Error inserting plant data: " . $yhteys->error);
                }
            } catch (Exception $e) {
                // Handle exceptions if needed
                $yhteys->rollback();
                echo "Error: " . $e->getMessage();
                debugger("Error: " . $e->getMessage());
            }

            // Close the database connection
            $yhteys->close();
        }