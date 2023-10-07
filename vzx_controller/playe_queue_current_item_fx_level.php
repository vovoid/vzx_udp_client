<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// get the base time
$current_fx_level = play_queue_current_item_fx_level_get();

echo "Fx Level is: ".$current_fx_level."\n";

// increase the base time by 20%
$new_fx_level = $current_fx_level * 1.2;

echo "Increasing fx level to: ".$new_fx_level."\n";

play_queue_current_item_fx_level_set(1.5);
