<?php

namespace App\Libraries;

/**
 * Class for hash plan text.
 */
class Hash
{
    /**
     * Make plan text hashed.
     *
     * @param string $value Plain text.
     * @return string $hashed
     */
    public static function make(string $value): string
    {
        return password_hash($value, PASSWORD_DEFAULT);
    }

    /**
     * Check if value and hashedValue is equal.
     *
     * @param string $value
     * @param string $hashedValue
     * @return bool
     */
    public static function check(string $value, string $hashedValue): bool
    {
        return (password_verify($value, $hashedValue)) ? true : false;
    }
}
