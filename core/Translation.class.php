<?php

require_once(dirname(__FILE__) . '/../libs/yaml/lib/sfYamlParser.php');
require_once(dirname(__FILE__) . '/../libs/yaml/lib/sfYamlDumper.php');

class Translation
{
    private static $translations_file;
    private static $language;
    
    public static function set_database($translations_file)
    {
        self::$translations_file = $translations_file;
    }
    
    public static function set_language($language)
    {
        self::$language = $language;
    }
    
    public static function translate($text)
    {
        $Yaml = new sfYamlParser();
        $dictionary = $Yaml->parse(file_get_contents(self::$translations_file));
        
        echo !isset($dictionary[$text][self::$language]) ? $text : $dictionary[$text][self::$language];
    }
    
}