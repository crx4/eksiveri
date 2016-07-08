<!--
Copyright (C) 2015 Mevlüt Canvar <info@mcnvr.com>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Mevlüt Canvar, info@mcnvr.com">
    <link rel="icon" href="favicon.ico">

    <title>Ekşi Veri</title>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/pastel-stream.css" rel="stylesheet">

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
    <?php
      $host="localhost";
      $port=3306;
      $socket="";
      $user="root";
      $password="Dx87kcan";
      $dbname="eksiveri";
    ?>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
            <a class="navbar-brand" href="#"><strong><span class="glyphicon glyphicon-tint" aria-hidden="true"></span> Ekşi Veri</strong></a>
        </div>
		<div id="navbar" class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Anasayfa</a></li>
				<li class="active"><a href="training-set.php"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span> Eğitim Kümesi</a></li>
			</ul>
			<form class="navbar-form navbar-left">
				<input type="text" class="form-control col-lg-8" size="55" placeholder="Search">
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Link</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#"><span class="badge"></span> Mutlu</a></li>
						<li><a href="#"><span class="badge"></span> Mutsuz</a></a></li>
						<li><a href="#"><span class="badge"></span> Nötr</a></a></li>
						<li class="divider"></li>
						<li><a href="training-set-2.php">Separated link</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-left">

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Anasayfa</a>
            <a href="training-set.php" class="list-group-item active"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span> Eğitim Kümesi</a>
          </div>
        </div><!--/.sidebar-offcanvas-->

        <div class="col-xs-12 col-sm-9">
          <p class="pull-left visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Ekşi Veri</h1>
            <p>
              Kelime frekans tablosu.
            </p>
        </div>
          <div class="row">
            <div class="col-sm-12">

              <?php
                try {
                  $db = new PDO("mysql:host=$host;dbname=$dbname;",$user, $password);
                  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  function checkAndSave($theWord) {
                      global $db;
                      $tempQueryString = "SELECT * FROM words_frequency WHERE word = '$theWord'";
                      $tempQuery = $db->prepare($tempQueryString);
                      $tempNumber = $tempQuery->execute();
                      if ($tempQuery->rowCount() == 0) {
                        $tempQueryString2 = "insert into words_frequency (word, count) values ('$theWord', 1)";
                        $tempQuery2 = $db->exec($tempQueryString2);
                      }
                      else {
                        $tempQueryString2 = "update words_frequency set count = count + 1 WHERE word = '$theWord'";
                        $tempQuery2 = $db->exec($tempQueryString2);
                      }
                  }

                  foreach ( $db->query('SELECT * FROM training_set') as $row ) {
                    $tempContent = $row['content_text'];
                    $tempExplodedArray = explode(" ", $tempContent);

                    foreach ($tempExplodedArray as $value) {
                      checkAndSave($value);
                    }
                    echo "Id: ".$row['id'];
                    print_r($tempExplodedArray);

                    echo '<br><br>';
                  }

                  $db = null;
                } catch (PDOException $e) {
                  echo $e->getMessage();
                }
              ?>

            </div><!--/col-sm-12-->
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
      </div><!--/row-->
    </div><!--/.container-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/pastel-stream.js"></script>
  </body>
</html>
