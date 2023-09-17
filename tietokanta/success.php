<?php
$title = 'Success';
$slug = strtolower(preg_replace('/[^A-Za-z\-]/', '', $title));
$css = 'styles-tietokanta.css';
include 'db-sakila.php';

?>

<?php include "head.php"; ?>

<main class="<?php echo $slug ?>">
    <section>
        <p>

            <?php
            if (isset($_GET['message'])) {
                // Get the 'message' query parameter and decode it
                $titleMovie = urldecode($_GET['message']);

                // Now, you can use the $message variable to display the message
                echo "Elokuvan \"$titleMovie\" luonti onnistui!";
            } else {
                // If 'message' query parameter is not set, handle the case accordingly
                echo "Elokuvan luonti onnistui!";
            }
            ?>
        </p>
        <a href="index.php?title=<?= $titleMovie ?>&genre=Valitse+kategoria&button=haku">Katso elokuvan sivu</a>
    </section>
</main>
<?php include "footer.php"; ?>