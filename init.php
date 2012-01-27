<?php

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

require(CORE_PATH . '/System.class.php');
require(CORE_PATH . '/Controller.class.php');

System::start();
System::set_debug_mode(DEBUGGING_MODE);
System::set_module_path(MODULES_PATH);

$default_module = !empty($_SESSION['user']) ? DEFAULT_USER_MODULE : DEFAULT_GUEST_MODULE;

$module = !empty($_GET['module']) ? $_GET['module'] : $default_module;
$action = !empty($_GET['action']) ? $_GET['action'] : NULL;

System::include_module_item($module, 'model');

if (System::include_module_item($module, 'controller') === FALSE)
    System::redirect($default_module);

$Module = new Module();
$Module->set_layouts_path(LAYOUTS_PATH);
$Module->set_module_name($module);
$Module->set_modules_path(MODULES_PATH);

if (!is_null($action) && method_exists($Module, $action))
    $Module->set_action($action);
else
    $Module->set_action('index');