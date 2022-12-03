<?php

class PasswordGenerator
{
    public static $pin;
    public static $password;
    public static $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public static function makePassword($length){
        $charactersLength = strlen(self::$characters);
        for ($i = 0; $i < $length; $i++) {
            self::$password .= self::$characters[rand(0, $charactersLength - 1)];
        }
        return self::$password;
    }

    public static function makePin($length = 4){
        if($length > 0){
            self::$pin.=mt_rand(0,9);
            return self::makePin($length-1);
        }
        return self::$pin;
    }
}

