<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo $baseurl; ?>css/normalize.min.css">
        <link rel='stylesheet' type="text/css" href="<?php echo $baseurl; ?>audioplayer/audioplayer.css"/>
        <link rel="stylesheet" href="<?php echo $baseurl; ?>css/main.css">

        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
        <![endif]-->

        <script>window.jQuery || document.write('<script src="<?php echo $baseurl; ?>js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
        <script src="<?php echo $baseurl; ?>audioplayer/audioplayer.dev.js" type="text/javascript"></script>

        <script src="<?php echo $baseurl; ?>js/main.js"></script>
    </head>
	<body>
            <div id="container">
		<?php echo $this->getContent(); ?>
            </div>
	</body>
</html>