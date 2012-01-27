<?php

define('DEBUGGING_MODE', TRUE);


/*
 * MODULES
 */

/**
 * Default module for not authorized users 
 */
define('DEFAULT_GUEST_MODULE', 'default');

/**
 * Default module for authorized users. If value is empty, do not use
 * authorization.
 */
define('DEFAULT_USER_MODULE', '');


/*
 * DIRECTORIES
 */

define('CSS_DIR', 'css');


/*
 * URLS
 */

/**
 * Absolute base url 
 */
define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . substr($_SERVER['SCRIPT_NAME'], 0, -9));

/**
 * Absolute CSS url 
 */
define('CSS_URL', BASE_URL . CSS_DIR);


/*
 * PATHS
 */

/**
 * Absolute framework path
 */
define('ROOT_PATH', dirname(__FILE__));

/**
 * Absolute core path
 */
define('CORE_PATH', ROOT_PATH . '/core');

/**
 * Absolute modules path
 */
define('MODULES_PATH', ROOT_PATH . '/modules');

/**
 * Absolute layouts path
 */
define('LAYOUTS_PATH', ROOT_PATH . '/layouts');

/**
 * Absolute CSS path
 */
define('CSS_PATH', ROOT_PATH . '/' . CSS_DIR);

/**
 * Public path 
 */
define('PUBLIC_PATH', dirname(__FILE__));