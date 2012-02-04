<?php

class Translation
{
    private static $translations_file;
    
    public static function set_database($translations_file) {
        self::$translations_file = $translations_file;
    }
    
    public static function translate($text)
    {
        echo $text;
    }
    
}