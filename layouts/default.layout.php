<!DOCTYPE html>
<html lang="<?php echo System::get_language(); ?>">
    <head>
        <meta charset="UTF-8" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>/960.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>/common.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>/text.css" />
        
        <base href="<?php echo BASE_URL; ?>">
    </head>
    
    <body>
        <h1>It works!</h1>
        <?php $this->get_view(); ?>
    </body>
</html>