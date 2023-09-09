<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// alternative 1: the dedicated function for this
//play_queue_set_to_pack("classics");

// alternative 2: clear and add
play_queue_clear();
play_queue_add_pack("classics");