<?php

enum action_t: int
{
    case unknown_command = 0;

    // play queue operations
    case play_queue_previous_visual = 1;
    case play_queue_next_visual = 2;

    // set the index in the play queue
    // request: request_index in $integer_1
    // response: the same index back in $integer_1
    case play_queue_set_current_index = 3;

    // get the currently playing index
    // current_index is returned in $result_integer
    case play_queue_get_current_index = 4;

    // get the number of items in play queue
    // count is returned in $result_integer
    case play_queue_get_number_of_items = 5;
}

class request
{
    // 0..4 this is an uint32_t (little endian)
    public action_t $action = action_t::unknown_command;

    // 5..12 uint64_t
    public int $integer_1 = 0;
    // 13..20 uint64_t
    public int $integer_2 = 0;
    // 21..28 uint64_t
    public int $integer_3 = 0;
    // 29..36 uint64_t
    public int $integer_4 = 0;

    // 37..44 double
    public float $float_1 = 0;
    // 45..52 double
    public float $float_2 = 0;
    // 53..60 double
    public float $float_3 = 0;
    // 61..68 double
    public float $float_4 = 0;

    // 69..132 64 characters
    public string $handle_1 = "";
    // 133..196 64 characters
    public string $handle_2 = "";
    // 197..260 64 characters
    public string $handle_3 = "";

    /**
     * PHP's idea of a binary chunk of data is a string, not perfect but will have to do.
     * @return string
     */
    public function serialize_binary(): string
    {
        $buffer = pack(
            'LPPPPdddda64a64a64x',
            $this->action->value,
            $this->integer_1,
            $this->integer_2,
            $this->integer_3,
            $this->integer_4,
            $this->float_1,
            $this->float_2,
            $this->float_3,
            $this->float_4,
            $this->handle_1,
            $this->handle_2,
            $this->handle_3,
        );
        $len = strlen($buffer);
        if (is_bool($buffer))
        {
            echo "pack() command failed, returning...";
            return '';
        }

        return $buffer;
    }
}
