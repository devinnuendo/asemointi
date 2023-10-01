<?php
include "sivuosat/top.php";
$title = $traLocal['plants_outdoor'][$lang];
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
$query = "SELECT COUNT(*) AS rivit FROM neil_plants_fi WHERE habitat = 'outdoor'";
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
        neil_plants_fi WHERE habitat = 'outdoor'
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
            WHERE habitat = 'outdoor'
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
            WHERE habitat = 'outdoor'
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
                <?php while ($row = $result_main->fetch_assoc()) {
                    product_li('ulkokasvit', $row, $page);
                }; ?>
            <?php }; ?>

        </ul>
        <?php if (!isset($_GET['id'])) pagination($search_parameters, $left_disabled, $right_disabled, $prev, $next, $last, $page); ?>
    </section>
    <?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $query =
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
            FROM neil_plants_fi
            WHERE id = $id
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
                WHERE id = $id
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
                WHERE id = $id
                "
                )
            );
        $result = $yhteys->query($query);
        $row = $result->fetch_assoc();
        product_modal('ulkokasvit', $row, $page);
    } ?>
</main>

<?php include "sivuosat/footer.php"; ?>