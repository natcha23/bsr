<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- page title specific to the page -->
    <title><?php echo $this->config->item('website_name'); ?> | {title}</title>
    <!-- javascript files -->
    <?php echo js_asset('jquery/jquery-2.2.1.min.js'); ?>
    <?php
    foreach($js as $file){
        echo "\n\t\t";
        ?><script src="<?php echo $file; ?>"></script><?php
    } echo "\n\t";
    ?>

    <!-- css files -->
    <?php echo css_asset('bootstrap-3.3.6/css/bootstrap.min.css')?>
    <?php
    foreach($css as $file){
        echo "\n\t\t";
        ?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
    } echo "\n\t";
    ?>

    <!-- meta content -->
    <?php
    if(!empty($meta))
        foreach($meta as $name=>$content){
            echo "\n\t\t";
            ?><meta name="<?php echo $name; ?>" content="<?php echo is_array($content) ? implode(", ", $content) : $content; ?>" /><?php
        }
    ?>
</head>
<body>
<header>Header Content</header>
<div class=""><?php echo $output;?></div>
<footer>Footer</footer>
</body>
</html>