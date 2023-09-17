<script>
    function confirmSubmission(movie) {
        if (window.confirm(`Are you sure you want to delete "${movie}"?`)) return true;
        else return false;
    }
</script>

<?php

if (isset($_POST['poista'])) {

    // Define the movie title to be deleted 
    $movieTitleToDelete = $_POST['poistettava'];

    // Find and delete related records in film_category table
    $sqlDeleteRelatedCategories = "DELETE FROM film_category 
        WHERE film_id IN (
        SELECT film_id FROM film WHERE title = '$movieTitleToDelete'
        )";

    if ($yhteys->query($sqlDeleteRelatedCategories) === TRUE) {
        // Now that related categories are deleted, delete the related records in film_actor table
        $sqlDeleteRelatedActors = "DELETE FROM film_actor 
            WHERE film_id IN (
            SELECT film_id FROM film WHERE title = '$movieTitleToDelete'
            )";

        if ($yhteys->query($sqlDeleteRelatedActors) === TRUE) {
            // Delete related rental records first
            $sqlDeleteRentals = "DELETE FROM rental 
                WHERE inventory_id IN (
                SELECT i.inventory_id FROM inventory i
                JOIN film f ON i.film_id = f.film_id
                WHERE f.title = '$movieTitleToDelete'
                )";

            if ($yhteys->query($sqlDeleteRentals) === TRUE) {
                // Now you can delete the related inventory records
                $sqlDeleteInventory = "DELETE FROM inventory 
                    WHERE film_id IN (
                    SELECT film_id FROM film WHERE title = '$movieTitleToDelete'
                    )";

                if ($yhteys->query($sqlDeleteInventory) === TRUE) {
                    // Finally, delete the movie from the film table
                    $sqlDeleteMovie = "DELETE FROM film WHERE title = '$movieTitleToDelete'";
                    if ($yhteys->query($sqlDeleteMovie) === TRUE) {
?>
                        <script>
                            alert("Elokuva poistettu");
                            // JavaScript to remove the deleted item from the list
                            window.addEventListener('onDOMContentLoaded', function() {
                                var list = document.getElementById('movie-list');
                                var items = list.getElementsByTagName('li');

                                // Loop through list items to find and remove the one with the specified title
                                for (var i = 0; i < items.length; i++) {
                                    var item = items[i];
                                    var titleElement = item.querySelector('.title');
                                    if (titleElement && titleElement.textContent.trim() === trim("<?= $movieTitleToDelete ?>")) {
                                        // Remove the item from the list
                                        list.removeChild(item);
                                        break; // Exit the loop
                                    }
                                }
                            });
                        </script>
<?php
                    } else {
                        echo "Virhe poistettaessa elokuvaa: " . $yhteys->error;
                    }
                } else {
                    echo "Virhe poistettaessa elokuvaan liittyviä inventory-tietoja: " . $yhteys->error;
                }
            } else {
                echo "Virhe poistettaessa elokuvaan liittyviä vuokraustietoja: " . $yhteys->error;
            }
        } else {
            echo "Virhe poistettaessa elokuvaan liittyviä näyttelijätietoja: " . $yhteys->error;
        }
    } else {
        echo "Virhe poistettaessa elokuvaan liittyviä kategoriatietoja: " . $yhteys->error;
    }
}

?>