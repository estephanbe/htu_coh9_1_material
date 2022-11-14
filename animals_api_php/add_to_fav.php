<?php
$animal_id = !empty($_GET['id']) ? $_GET['id'] : null;

if (empty($animal_id))
    die('you are trying to access this script directly');

include './includes/functions.php';

$animals = json_decode(file_get_contents('./local_data/animals.json'));

$animals = array_filter($animals, function ($item) use ($animal_id) {
    return $item->id == $animal_id;
});

if (empty($animals))
    die('You are trying to access an animal that is not existed in our DB.');

$fav_animals = json_decode(file_get_contents('./local_data/fav_animals.json'));
$animal = $animals[array_key_first($animals)];

// check if the animal is already in the list before proceeding
foreach ($fav_animals as $fav_animal) {
    if ($fav_animal->id == $animal->id) {
        die('You are trying to add the same animal');
    }
}



$fav_animals[] = $animal;
file_put_contents('./local_data/fav_animals.json', json_encode($fav_animals));

$query_string = '';

foreach ($animal as $key => $value) {
    $query_string .= "$key=$value" . ($key != array_key_last((array) $animal) ? '&' : '');
}

ani_redirect("./animal.php?$query_string");
