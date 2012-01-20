<?php

/**
 * gFrame - simple PHP framework
 *
 * @author Gytis Karčiauskas <gytis@karciauskas.lt>
 * @copyright Copyright (c) 2011-2012
 */

require('../config.php');
require(CORE_PATH . '/System.class.php');

System::start();
System::set_debug_mode(DEBUGGING_MODE);

$default_module = !empty($_SESSION['user']) ? DEFAULT_USER_MODULE : DEFAULT_GUEST_MODULE;

$module = !empty($_GET['module']) ? $_GET['module'] : $default_module;
$action = !empty($_GET['action']) ? $_GET['action'] : NULL;