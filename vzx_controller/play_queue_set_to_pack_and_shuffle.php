<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// add all "classics" visuals to the play queue
play_queue_set_to_pack("classics");

// shuffle them
play_queue_shuffle();

// play from beginning
play_queue_set_current_index(0);
