<?php

declare(strict_types=1);

namespace Yethee\Tiktoken\Util;

use function array_map;
use function bin2hex;
use function hexdec;
use function str_split;

/** @psalm-type NonEmptyByteVector = non-empty-list<int<0, 255>> */
final class EncodeUtil
{
    /**
     * @param non-empty-string $text Text must be valid UTF-8 string.
     *
     * @psalm-return NonEmptyByteVector
     */
    public static function toBytes(string $text): array
    {
        $hex = bin2hex($text);
        $parts = str_split($hex, 2);
        $result = [];
        foreach ($parts as $part) {
            $result[] = hexdec($part);
        }
        return $result;
    }
}
