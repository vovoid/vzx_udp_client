<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// get the base time
$number_of_palettes = palette_get_number_of_palettes();

echo "Number of palettes: ".$number_of_palettes."\n";
