<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// get the random factor applied to base time to determine the time until next visual
$current_random_factor = play_queue_progression_random_factor_get();

echo "Progression random factor is: ".$current_random_factor."\n";

// increase the random factor by 20%
$new_random_factor = $current_random_factor + 0.2;

echo "Increasing random factor to: ".$new_random_factor."\n";

play_queue_progression_random_factor_set($new_random_factor);
