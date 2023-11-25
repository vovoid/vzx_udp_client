<?php

include(dirname(__FILE__) . '/api/vzx_controller_api_helpers.php');

// alternative 1: the dedicated function for this
//play_queue_set_to_playlist("playlist_0");

// alternative 2: clear and add
play_queue_clear();

// Default playlist name is "My Playlist" and the playlist_handle is "playlist_0"
play_queue_add_playlist("playlist_0");

// If you create another playlist, you can add that too
play_queue_add_playlist("playlist_1");