<?php
include "sivuosat/top.php";
$title = $traLocal['plants_indoor'][$lang];
$css = 'styles-lomake.css';
$script = 'lomake.js';
include "sivuosat/header.php";

$QUERY_STRING = $_SERVER['QUERY_STRING'];
$pageosa = strpos($QUERY_STRING, "&page=");
if ($pageosa !== false) {
    $search_parameters = substr($QUERY_STRING, 0, $pageosa);
} else
    $search_parameters = $QUERY_STRING;

$row_count = 8;
$right_disabled = "";
$left_disabled = "";
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $row_count;
$prev = ($page - 1) ?: 1;
$next = $page + 1;
$query = "SELECT COUNT(*) AS rivit FROM neil_plants_fi WHERE habitat = 'indoor'";
$results_initial = $yhteys->query($query);
$rows = $results_initial->fetch_assoc();
$rows = $rows['rivit'];

$last = ceil($rows / $row_count);
$last = $last ?: 1;
if ($page >= $last) {
    $page = $last;
    // $offset = ($page - 1) * $row_count;
    $right_disabled = "disabled";
}
if ($page == 1) {
    $left_disabled = "disabled";
}

$query_main =
    $lang == 'fi'
    ? ("SELECT 
        id,
        plant AS name,
        sci,
        description,
        amount,
        color,
        price,
        length,
        habitat,
        type,
        img_small,
        img_large
        FROM
        neil_plants_fi WHERE habitat = 'indoor'
        LIMIT $offset, $row_count;
        "
    )
    : ($lang == 'sv'
        ? ("SELECT 
            p.id AS id,
            sv.plant AS name,
            p.sci,
            sv.description AS description,
            p.amount,
            sv.color AS color,
            p.price,
            p.length,
            p.habitat,
            p.type,
            p.img_small,
            p.img_large
            FROM 
            neil_plants_fi AS p
            LEFT JOIN
            neil_plants_sv AS sv ON p.id = sv.original_id
            WHERE habitat = 'indoor'
            LIMIT $offset, $row_count;
            "
        )
        : ("SELECT
            p.id AS id,
            en.plant AS name,
            p.sci,
            en.description AS description,
            p.amount,
            en.color AS color,
            p.price,
            p.length,
            p.habitat,
            p.type,
            p.img_small,
            p.img_large
            FROM
            neil_plants_fi AS p 
            LEFT JOIN
            neil_plants_en AS en ON p.id = en.original_id
            WHERE habitat = 'indoor'
            LIMIT $offset, $row_count;
            "
        )
    );
$result_main = $yhteys->query($query_main);


?>

<main>
    <?php include "sivuosat/inner-nav.php"; ?>
    <section class="kauppa">
        <?php if (!isset($_GET['id'])) pagination($search_parameters, $left_disabled, $right_disabled, $prev, $next, $last, $page); ?>
        <ul id="lista">
            <?php
            if ($result_main === false) {
                die("Query error: " . $yhteys->error);
            }

            if ($result_main->num_rows > 0) {
            ?>
                <?php while ($row = $result_main->fetch_assoc()) { ?>
                    <li class="<?= isset($_GET['id']) && $_GET['id'] == $row['id'] ? 'active' : '' ?>" id="<?= $row['name'] ?>-<?= $row['color'] ?>">
                        <?php
                        if (isset($_GET['id']) && $_GET['id'] == $row['id']) {
                        ?>
                            <div class="absolute right top close-btn">
                                <a href="sisakasvit.php?random=0&page=<?= $page; ?>#lista" class="tooltip left below" data-tooltip="<?= $traCommon['close'][$lang]; ?>">
                                    <span aria-hidden="true">
                                        &times;
                                    </span>
                                    <span class="scr">
                                        <?= $traCommon['close'][$lang] ?>
                                    </span>
                                </a>
                            </div>
                        <?php
                        };
                        if (!isset($_GET['id'])) {
                        ?> <a href="sisakasvit.php?id=<?= $row['id'] ?>&page=<?= $page; ?>"> <?php } ?>
                            <figure>
                                <?php
                                if (isset($_GET['id']) && $_GET['id'] == $row['id']) {
                                ?>
                                    <img src="img/photos/<?= $row['img_large'] ?>" alt="<?= $row['name'] ?>, <?= $row['color'] ?>" />
                                <?php
                                } else {
                                ?>
                                    <img src="img/photos/<?= $row['img_small'] ?>" alt="<?= $row['name'] ?>, <?= $row['color'] ?>" />
                                <?php }; ?>
                                <figcaption>
                                    <div class="item-general">
                                        <em><?= $row['name'] ?>, <?= $row['color'] ?></em>
                                        <small>
                                            <?= $traLocal['plants_' . $row['type']][$lang] ?>, <?= $traCommon['about'][$lang] ?> <?= $row['length'] ?> cm
                                        </small>
                                        <strong><?= $row['price'] ?> &euro;</strong>
                                    </div>
                                    <?php
                                    if (isset($_GET['id']) && $_GET['id'] == $row['id']) {
                                    ?>
                                        <div class="item-description">
                                            <p><?= $row['description'] ?></p>
                                            <form method="post" class="reset no-padding flex gap">
                                                <input type="hidden" name="item" value="<?= $row['id'] ?>" />
                                                <input type="number" name="amount" class="narrow" value=1 min="1" />
                                                <button type="submit" class="add-to-cart">
                                                    <?= $traCommon['cart_add'][$lang] ?>
                                                </button>
                                            </form>
                                            <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                $item_id = intval($_POST['item']);
                                                $amount = intval($_POST['amount']);

                                                if (!isset($_SESSION['Neilikka_cart'])) {
                                                    $_SESSION['Neilikka_cart'] = [];
                                                }

                                                $cart = $_SESSION['Neilikka_cart'];
                                                if (empty($cart)) {
                                                    $cart[$item_id] = $amount;
                                                } else {
                                                    if (isset($cart[$item_id])) {
                                                        $cart[$item_id] += $amount;
                                                    } else {
                                                        $cart[$item_id] = $amount;
                                                    }
                                                }
                                                $_SESSION['Neilikka_cart'] = $cart;
                                                echo $traCommon['cart_added'][$lang];
                                            };
                                            ?>
                                            <a href="ostoskori.php"><?= $traCommon['cart_shopping'][$lang] ?> &raquo;</a>

                                        </div>
                                    <?php
                                    }
                                    ?>
                                </figcaption>
                            </figure>
                            <?php
                            if (!isset($_GET['id'])) {
                            ?>
                            </a> <?php }; ?>
                    </li>
                <?php }; ?>
            <?php }; ?>

        </ul>
        <?php if (!isset($_GET['id'])) pagination($search_parameters, $left_disabled, $right_disabled, $prev, $next, $last, $page); ?>
    </section>
</main>

<?php include "sivuosat/footer.php"; ?>