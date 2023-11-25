<?php

enum result_t: int
{
    case unknown_command = 0;
    case error_controller_not_connected_to_player = 1;
    case success = 1000;
    case error_index_out_of_bounds = 2;
    case error_item_not_found = 3;
}

class response
{
    // 0..3 this is an uint32_t (little endian)
    public action_t $action = action_t::unknown_command;

    // 4..7 this is an uint32_t (little endian)
    public result_t $result = result_t::unknown_command;

    // 8..15 this is an uint64_t (little endian)
    public int $integer_1 = 0;
    // 16..23 this is an uint64_t (little endian)
    public int $integer_2 = 0;
    // 24..31 this is an uint64_t (little endian)
    public int $integer_3 = 0;
    // 32..39 this is an uint64_t (little endian)
    public int $integer_4 = 0;

    // 40..47 double
    public float $double_1 = 0;
    // 48..55 double
    public float $double_2 = 0;
    // 56..63 double
    public float $double_3 = 0;
    // 64..71 double
    public float $double_4 = 0;

    // 72..135 64 characters
    public string $string_1 = "";
    // 136..199 64 characters
    public string $string_2 = "";
    // 200..263 64 characters
    public string $string_3 = "";

    // 264..327 64 characters
    public string $string_4 = "";

    // total size (no proper sizeof in php, have to count manually)
    const size_bytes = 328;

    public function is_ok()
    {
        return $this->result == result_t::success;
    }

    public function result_as_string(): string
    {
        if ($this->result == result_t::success)
            return "Success";
        if ($this->result == result_t::error_controller_not_connected_to_player)
            return "Error: Not connected to player";
        if ($this->result == result_t::error_index_out_of_bounds)
            return "Error: Index out of bounds. ";
        if ($this->result == result_t::unknown_command)
            return "Error: Unknown command.";

        // this should never be reached
        return "Unreachable code!";
    }

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

        // integer_1 - bytes 8..15
        {
            $unpack_result = unpack('P', $data, 8);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->integer_1 = $unpack_result[1];
        }

        // integer_2 - bytes 16..23
        {
            $unpack_result = unpack('P', $data, 16);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->integer_2 = $unpack_result[1];
        }

        // integer_3 - bytes 24..31
        {
            $unpack_result = unpack('P', $data, 24);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->integer_3 = $unpack_result[1];
        }

        // integer_4 - bytes 32..39
        {
            $unpack_result = unpack('P', $data, 32);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->integer_4 = $unpack_result[1];
        }

        // double_1 - bytes 40..47
        {
            $unpack_result = unpack('d', $data, 40);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->double_1 = $unpack_result[1];
        }

        // double_2 - bytes 48..55
        {
            $unpack_result = unpack('d', $data, 48);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->double_2 = $unpack_result[1];
        }

        // double_3 - bytes 56..63
        {
            $unpack_result = unpack('d', $data, 56);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->double_3 = $unpack_result[1];
        }

        // double_4 - bytes 64..71
        {
            $unpack_result = unpack('d', $data, 64);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->double_4 = $unpack_result[1];
        }

        // string_1 - bytes 72..135
        {
            $unpack_result = unpack('a64', $data, 72);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->string_1 = trim($unpack_result[1]);
        }

        // string_2 - bytes 136..199
        {
            $unpack_result = unpack('a64', $data, 136);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->string_2 = trim($unpack_result[1]);
        }

        // string_3 - bytes 200..263
        {
            $unpack_result = unpack('a64', $data, 200);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->string_3 = trim($unpack_result[1]);
        }

        // string_3 - bytes 264..327
        {
            $unpack_result = unpack('a64', $data, 264);
            if (is_bool($unpack_result)) {
                echo "unpack() call failed, returning";
                return;
            }

            $this->string_4 = trim($unpack_result[1]);
        }
    }
}