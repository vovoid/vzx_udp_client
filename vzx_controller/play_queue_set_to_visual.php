<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// alternative 1: use the dedicated function for this
//play_queue_set_to_visual("classics", "starlight_aurora");

// alternative 2: clear, then add
play_queue_clear();
play_queue_add_visual("classics", "starlight_aurora");