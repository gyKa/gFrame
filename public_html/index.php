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