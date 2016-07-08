<!--
Copyright (C) 2015 Mevlüt Canvar <info@mcnvr.com>

This program is not free software: you cannot redistribute it and/or modify it.
-->
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mevlüt Canvar, info@mcnvr.com">
    <link rel="icon" href="<?php echo assets_url(); ?>/images/favicon.ico">

    <title><?php echo $page_title;?></title>

  	<script type="text/javascript" src="http://localhost:35729/livereload.js"></script>

    <link href="<?php echo assets_url(); ?>/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="<?php echo assets_url(); ?>/css/pastel-stream.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .btn.active, .btn:active {
            color: #000000;
        }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
            <a class="navbar-brand" href="<?php echo site_url(); ?>"><strong><span class="glyphicon glyphicon-tint" aria-hidden="true"></span> Ekşi Veri</strong></a>
        </div>
		<div id="navbar" class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo site_url(); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Anasayfa</a></li>
				</ul>
			<ul class="nav navbar-nav navbar-right">
        <li><a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span> Analiz Et!</a></li>
      </ul>
		</div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
