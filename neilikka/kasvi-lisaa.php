<?php
include "sivuosat/top.php";
$title = $traLocal['plants_add'][$lang];
$loggedIn = secure_page_admin();
$script = 'lomake.js';
$css = 'styles-lomake.css';
include "sivuosat/header.php";
?>



<main>
    <section class="admin">

        <?php include "sivuosat/form_language.php" ?>

        <form autocomplete="on" method="post" id="form-plant" action="kasvi-lisaa-kasittely.php">
            <legend class="scr"><?= $traLocal['plants'][$lang]; ?></legend>

            <label for="sci"><?= $traLocal['sci'][$lang]; ?></label>
            <input type="text" name="sci" id="sci" placeholder="<?= $traLocal['sci'][$lang]; ?>" required />
            <div class="error"></div>

            <fieldset>
                <legend><?= $traCommon['name'][$lang]; ?> (<?= $traLocal['plant'][$lang]; ?>)</legend>
                <label for="plant"><?= $traCommon['Finnish'][$lang]; ?>: <?= $traLocal['name_plant']['fi']; ?></label>
                <input type="text" name="plant" id="plant" placeholder="<?= $traLocal['name_plant']['fi']; ?>" required />
                <div class="error"></div>

                <label for="plant_sv"><?= $traCommon['Swedish'][$lang]; ?>: <?= $traLocal['name_plant']['sv']; ?></label>
                <input type="text" name="plant_sv" id="plant_sv" placeholder="<?= $traLocal['name_plant']['sv']; ?>" required />
                <div class="error"></div>

                <label for="plant_en"><?= $traCommon['English'][$lang]; ?>: <?= $traLocal['name_plant']['en']; ?></label>
                <input type="text" name="plant_en" id="plant_en" placeholder="<?= $traLocal['name_plant']['en']; ?>" required />
                <div class="error"></div>
            </fieldset>

            <fieldset>
                <legend><?= $traCommon['color'][$lang]; ?></legend>
                <label for="color"><?= $traCommon['Finnish'][$lang]; ?>: <?= $traCommon['color']['fi']; ?></label>
                <input type="text" name="color" id="color" placeholder="<?= $traCommon['color']['fi']; ?>" required />
                <div class="error"></div>

                <label for="color_sv"><?= $traCommon['Swedish'][$lang]; ?>: <?= $traCommon['color']['sv']; ?></label>
                <input type="text" name="color_sv" id="color_sv" placeholder="<?= $traCommon['color']['sv']; ?>" required />
                <div class="error"></div>

                <label for="color_en"><?= $traCommon['English'][$lang]; ?>: <?= $traCommon['color']['en']; ?></label>
                <input type="text" name="color_en" id="color_en" placeholder="<?= $traCommon['color']['en']; ?>" required />
                <div class="error"></div>
            </fieldset>
            <fieldset>
                <legend><?= $traCommon['description'][$lang]; ?></legend>
                <label for="description"><?= $traCommon['Finnish'][$lang]; ?>: <?= $traCommon['description']['fi']; ?></label>
                <textarea name="description" id="description" placeholder="<?= $traCommon['description']['fi']; ?>" rows="6" required></textarea>
                <div class="error"></div>

                <label for="description_sv"><?= $traCommon['Swedish'][$lang]; ?>: <?= $traCommon['description']['sv']; ?></label>
                <textarea name="description_sv" id="description_sv" placeholder="<?= $traCommon['description']['sv']; ?>" rows="6" required></textarea>
                <div class="error"></div>

                <label for="description_en"><?= $traCommon['English'][$lang]; ?>: <?= $traCommon['description']['en']; ?></label>
                <textarea name="description_en" id="description_en" placeholder="<?= $traCommon['description']['en']; ?>" rows="6" required></textarea>
                <div class="error"></div>
            </fieldset>

            <label for="amount"><?= $traCommon['amount'][$lang]; ?></label>
            <input type="number" name="amount" id="amount" placeholder="<?= $traCommon['amount'][$lang]; ?>" required />
            <div class="error"></div>

            <label for="price"><?= $traCommon['price'][$lang]; ?></label>
            <input type="number" name="price" id="price" placeholder="<?= $traCommon['price'][$lang]; ?>" required />
            <div class="error"></div>

            <label for="length"><?= $traCommon['length'][$lang]; ?></label>
            <input type="number" name="length" id="length" placeholder="<?= $traCommon['length'][$lang]; ?>" required />
            <div class="error"></div>

            <label for="habitat"><?= $traLocal['habitat'][$lang]; ?></label>
            <select name="habitat" id="habitat" required>
                <option value="indoor"><?= $traLocal['plants_indoor'][$lang]; ?></option>
                <option value="outdoor"><?= $traLocal['plants_outdoor'][$lang]; ?></option>
            </select>
            <div class="error"></div>

            <label for="type"><?= $traCommon['type'][$lang]; ?></label>
            <select name="type" id="type" required>
                <option value="cut"><?= $traLocal['plants_cut'][$lang]; ?></option>
                <option value="pot"><?= $traLocal['plants_pot'][$lang]; ?></option>
            </select>
            <div class="error"></div>

            <label for="image_small"><?= $traCommon['filename'][$lang]; ?>: <?= $traCommon['image'][$lang]; ?>, <?= $traCommon['small'][$lang]; ?></label>
            <input type="text" name="image_small" id="image_small" placeholder="<?= $traCommon['filename'][$lang]; ?>.jpg" />
            <div class="error"></div>

            <label for="image_big"><?= $traCommon['filename'][$lang]; ?>: <?= $traCommon['image'][$lang]; ?>, <?= $traCommon['big'][$lang]; ?></label>
            <input type="text" name="image_big" id="image_big" placeholder="<?= $traCommon['filename'][$lang]; ?>.jpg" />
            <div class="error"></div>

            <button type="submit"><?= $traCommon['submit'][$lang]; ?></button>
        </form>

    </section>
</main>

<?php include "sivuosat/footer.php"; ?>