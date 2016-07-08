    <?php include('../application/models/databaseConnTrainingSet.php');
    $sql = "select * from training_set";
    $sql2 = "select * from training_set where analysis = 'e'";
    $sql3 = "select * from training_set where analysis = 'h'";
    $sql4 = "select * from training_set where analysis = 'u'";

    $result=mysqli_query($con,$sql);
    $result2=mysqli_query($con,$sql2);
    $result3=mysqli_query($con,$sql3);
    $result4=mysqli_query($con,$sql4);
    $num1 = mysqli_num_rows($result);
    $num2 = mysqli_num_rows($result2);
    $num3 = round(($num2 * 100 / $num1),1);
    $num4 = round(( 100 - $num3 ),1);
    $num5 = mysqli_num_rows($result3);
    $num6 = mysqli_num_rows($result4);
	$num7 = $num1 - ( $num2 + $num5 + $num6 );
    ?>
    <div class="container">

      <div class="row row-offcanvas row-offcanvas-left">

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Anasayfa</a>
            <a href="training-set.php" class="list-group-item active"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span> Eğitim Kümesi</a>
            <a href="frequency-table.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Sıklık Tablosu</a>
          </div>
          <div class="panel panel-primary">
              <div class="panel-heading">
                  Gösterge Paneli
              </div>
              <div class="panel-body">
                <ul class="list-group">
                  <li class="list-group-item">
                    <span class="badge"><?php echo $num1; ?></span>
                    Küme Toplamı
                  </li>
                  <li class="list-group-item">
                    <h4>
						İşaretlenmiş <span class="label label-primary"><?php echo $num1 - $num2; ?></span>
					</h4>
                  </li>
                  <li class="list-group-item">
                    <h4>
						Kalan <span class="label label-success"><?php echo $num2; ?></span>
					</h4>
                  </li>
                </ul>
              </div>
              <div style="height: 40px;" class="panel-footer">
                  <div class="progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped" style="width: <?php echo $num3; ?>%">
                        <strong><?php echo $num3; ?>%</strong>
                    </div>
                    <div class="progress-bar progress-bar-info progress-bar-striped" style="width: <?php echo $num4 ?>%">
                      <strong><?php echo $num4 ?>%</strong>
                    </div>
                  </div>
              </div>
          </div>
        </div><!--/.sidebar-offcanvas-->

        <div class="col-xs-12 col-sm-9">
          <p class="pull-left visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
				<div class="btn-group pull-right" data-toggle="buttons">
				  <label class="btn btn-primary">
					<input id="night-mode" type="checkbox" autocomplete="off"><span class="glyphicon glyphicon-adjust"></span>
				  </label>
				</div>
            <h1>Ekşi Veri</h1>
            <p>Lütfen okuduğunuz girdinin genel anlamda size ne hissettirdiğini işaretleyin. Belirgin bir şekilde komik ve mutluluk verici olduğunu düşünüyorsanız <span class="label label-success">Mutlu</span>, birşey hissettirmiyorsa <span class="label label-warning">Nötr</span>, belirgin bir şekilde can sıkıcı ise <span class="label label-danger">Mutsuz</span> olarak işaretleyin. Yadımlarınız için teşekkür ederim.</p>
          </div>
          <div class="row">
            <div class="col-sm-12">
                <div class="list-group">
                    <img id='loading' src='images/loading.gif'>
                    <div id="ajaxscroll"></div>
                </div><!--/list-group-->
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
    <!-- Infinite Scroll Pagination -->
    <script type="text/javascript" src="js/scroll-script-training-set.js"></script>

    <script language="javascript" type="text/javascript">
        jQuery(function ($) {
            $(document).on('change', 'input:radio[id^="button_"]', function (event) {

                      var ajaxRequest;
                      try{
                         ajaxRequest = new XMLHttpRequest();
                      }

                      catch (e){
                         try{
                            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                         }

                         catch (e) {
                            try{
                               ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                            }

                            catch (e){
                               alert("Your browser does not support ajax technology!");
                               return false;
                            }
                         }
                      }
                      var tmp = $(this).attr("value");
                      var analysis = tmp.substr(0,1);
                      var id = tmp.substr(1);
                      var queryString = "?analysis=" + analysis;
                                  queryString += "&id=" + id;

                      ajaxRequest.open("GET", "ajax-training-set.php" + queryString, true);
                      ajaxRequest.send(null);
					  //$(this).parent().text($(this).parent().text() + '');
					  $(this).next('.glyphicon').fadeIn().delay(2000).fadeOut();;
					  $(this).parent().css({"font-weight": "bolder"});
					  //$(this).parent().parent().parent().delay(120000).fadeOut('slow');
            });
        });
		$(document).ready(function() {
			$("#night-mode").on("change", function() {
				var check = $(this).prop('checked');
				if(check == true) {
					$("span.list-group-item").css({"background-color": "#333", "color": "#FFF"});
					$("body").css({"background-color": "#444"});
				} else {
					$("span.list-group-item").css({"background-color": "#FFF", "color": "#333"});
					$("body").css({"background-color": "#FFF"});
				}
			});
		});
    </script>
  </body>
</html>
