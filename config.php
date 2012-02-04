<?php

$config = array();

/*
 * DEBUGGING
 */
$config['DEBUGGING_MODE'] = TRUE;
$config['DEBUGGING_IP'] = serialize(array('::1'));

/*
 * MODULES
 */
$config['DEFAULT_GUEST_MODULE'] = 'default'; // Default module for not authorized users
$config['DEFAULT_USER_MODULE'] = ''; // Default module for authorized users. If value is empty, do not use authorization.

/*
 * DIRECTORIES
 */
$config['CSS_DIR'] = 'css';
$config['MODULES_DIR'] = 'modules';
$config['LAYOUTS_DIR'] = 'layouts';


/*
 * URLS
 */
$config['BASE_URL'] = 'http://' . $_SERVER['SERVER_NAME'] . substr($_SERVER['SCRIPT_NAME'], 0, -9); // Absolute base url
$config['CSS_URL'] = $config['BASE_URL'] . $config['CSS_DIR']; // Absolute CSS url

/*
 * PATHS
 */
$config['ROOT_PATH'] = dirname(__FILE__); // Absolute framework path
$config['CORE_PATH'] = $config['ROOT_PATH'] . '/core'; // Absolute core path
$config['MODULES_PATH'] = $config['ROOT_PATH'] . '/' . $config['MODULES_DIR']; // Absolute modules path
$config['LAYOUTS_PATH'] = $config['ROOT_PATH'] . '/' . $config['LAYOUTS_DIR']; // Absolute layouts path
$config['CSS_PATH'] = $config['ROOT_PATH'] . '/' . $config['CSS_DIR']; // Absolute CSS path
$config['PUBLIC_PATH'] = dirname(__FILE__); // Public path

/*
 * LANGUAGE
 */
$config['LANGUAGES'] = serialize(array('en', 'lt'));
$config['DEFAULT_LANGUAGE'] = 0; // First language in LANGUAGES array
$config['TRANSLATION_DATABASE'] = $config['ROOT_PATH'] . '/translations.sqlite';