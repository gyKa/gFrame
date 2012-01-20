<?php

define('DEBUGGING_MODE', TRUE);

/*
 * MODULES
 */

/**
 * Default module for not authorized users 
 */
define('DEFAULT_GUEST_MODULE', 'index');

/**
 * Default module for authorized users 
 */
define('DEFAULT_USER_MODULE', 'dashboard');

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