<?php
$title = 'Lisää elokuva';
$slug = strtolower(preg_replace('/[^A-Za-z\-]/', '', $title));
$css = 'styles-tietokanta.css';
include 'db-sakila.php';

?>

<?php include "head.php"; ?>

<main class="<?php echo $slug ?>">
    <section>

        <form action="elokuva-kasittely.php" method="post" class="lisaa-elokuva">
            <div>
                <label for="title">Elokuvan nimi:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="description">Kuvaus:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div>
                <label for="release_year">Julkaisuvuosi:</label>
                <select name="release_year" id="release_year">
                    <?php
                    $vuosi = date("Y");
                    for ($i = $vuosi; $i >= 1900; $i--) {
                        if ($i == $vuosi) echo "<option value='$i' selected>$i</option>";
                        else echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="language_id">Kieli:</label>
                <?php
                $query_language = "SELECT DISTINCT language_id, name FROM language";
                $result_language = $yhteys->query($query_language);
                echo "<select id='language_id' name='language_id'>";
                if ($result_language->num_rows > 0) {
                    while ($row = $result_language->fetch_assoc()) {
                        echo "<option value='" . $row["language_id"] . "'>" . $row["name"] . "</option>";
                    }
                } else {
                    echo "No languages found in the Sakila database.";
                }
                echo "</select>"
                ?>
            </div>
            <div>
                <label for="original_language_id">Alkuperäiskieli:</label>
                <?php
                $query_original_language = "SELECT DISTINCT language_id, name FROM language";
                $result_original = $yhteys->query($query_original_language);

                echo "<select id='original_language_id' name='original_language_id'>";
                echo "<option value=''>Käännetyn alkuperäiskieli</option>";
                if ($result_original->num_rows > 0) {
                    while ($row = $result_original->fetch_assoc()) {
                        echo "<option value='" . $row["language_id"] . "'>" . $row["name"] . "</option>";
                    }
                } else {
                    echo "No languages found in the Sakila database.";
                }
                echo "</select>"
                ?>
            </div>
            <div>
                <label for="rental_duration">Vuokrausaika (päivää):</label>
                <input type="number" id="rental_duration" name="rental_duration" required>
            </div>
            <div>
                <label for="rental_rate">Vuokrahinta:</label>
                <input type="number" id="rental_rate" name="rental_rate" required>
            </div>
            <div>
                <label for="length">Kesto (minuuttia):</label>
                <input type="number" id="length" name="length" required>
            </div>
            <div>
                <label for="replacement_cost">Korvaushinta:</label>
                <input type="number" id="replacement_cost" name="replacement_cost" required>
            </div>
            <div>
                <label for="rating">Ikäraja:</label>
                <?php
                $query_rating = "SHOW COLUMNS FROM film LIKE 'rating'";
                $result_rating = $yhteys->query($query_rating);
                if ($result_rating !== false) {
                    $row = $result_rating->fetch_assoc();
                    $rating = $row["Type"];
                    $rating = str_replace("enum(", "", $rating);
                    $rating = str_replace(")", "", $rating);
                    $rating = str_replace("'", "", $rating);
                    $rating = explode(",", $rating);
                    echo "<select id='rating' name='rating' required>";
                    foreach ($rating as $rating) {
                        echo "<option value='$rating'>$rating</option>";
                    }
                    echo "</select>";
                } else {
                    echo "Error: " . $query_rating . "<br>" . $yhteys->error;
                }
                ?>
            </div>
            <div>
                <label for="special_features">Erityispiirteet:</label>
                <?php
                $query_features = "SHOW COLUMNS FROM film LIKE 'special_features'";

                if ($yhteys->connect_error) {
                    die("Connection failed: " . $yhteys->connect_error);
                }
                $result_features = $yhteys->query($query_features);
                if ($result_features !== false) {
                    $row = $result_features->fetch_assoc();
                    $specialFeatures = $row["Type"];
                    $specialFeatures = str_replace("set(", "", $specialFeatures);
                    $specialFeatures = str_replace(")", "", $specialFeatures);
                    $specialFeatures = str_replace("'", "", $specialFeatures);
                    $specialFeatures = explode(",", $specialFeatures);
                    echo "<select id='special_features' name='special_features[]' multiple>";
                    echo "<option value='' disabled>Valitse ominaisuus</option>";
                    foreach ($specialFeatures as $feature) {
                        echo "<option value='$feature'>$feature</option>";
                    }
                    echo "</select>";
                } else {
                    echo "Error: " . $query_features . "<br>" . $yhteys->error;
                }

                ?>
            </div>
            <div>
                <label for="genre">Kategoria:</label>
                <select name="genre[]" id="genre" multiple>
                    <option value="" disabled>Valitse kategoria</option>
                    <?php
                    $query_genres = "SELECT name FROM category";
                    $tulokset_genres = $yhteys->query($query_genres);
                    while ($rivi = $tulokset_genres->fetch_assoc()) {
                        $categoryName = $rivi["name"];
                        echo "
                            <option value=$categoryName>
                                $categoryName
                            </option>
                            ";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="actors">Näyttelijät (pilkulla eroteltuina):</label>
                <textarea id="actors" name="actors" required></textarea>
            </div>
            <div>
                <label for="authorization">Salasana: </label>
                <input type="text" id="authorization" name="authorization" required>
            </div>

            <button type="submit">Lisää elokuva</button>
        </form>

    </section>
</main>
<?php include "footer.php"; ?>