<?php
$title = 'Lisää elokuva';
$slug = str_replace(' ', '-', strtolower($title));
$css = 'styles-tietokanta.css';
include 'db-sakila.php';

?>

<?php include "head.php"; ?>

<main class="<?php echo $slug ?>">
    <section>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if ($yhteys->connect_error) {
                die($traCommon['connection_failed'][$lang] . ": " . $yhteys->connect_error);
            }
            $yhteys->set_charset("utf8");

            if ($yhteys->real_escape_string($_POST['authorization']) !== $sakila_authorization) {
                die("Väärä salasana, ota yhteys ylläpitoon: info@jenniina.fi");
            } else {

                // Elokuvan tiedot lomakkeesta
                $titleMovie = $yhteys->real_escape_string(strtoupper($_POST['title']));
                $description = $yhteys->real_escape_string($_POST['description']);
                $release_year = $yhteys->real_escape_string($_POST['release_year']);
                $language_id = $yhteys->real_escape_string($_POST['language_id']);
                $original_language_id = !empty($_POST['original_language_id']) || $_POST['original_language_id'] === "" ? $yhteys->real_escape_string($_POST['original_language_id']) : NULL;
                $rental_duration = $yhteys->real_escape_string($_POST['rental_duration']);
                $rental_rate = $yhteys->real_escape_string($_POST['rental_rate']);
                $length = $yhteys->real_escape_string($_POST['length']);
                $replacement_cost = $yhteys->real_escape_string($_POST['replacement_cost']);
                $rating = $yhteys->real_escape_string($_POST['rating']);
                $special_features = isset($_POST['special_features']) ? $_POST['special_features'] : array();
                if (!empty($_POST['special_features'])) {
                    $special_features = implode(',', $_POST['special_features']);
                } else {
                    $special_features = null; // If no features are selected
                }
                $actors = $yhteys->real_escape_string(strtoupper($_POST['actors']));
                $actorArray = explode(',', $actors);

                $duplicateCheckQuery = "SELECT COUNT(*) AS duplicate_count FROM film 
                                        WHERE TRIM(title) = TRIM('$titleMovie') 
                                        AND language_id = '$language_id'";
                $result = $yhteys->query($duplicateCheckQuery);

                if ($result) {
                    $row = $result->fetch_assoc();
                    $duplicateCount = $row['duplicate_count'];

                    if ($duplicateCount > 0) {
                        // Duplicate found, display an error message
                        echo "<p>Elokuva on jo olemassa</p> <a href='javascript:history.go(-1)'>Takaisin</a>";
                    } else {
                        if (!empty($_POST['original_language_id']) && !empty($_POST['special_features'])) {
                            // Lisää elokuva taulukkoon 'film'
                            $lisayskysely = "INSERT INTO film (title, description, release_year, language_id, original_language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features)
                            VALUES ('$titleMovie', '$description', '$release_year', '$language_id', '$original_language_id', '$rental_duration', '$rental_rate', '$length', '$replacement_cost', '$rating', '$special_features')";
                        } else if (!empty($_POST['original_language_id']) && empty($_POST['special_features'])) {
                            // Lisää elokuva taulukkoon 'film' ilman special_features
                            $lisayskysely = "INSERT INTO film (title, description, release_year, language_id, original_language_id, rental_duration, rental_rate, length, replacement_cost, rating)
                            VALUES ('$titleMovie', '$description', '$release_year', '$language_id', '$original_language_id', '$rental_duration', '$rental_rate', '$length', '$replacement_cost', '$rating')";
                        } else if ((empty($_POST['original_language_id']) || $_POST['original_language_id'] == "") && !empty($_POST['special_features'])) {
                            // Lisää elokuva taulukkoon 'film' ilman original_language_id
                            $lisayskysely = "INSERT INTO film (title, description, release_year, language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features)
                            VALUES ('$titleMovie', '$description', '$release_year', '$language_id', '$rental_duration', '$rental_rate', '$length', '$replacement_cost', '$rating', '$special_features')";
                        } else if ((empty($_POST['original_language_id']) || $_POST['original_language_id'] == "") && empty($_POST['special_features'])) {
                            // Lisää elokuva taulukkoon 'film' ilman original_language_id ja special_features
                            $lisayskysely = "INSERT INTO film (title, description, release_year, language_id, rental_duration, rental_rate, length, replacement_cost, rating)"
                                . "VALUES ('$titleMovie', '$description', '$release_year', '$language_id', '$rental_duration', '$rental_rate', '$length', '$replacement_cost', '$rating')";
                        } else {
                            // Lisää elokuva taulukkoon 'film'
                            $lisayskysely = "INSERT INTO film (title, description, release_year, language_id, original_language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features)
                            VALUES ('$titleMovie', '$description', '$release_year', '$language_id', '$original_language_id', '$rental_duration', '$rental_rate', '$length', '$replacement_cost', '$rating', '$special_features')";
                        }


                        if ($yhteys->query($lisayskysely) === TRUE) {
                            $elokuva_id = $yhteys->insert_id;

                            // Insert selected genres into the film_category table
                            if (isset($_POST['genre']) && is_array($_POST['genre'])) {
                                foreach ($_POST['genre'] as $selectedGenre) {
                                    $selectedGenre = $yhteys->real_escape_string($selectedGenre);
                                    $insertGenreSql =  "INSERT INTO film_category (film_id, category_id)        SELECT $elokuva_id, category_id 
                                                        FROM category
                                                        WHERE name = '$selectedGenre'";
                                    $yhteys->query($insertGenreSql);
                                }
                            }

                            // Lisää näyttelijät elokuvan ja näyttelijätaulukon 'film_actor' kautta
                            foreach ($actorArray as $actor) {
                                $actor = trim($actor);
                                $actorParts = explode(' ', $actor);
                                $last_name = end($actorParts);
                                // Remove the last name from the parts
                                array_pop($actorParts);
                                // Join the remaining parts as the first name
                                $first_name = implode(' ', $actorParts);
                                $hakukysely =  "SELECT actor_id FROM actor 
                                                WHERE first_name = '$first_name' 
                                                AND last_name = '$last_name'";
                                $tulos = $yhteys->query($hakukysely);

                                if ($tulos->num_rows > 0) {
                                    $rivi = $tulos->fetch_assoc();
                                    $actor_id = $rivi['actor_id'];

                                    // Lisää näyttelijä elokuvan ja näyttelijätaulukon kautta
                                    $lisayskysely = "INSERT INTO film_actor (film_id, actor_id) 
                                    VALUES ('$elokuva_id', '$actor_id')";
                                    if (!$yhteys->query($lisayskysely)) {
                                        echo "Virhe näyttelijän lisäämisessä elokuvalle: " . $yhteys->error;
                                    }
                                } else {

                                    // Lisää näyttelijä näyttelijätaulukkoon
                                    $lisayskysely = "INSERT INTO actor (first_name, last_name) 
                                    VALUES ('$first_name', '$last_name')";
                                    if ($yhteys->query($lisayskysely) === TRUE) {
                                        $actor_id = $yhteys->insert_id;

                                        // Lisää näyttelijä elokuvan ja näyttelijätaulukon kautta
                                        $lisayskysely = "INSERT INTO film_actor (film_id, actor_id) 
                                        VALUES ('$elokuva_id', '$actor_id')";
                                        if (!$yhteys->query($lisayskysely)) {
                                            echo "Virhe näyttelijän lisäämisessä elokuvalle: " . $yhteys->error;
                                            exit;
                                        }
                                    } else {
                                        echo "Virhe näyttelijän lisäämisessä: " . $yhteys->error;
                                    }
                                }
                            }

                            header('Location: success.php?message=' . urlencode($titleMovie));
                        } else {
                            echo "Virhe elokuvan lisäämisessä: $yhteys->error";
                        }

                        $yhteys->close();
                    }
                } else {
                    // Error during duplicate check
                    $errorMessage = "Error checking for duplicates: " . $yhteys->error;
                }
            }
        };
        ?>
    </section>
</main>
<?php include "footer.php"; ?>