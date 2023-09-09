<?php
$start = $_GET["start"] ?? 0;
$end = $_GET["end"] ?? 25;

# Make posts
$data = [];
for ($i = $start; $i <= $end; $i++) {
    $data[] = array(
        "title" => "Post #$i title",
        "content" => "Content of post #$i"
    );
}

$tulos = array("posts" => $data);

echo json_encode($tulos);
