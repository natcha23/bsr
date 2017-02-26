<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- page title specific to the page -->
    <title><?php echo $this->config->item('website_name'); ?> | Backend</title>
    <!-- javascript files -->
    <?php echo js_asset('jquery/jquery-2.2.1.min.js'); ?>
    <?php echo js_asset('parsley/parsley.js'); ?>
    <?php
    foreach($js as $file){
        echo "\n\t\t";
        ?><script src="<?php echo $file; ?>"></script><?php
    } echo "\n\t";
    ?>

    <!-- css files -->
    <?php echo css_asset('bootstrap-3.3.6/css/bootstrap.min.css')?>
    <?php echo css_asset('parsley/parsley.css')?>
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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo site_url(); ?>backend/user">User</a></li>
                <li><a href="<?php echo site_url(); ?>backend/messenger">Messenger</a></li>
                <li><a href="<?php echo site_url(); ?>backend/product">Product</a></li>
                <li><a href="<?php echo site_url(); ?>backend/addup">Add Up</a></li>
                <li><a href="<?php echo site_url(); ?>backend/promotion">Promotion</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid"><?php echo $output;?></div>
<footer>Footer</footer>
</body>
</html>