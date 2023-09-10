<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// get the base time
$current_base_time = play_queue_base_time_get();

echo "Base time is: ".$current_base_time."\n";

// increase the base time by 20%
$new_base_time = $current_base_time * 1.2;

echo "Increasing base time to: ".$new_base_time."\n";

play_queue_base_time_set($new_base_time);