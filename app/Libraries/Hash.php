<?php

namespace App\Libraries;

class Hash
{
    public static function encrypt($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function check($userPassword, $hashedPassword)
    {
        if(password_verify($userPassword, $hashedPassword))
        {
            return true;
        }
        return false;
    }
}