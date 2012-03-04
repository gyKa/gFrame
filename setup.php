<?php

/**
 * @TODO This code is very dummy, needs refactor.
 */

if (empty($_SERVER['SHELL']))
{
    die('shell only');
}
else
{
    fwrite(STDOUT, 'Please enter a folder name where web app will be installed: ');
    $dir_name = trim(fgets(STDIN));

    $upper_dir = dirname(dirname(__FILE__));
    $same_dir = NULL;

    if (!empty($dir_name))
    {
        $path = "$upper_dir/$dir_name";
        mkdir($path, 0755);
        $same_dir = FALSE;
    }
    else
    {
        $path = $upper_dir;
        $same_dir = TRUE;
    }

    $file_handler = fopen("$path/index.php", "w") or die('Cant create index file!');
    
    $content = "<?php

require('../gframe/config.php'); // Framework config
require('config.php'); // App config, required for overiding settings
require('../gframe/init.php');
    ";

    if ($same_dir)
        $content = "<?php

require('gframe/config.php'); // Framework config
require('config.php'); // App config, required for overiding settings
require('gframe/init.php');
    ";
    
    fwrite($file_handler, $content);
    fclose($file_handler);

###############################################################################

    $file_handler = fopen("$path/config.php", "w") or die('Cant create config file!');
    
    $content = '<?php

$config["ROOT_PATH"] = dirname(__FILE__) . "/gframe";
$config["MODULES_PATH"] = $config["ROOT_PATH"] . "/modules";
$config["LAYOUTS_PATH"] = $config["ROOT_PATH"] . "/layouts";
$config["PUBLIC_PATH"] = dirname(__FILE__); // REQUIRED!
    ';

    if ($same_dir === FALSE)
        $content = '<?php

$config["ROOT_PATH"] = dirname(__FILE__) . "/../gframe";
$config["MODULES_PATH"] = $config["ROOT_PATH"] . "/modules";
$config["LAYOUTS_PATH"] = $config["ROOT_PATH"] . "/layouts";
$config["PUBLIC_PATH"] = dirname(__FILE__); // REQUIRED!
    ';


    fwrite($file_handler, $content);
    fclose($file_handler);

###############################################################################

    $file_handler = fopen("$path/.htaccess", "w") or die('Cant create htaccess file!');

    $content = '
<IfModule mod_rewrite.c>
    RewriteEngine On

    RewriteRule ^([^/\.]+)/?$ index.php?lang=$1 [L]
    RewriteRule ^([^/\.]+)/([^/\.]+)/?$ index.php?lang=$1&module=$2 [L]
    RewriteRule ^([^/\.]+)/([^/\.]+)/([^/\.]+)/?$ index.php?lang=$1&module=$2&action=$3 [L]

    RewriteRule ^css/([^/]+)/?$ index.php?css=$1 [L]
</IfModule>
    ';

    fwrite($file_handler, $content);
    fclose($file_handler);

    fwrite(STDOUT, "Installed successfully in $path\r\n");
}

?>
