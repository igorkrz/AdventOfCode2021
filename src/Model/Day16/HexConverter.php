<?php

namespace App\Model\Day16;

use App\Enum\Day16\HexEnum;

class HexConverter
{
    public static function convert(string $hexString): string
    {
        $split = str_split($hexString);
        $binString = '';

        foreach ($split as $item) {
            $binString .= HexEnum::HEX2BIN[$item];
        }

        return $binString;
    }
}