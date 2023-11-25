<?php

include(dirname(__FILE__) . '/vzx_controller_request_action.php');

class request
{
    const request_size_in_bytes = 324;

    // 0..3 this is an uint32_t (little endian)
    public action_t $action = action_t::unknown_command;

    // 4..11 uint64_t
    public int $integer_1 = 0;
    // 12..19 uint64_t
    public int $integer_2 = 0;
    // 20..27 uint64_t
    public int $integer_3 = 0;
    // 28..35 uint64_t
    public int $integer_4 = 0;

    // 36..43 double
    public float $double_1 = 0;
    // 44..51 double
    public float $double_2 = 0;
    // 52..59 double
    public float $double_3 = 0;
    // 60..67 double
    public float $double_4 = 0;

    // 68..131 64 characters
    public string $string_1 = "";
    // 132..195 64 characters
    public string $string_2 = "";
    // 196..259 64 characters
    public string $string_3 = "";
    // 260..323 64 characters
    public string $string_4 = "";

    /**
     * PHP's idea of a binary chunk of data is a string, not perfect but will have to do.
     * @return string
     */
    public function serialize_binary(): string
    {
        $buffer = pack(
            'LPPPPdddda64a64a64a64',
            $this->action->value,
            $this->integer_1,
            $this->integer_2,
            $this->integer_3,
            $this->integer_4,
            $this->double_1,
            $this->double_2,
            $this->double_3,
            $this->double_4,
            $this->string_1,
            $this->string_2,
            $this->string_3,
            $this->string_4,
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
