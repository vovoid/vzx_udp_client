<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// Before running this script:
// - Make sure there are at least 3 entries in the play queue

// 1. query for how many items are currently in the play queue
$number_of_items_in_play_queue = play_queue_get_number_of_items();
if ($number_of_items_in_play_queue === FALSE) {
    die("Could not get current play index...");
}

echo "Number of items in play queue: ". $number_of_items_in_play_queue."\n";

$visual_index_to_select = rand() % $number_of_items_in_play_queue;
echo "Selecting visual with index: ".$visual_index_to_select."\n";
play_queue_set_current_index($visual_index_to_select);

// you could add spin and wait for the change here if you need...
