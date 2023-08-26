<?php

enum result_t: int
{
    case unknown_command = 0;
    case error_controller_not_connected_to_player = 1;
    case success = 1000;
}

class response
{
    // 0..3 this is an uint32_t (little endian)
    public action_t $action = action_t::unknown_command;

    // 4..7 this is an uint32_t (little endian)
    public result_t $result = result_t::unknown_command;

    // 8..15 this is an uint64_t (little endian)
    public int $integer_1 = 0;

    // total size (no proper sizeof in php, have to count manually)
    const size_bytes = 16;

    public function __construct(string $data)
    {
        $this->deserialize_binary($data);
    }

    public function deserialize_binary($data): void
    {
        // action - bytes 0..3
        {
            $unpack_action = unpack('L', $data, 0);
            if (is_bool($unpack_action)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->action = action_t::from($unpack_action[1]);
        }

        // result - bytes 4..7
        {
            $unpack_result = unpack('L', $data, 4);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->result = result_t::from($unpack_result[1]);
        }

        // result_integer - bytes 8..15
        {
            $unpack_result = unpack('P', $data, 8);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->integer_1 = $unpack_result[1];
        }
    }
}