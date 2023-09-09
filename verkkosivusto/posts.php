<?php
$start = $_GET["start"] ?? 0;
$end = $_GET["end"] ?? 25;

$h2 = array(
    'Lorem ipsum dolor sit amet',
    'Mauris ac augue molestie',
    'Integer pretium',
    'Vivamus maximus cursus augue, eu fringilla purus pellentesque at',
    'Etiam blandit tristique est ac maximus',
    'Ut eget rhoncus felis, vitae tincidunt ante',
    'Cras quis elementum neque',
    'Donec dictum, ante nec porta blandit',
    'Donec pretium nisl ac urna interdum, et maximus velit fringilla',
    'Nunc ultrices tellus justo, vitae egestas dolor vulputate nec',
    'Nullam mollis nulla nisl, id viverra mi elementum sed',
    'Morbi nec arcu nec lacus laoreet feugiat at a enim',
    'Mauris dui velit, fermentum ac eros nec, rutrum pellentesque purus',
    'Nulla dictum nisl sed metus porta, nec sagittis odio tempor',
    'Nulla semper suscipit leo a ullamcorper',
    'Fusce elit nunc, ultrices in nibh sed, egestas sagittis quam',
    'Phasellus vel eros in quam lobortis finibus',
    'Etiam mattis ex nec lacus rhoncus, quis condimentum eros malesuada',
    'Nullam in ipsum efficitur felis sagittis finibus',
    'Maecenas tempor rutrum quam',
    'Aliquam a laoreet ante',
    'Aliquam id mi tincidunt, lobortis est non, lacinia magna',
    'Maecenas ac justo quis neque hendrerit malesuada',
);
# Make content for posts
$content = array(
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fermentum, magna eu volutpat ornare, tellus ipsum porttitor quam, vitae dignissim tortor erat id diam. Aenean laoreet blandit gravida. Quisque fringilla est vitae tempus luctus. Mauris ac augue molestie, egestas sapien eu, tempus leo. Praesent a accumsan augue, quis lacinia dui.',
    'Morbi pharetra sem sit amet nulla faucibus, id tempor eros ullamcorper. ',
    'Integer erat leo, molestie at est sed, egestas pulvinar ante. Suspendisse at tortor auctor justo fringilla lobortis vitae non nulla. Duis tempus urna ut magna pharetra interdum. Integer pretium nunc sit amet ultricies blandit.',
    'In facilisis sem commodo dolor facilisis bibendum. Vivamus dapibus elit eget nisl vehicula, id semper ante consectetur. ',
    'Pellentesque quis tellus lectus. Suspendisse sit amet scelerisque nunc, ut consectetur arcu. Duis diam tellus, blandit ac odio ac, placerat auctor libero. Nullam in ipsum efficitur felis sagittis finibus. Morbi finibus sagittis lacus. Donec finibus nibh non leo sodales, et ornare enim cursus. Nunc consequat risus arcu, at placerat nibh mattis sit amet. Nulla egestas et orci feugiat dapibus. Praesent et mollis arcu, sit amet bibendum massa. Integer lobortis neque vitae ex rhoncus dictum.',
    'Nulla semper suscipit leo a ullamcorper. Fusce elit nunc, ultrices in nibh sed, egestas sagittis quam. Vivamus maximus cursus augue, eu fringilla purus pellentesque at. ',
    'Phasellus vel eros in quam lobortis finibus. ',
    'Etiam blandit tristique est ac maximus. Sed euismod gravida purus, at facilisis ante tincidunt consectetur. Sed placerat eros in lobortis fermentum. Morbi aliquam turpis a arcu luctus fermentum. ',
    'Ut eget rhoncus felis, vitae tincidunt ante. Fusce in pulvinar est, et ultrices urna. Aliquam volutpat nisl eu efficitur rutrum. Praesent augue enim, rhoncus a mi viverra, vehicula ultrices nulla. Donec suscipit dui vel nulla fringilla porttitor. Quisque egestas risus nulla, suscipit placerat lectus faucibus vel. Donec eu ex ex.Maecenas ex justo, pellentesque vitae posuere quis, eleifend id lorem. Sed dapibus a justo eu luctus. ',
    'Cras quis elementum neque. Vestibulum varius justo at arcu laoreet, commodo pulvinar velit bibendum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam mattis ex nec lacus rhoncus, quis condimentum eros malesuada. ',
    'Donec dictum, ante nec porta blandit, nunc leo lacinia urna, a tristique augue est eleifend lectus. Aliquam id mi tincidunt, lobortis est non, lacinia magna. Aliquam a laoreet ante. Donec pretium nisl ac urna interdum, et maximus velit fringilla. ',
    'Nunc ultrices tellus justo, vitae egestas dolor vulputate nec. Sed consectetur vehicula turpis eu tempus. Maecenas tempor rutrum quam. ',
    'Nullam mollis nulla nisl, id viverra mi elementum sed. Cras finibus arcu mi, sed elementum purus lacinia non. Mauris dui velit, fermentum ac eros nec, rutrum pellentesque purus. Nulla ut mauris facilisis, tristique dolor efficitur, interdum nulla. Maecenas ac justo quis neque hendrerit malesuada. Donec nec lobortis nisi, id viverra ipsum. ',
    'Morbi nec arcu nec lacus laoreet feugiat at a enim. Nam tellus tellus, gravida quis libero hendrerit, congue volutpat orci. Ut at pulvinar quam, in pretium enim. Nulla dictum nisl sed metus porta, nec sagittis odio tempor.'
);


# Make posts
$data = [];
for ($i = $start; $i <= $end; $i++) {
    $randomContent = $content[array_rand($content)];
    $randomTitle = $h2[array_rand($h2)];
    $data[] = array(
        "id" => $i,
        "title" => "$randomTitle",
        "content" => "<p>$randomContent</p>"
    );
}

$tulos = array("posts" => $data);

echo json_encode($tulos);
