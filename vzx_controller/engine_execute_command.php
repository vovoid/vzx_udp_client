<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// Before trying this, load the "smoothed_line" state in the player as a custom visual.

// Also copy & load it in Artiste to see how it's laid out.

// By sending commands to the engine, you can control almost any aspect of a state.

// move the white line up, pretty quickly (10.0 speed)
engine_execute_command("param_set_interpolate float_smoother_1 value_in 1.0 10.0");

// wait 3 seconds for the animation to settle down
sleep(3);

// move the white line back down again, slower this time (0.5 speed)
engine_execute_command("param_set_interpolate float_smoother_1 value_in 0.0 0.5");
