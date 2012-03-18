<?php

class System
{
    private static $module_path;
    private static $debugging_mode;
    private static $language;
    
    public static function start()
    {
        $time = microtime();
        $time = explode(" ", $time);
        
        session_start();
        
        return $time[1] + $time[0];
    }
    
    public static function set_module_path($module_path)
    {
        self::$module_path = $module_path;
    }
    
    public static function set_debug_mode($ip_addresses, $is_enabled = FALSE)
    {   
        if ($is_enabled && in_array($_SERVER['REMOTE_ADDR'], unserialize($ip_addresses)))
        {
            self::$debugging_mode = 'enabled';
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        }
        else
        {
            self::$debugging_mode = 'disabled';
            error_reporting(0);
            ini_set('display_errors', 0);
        }
    }
    
    public static function include_module_item($module, $item)
    {
        $item_path = self::$module_path . '/' . $module . '/' . $module . '.' . $item . '.php';

        if (file_exists($item_path)) {
            return require($item_path);
        }

        return FALSE;
    }
    
    public static function set_language($default_language, $languages_array,
            $needed_language = NULL)
    {
        $languages_array = unserialize($languages_array);
        
        if (is_null($needed_language))
        {
            $_SESSION['lang'] = $languages_array[$default_language];
            self::$language = $languages_array[$default_language];
        }
        else
        {
            $position = array_search($needed_language, $languages_array);
            
            if (is_numeric($position))
            {
                $_SESSION['lang'] = $languages_array[$position];
                self::$language = $languages_array[$position];
            }
            else
            {
                $_SESSION['lang'] = $languages_array[$default_language];
                self::$language = $languages_array[$default_language];
            }
        }
    }
    
    public static function get_language()
    {
        return self::$language;
    }
    
    public static function redirect($module)
    {
        $url = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}/" . self::get_language() . "/$module";
        
        header('Location: ' . $url);
        exit;
    }
    
    public static function get_debugging_mode()
    {
        return self::$debugging_mode;
    }
    
    public static function dot_to_comma($float_number, $numbers = 2)
    {
        return number_format($float_number, $numbers, ',', '');
    }
}