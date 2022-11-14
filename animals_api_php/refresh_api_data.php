<?php

require './includes/functions.php';

$animals_array = array();
for ($i = 0; $i < 20; $i++) {
    $animals_array[] = json_decode(file_get_contents(ANIMALS_API_URL));
}
file_put_contents('./local_data/animals.json', json_encode($animals_array));

ani_redirect('./home.php');
