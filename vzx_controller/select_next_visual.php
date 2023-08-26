<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_call.php');

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// 1. query for current (soon to be previous) play queue index
$previous_play_queue_index = get_current_play_queue_index();
if ($previous_play_queue_index === FALSE) {
    die("Could not get current play index...");
}

// 2. ask for next visual
echo "Play queue index before the change is: " . $previous_play_queue_index . "\n";
$req = new request();
$req->action = action_t::next_visual;

echo "Requesting next visual in the play queue...\n";
$response = vzx_controller_api_call($req);

// 3. spin + re-request current index until the visual has changed, up to 1000 cycles
$new_play_queue_index = 0;
for ($i = 0; $i < 1000; $i++) {
    echo "Requesting play queue index for the ".$i."\n";
    $possibly_changed_index = get_current_play_queue_index();
    if (is_int($possibly_changed_index)) {
        if ($previous_play_queue_index != $possibly_changed_index) {
            $new_play_queue_index = $possibly_changed_index;
            break;
        }
    }

    // don't bombard the server too much
    usleep(10);
}

echo "After changing visual, the new play queue index is: " . $new_play_queue_index . "\n";
