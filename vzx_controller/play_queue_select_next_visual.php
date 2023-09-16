<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// Before running this script:
// - Make sure there are at least 2 entries in the play queue

// 1. query for current (soon to be previous) play queue index
$previous_play_queue_index = play_queue_progression_get_current_index();
if ($previous_play_queue_index === FALSE) {
    die("Could not get current play index...");
}

// 2. ask for next visual
echo "Play queue index before the change is: " . $previous_play_queue_index . "\n";
echo "Requesting next visual in the play queue...\n";
play_queue_progression_select_next_visual();

// 3. spin + re-request current index until the visual has changed, up to 1000 cycles
$new_play_queue_index = 0;
for ($i = 0; $i < 1000; $i++) {
    echo "Requesting play queue index, iteration ".$i."\n";
    $possibly_changed_index = play_queue_progression_get_current_index();
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
