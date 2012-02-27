<?php

/**
 * Translation function
 * @param string $text 
 */
function __($text)
{
    Translation::translate($text);
}

function stripbackslashes(&$string)
{
    $string = str_replace('/', '\\/', $string);
}

array_walk_recursive($_GET, 'stripbackslashes');

foreach ($config as $key => $value)
    define($key, $value);

/*
 * CSS
 */
if (!empty($_GET['css']))
{

    header("Content-Type: text/css");

    if (file_exists(CSS_PATH . '/' . $_GET['css']))
        echo file_get_contents(CSS_PATH . '/' . $_GET['css']);
    else
        if (file_exists(PUBLIC_PATH . '/' . CSS_DIR . '/' . $_GET['css']))
            echo file_get_contents(PUBLIC_PATH . '/' . CSS_DIR . '/' . $_GET['css']);

    exit;
}

/*
 * DEPENDENTS
 */
$filenames = glob(CORE_PATH . '/*.class.php');

foreach($filenames as $filename)
    require($filename);

/*
 * SYSTEM SETUP
 */
$start_time = System::start();

if (empty($_GET['lang']) || empty($_SESSION['lang']))
    System::set_language(DEFAULT_LANGUAGE, LANGUAGES);
elseif (!empty($_GET['lang'])) 
    System::set_language (DEFAULT_LANGUAGE, LANGUAGES, $_GET['lang']);

Translation::set_database(TRANSLATION_DATABASE);
Translation::set_language(System::get_language());

$default_module = !empty($_SESSION['user']) ? DEFAULT_USER_MODULE : DEFAULT_GUEST_MODULE;

$module = !empty($_GET['module']) ? $_GET['module'] : $default_module;
$action = !empty($_GET['action']) ? $_GET['action'] : NULL;

$modules_path = MODULES_PATH;
$layouts_path = LAYOUTS_PATH;

if ($module === 'admin')
{
    $modules_path = ROOT_PATH . '/' . MODULES_DIR;
    $layouts_path = ROOT_PATH . '/' . LAYOUTS_DIR;
}

System::set_debug_mode(DEBUGGING_IP,DEBUGGING_MODE);
System::set_module_path($modules_path);

System::include_module_item($module, 'model');

if (System::include_module_item($module, 'controller') === FALSE)
    System::redirect($default_module);

$Module = new Module();
$Module->set_layouts_path($layouts_path);
$Module->set_module_name($module);
$Module->set_modules_path($modules_path);
$Module->set_debugging_mode(System::get_debugging_mode());
$Module->set_start_time($start_time);

if (!is_null($action) && method_exists($Module, $action))
    $Module->set_action($action);
else
    $Module->set_action('index');
