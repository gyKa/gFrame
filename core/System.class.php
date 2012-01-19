<?php

class System
{
    public static function start()
    {
        session_start();
    }
    
    public static function set_debug_mode($is_enabled = FALSE)
    {
        if ($is_enabled)
        {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        }
        else
        {
            error_reporting(0);
            ini_set('display_errors', 0);
        }
    }
}