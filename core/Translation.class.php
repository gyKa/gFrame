<?php

require_once(dirname(__FILE__) . '/../libs/yaml/lib/sfYamlParser.php');
require_once(dirname(__FILE__) . '/../libs/yaml/lib/sfYamlDumper.php');

class Translation
{
    private static $translations_file;
    
    public static function set_translation_file($translations_file) {
        self::$translations_file = $translations_file;
    }
    
    public static function translate($text)
    {
        echo $text;
    }
    
}