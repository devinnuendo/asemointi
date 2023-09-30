<?php
include "sivuosat/top.php";
$title = $traCommon['gallery'][$lang];
// $img640 = 'flower-3231083_640.jpg';
// $img1280 = 'flower-3231083_1280.jpg';
// $script = 'lomake.js';
// $css = 'styles-lomake.css';
include "sivuosat/header.php"; ?>

<main>
    <section>
        <div class="gallery">
            <div class="row">
                <?php
                $imageDirectory = 'img/photos';
                $imageFiles = glob("$imageDirectory/*_640.*");

                $columnCount = min(4, count($imageFiles)); // Maximum 4 columns for responsiveness
                $imagesPerColumn = ceil(count($imageFiles) / $columnCount);

                for ($i = 0; $i < $columnCount; $i++) {
                    echo '<div class="column">';
                    for ($j = $i * $imagesPerColumn; $j < ($i + 1) * $imagesPerColumn; $j++) {
                        if ($j >= count($imageFiles)) {
                            break;
                        }
                        $thumbnail = $imageFiles[$j];
                        $fullSize = str_replace('_640', '_1280', $thumbnail);
                ?>
                        <div class="image-wrap">
                            <img src="<?= $thumbnail ?>" data-full="<?= $fullSize ?>" alt="<?= $traLocal['flowers'][$lang]; ?>">
                        </div>
                <?php }
                    echo '</div>';
                } ?>
            </div>


            <div id="modal" class="modal" style="display: none;">
                <button id="modal-close" class="modal-close">&times;</button>
                <img id="modal-image" class="modal-image">
            </div>

            <script>
                const images = document.querySelectorAll('.image-wrap');
                const modal = document.getElementById('modal');
                const modalImage = document.getElementById('modal-image');
                const close = document.getElementById('modal-close');

                images.forEach(image => {
                    image.addEventListener('click', () => {
                        modal.style.display = 'flex';
                        modalImage.src = image.querySelector('img').getAttribute('data-full');
                    });
                });

                close.addEventListener('click', () => {
                    modal.style.display = 'none';
                });
            </script>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>