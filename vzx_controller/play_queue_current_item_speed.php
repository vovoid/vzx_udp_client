<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// get the base time
$current_speed_information = play_queue_current_item_speed_get();
$current_speed_factor = $current_speed_information[0];
$smooth_speed_integration_enabled = $current_speed_information[1];

echo "Speed Factor is: ".$current_speed_factor."\n";
echo "Speed integration has the value: ".$smooth_speed_integration_enabled."\n";

// increase the base time by 20%
$new_speed_factor = $current_speed_factor * 0.5;

echo "Decreasing speed factor to: ".$new_speed_factor."\n";

play_queue_current_item_speed_set($new_speed_factor);
