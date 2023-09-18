<?php
$title = 'Tietokanta Sakila';
$slug = strtolower(preg_replace('/[^A-Za-z\-]/', '', $title));
$css = 'styles-tietokanta.css';
include 'db-sakila.php';
include 'elokuva-poista.php';
?>

<?php include "head.php"; ?>

<main class="<?php echo $slug ?>">
    <section>
        <fieldset>
            <legend>Elokuvan haku</legend>
            <form action="index.php" method="get">
                <input type="text" name="title" id="title" class="form-control" placeholder="Elokuvan nimen osa" value="<?= isset($_GET['title']) ? $_GET['title'] : '' ?>" required>
                <div>
                    <select name="genre">
                        <option>Valitse kategoria</option>
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
                    <button type="submit" name="button" value="haku">Hae elokuva</button>
                </div>
            </form>
        </fieldset>

        <div>
            <?php
            function addListItem($row)
            {
                $specialFeatures = $row['special_features'];
                $specialFeaturesArray = explode(',', $specialFeatures);
                $specialFeaturesString = implode(', ', $specialFeaturesArray);
                $idTitle = $row['film_id'];
            ?>
                <li>
                    <span><span class='scr'>Elokuvan nimi: </span><span id='title-<?= $idTitle ?>' class='title'><?= $row["title"] ?></span>
                        <span class='scr'>Vuosi</span> <span id='<?= $idTitle ?>-year' class='year'>(<?= $row["release_year"] ?>)</span> <span class='scr'>Ikäraja</span><b id='ikaraja-<?= $idTitle ?>' class='ikaraja <?= $row["rating"] ?>'><?= $row["rating"] ?></b></span>
                    <span><span class='scr'>Kuvaus: </span> <i id='kuvaus-<?= $idTitle ?>'><?= $row["description"] ?></i></span>
                    <?php
                    if (!empty($row['special_features'])) {
                    ?>
                        <span><small><span>Erityispiirteet: </span></small> <small id='special_features-<?= $idTitle ?>'><?= $specialFeaturesString ?></small></span>
                    <?php
                    }; ?>
                    <span><small><span>Kesto: </span></small> <small id='length-<?= $idTitle ?>'><?= $row["length"] ?> min</small></span>
                    <span><small><span>Vuokrahinta: </span></small> <small id='rental_rate-<?= $idTitle ?>'><?= $row["rental_rate"] ?> €</small></span>
                    <span><small><span>Vuokra-aika: </span></small> <small id='rental_duration-<?= $idTitle ?>'><?= $row["rental_duration"] ?> pv.</small></span>
                    <span><small><span>Korvaushinta: </span></small> <small id='replacement_cost-<?= $idTitle ?>'><?= $row["replacement_cost"] ?> €</small></span>
                    <span><small><span>Näyttelijät: </span></small> <small id='actors-<?= $idTitle ?>'><?= $row["actors"] ?></small></span>
                    </span>
                    <span><small><span>Kategoriat: </span></small> <small id='categories-<?= $idTitle ?>'><?= $row["categories"] ?></small></span>
                    </span>
                    <span><small><span>Kieli: </span></small> <small id='film-language-<?= $idTitle ?>'><?= $row["film_language"] ?></small></span>
                    <?php
                    if (!empty($row['original_language'])) {
                    ?>
                        <span><small><span>Alkuperäiskieli: </span></small> <small id='original-language-<?= $idTitle ?>'><?= $row["original_language"] ?></small></span>
                    <?php
                    }; ?>
                    <form method='post' id='poistoform-<?= $idTitle ?>'><input name='poistettava' hidden value='<?= $row["title"] ?>' /><button type='submit' name='poista' onclick="return confirmSubmission('<?= $row['title'] ?>')">Poista</button></form>
                </li>

                <?php
            }

            if (isset($_GET['button'])) {
                if (isset($_GET['genre']) and $_GET['genre'] != 'Valitse kategoria') {
                    $title_movie = $_GET['title'];
                    $genre = $_GET['genre'];
                    $title_movie = $yhteys->real_escape_string(strip_tags($title_movie));

                    $query_main = "SELECT f.*,
                    GROUP_CONCAT(DISTINCT CONCAT(a.first_name, ' ', a.last_name) SEPARATOR ', ') AS actors,
                    GROUP_CONCAT(DISTINCT c.name SEPARATOR ', ') AS categories,
                    l.name AS film_language,
                    o.name AS original_language
                    FROM film f
                    LEFT JOIN film_category fc ON f.film_id = fc.film_id
                    LEFT JOIN category c ON fc.category_id = c.category_id
                    LEFT JOIN film_actor fa ON f.film_id = fa.film_id
                    LEFT JOIN actor a ON fa.actor_id = a.actor_id
                    JOIN language l ON f.language_id = l.language_id
                    LEFT JOIN language o ON f.original_language_id = o.language_id
                    WHERE c.name = '$genre' AND f.title LIKE '%$title_movie%'
                    GROUP BY f.film_id, f.title, l.name, o.name;";

                    $tulokset = $yhteys->query($query_main);

                    if ($tulokset === false) {
                        die("Query error: " . $yhteys->error);
                    }

                    if ($tulokset->num_rows > 0) {
                ?>
                        <p class="for-movie-list">Tuloksia <?= $tulokset->num_rows ?> kpl, kategoria <?= $genre ?></p>
                        <ul id="movie-list" class="movie-list">
                        <?php
                        while ($rivi = $tulokset->fetch_assoc()) {
                            addListItem($rivi);
                        }
                    } else {
                        echo "<li>Ei tuloksia</li>";
                    }
                } else {
                    $title_movie = $_GET['title'];
                    $title_movie = $yhteys->real_escape_string(strip_tags($title_movie));

                    $query_main = "SELECT f.*,
                    GROUP_CONCAT(DISTINCT CONCAT(a.first_name, ' ', a.last_name) SEPARATOR ', ') AS actors,
                    GROUP_CONCAT(DISTINCT c.name SEPARATOR ', ') AS categories,
                    l.name AS film_language,
                    o.name AS original_language
                    FROM film f
                    LEFT JOIN film_category fc ON f.film_id = fc.film_id
                    LEFT JOIN category c ON fc.category_id = c.category_id
                    LEFT JOIN film_actor fa ON f.film_id = fa.film_id
                    LEFT JOIN actor a ON fa.actor_id = a.actor_id
                    JOIN language l ON f.language_id = l.language_id
                    LEFT JOIN language o ON f.original_language_id = o.language_id
                    WHERE f.title LIKE '%$title_movie%'
                    GROUP BY f.film_id, f.title, l.name, o.name;";

                    $tulokset = $yhteys->query($query_main);

                    if ($tulokset === false) {
                        die("Query error: " . $yhteys->error);
                    }
                        ?>
                        <p class="for-movie-list">Tuloksia <?= $tulokset->num_rows ?> kpl</p>
                        <ul id="movie-list" class="movie-list">
                    <?php
                    if ($tulokset->num_rows > 0) {
                        while ($rivi = $tulokset->fetch_assoc()) {
                            addListItem($rivi);
                        }
                    } else {
                        echo "<li>Ei tuloksia</li>";
                    }
                }
            }
                    ?>
                        </ul>
        </div>
    </section>
</main>
<?php include "footer.php"; ?>