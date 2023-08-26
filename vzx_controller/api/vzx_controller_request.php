<?php

enum action_t: int
{
    case unknown_command = 0;

    // play queue operations
    case previous_visual = 1;
    case next_visual = 2;
    case get_current_play_queue_index = 3;
}

class request
{
    // this is an uint32_t (little endian)
    public action_t $action = action_t::unknown_command;

    /**
     * PHP's idea of a binary chunk of data is a string, not perfect but will have to do.
     * @return string
     */
    public function serialize_binary(): string
    {
        $buffer = pack('L', $this->action->value);
        if (is_bool($buffer))
        {
            echo "pack() command failed, returning...";
            return '';
        }

        return $buffer;
    }
}
