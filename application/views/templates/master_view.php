<?php
  $this->load->view('templates/_parts/master_header_view');
  $this->load->view('templates/_parts/master_sidebar_view');
?>
<div class="col-xs-12 col-sm-9">
  <p class="pull-left visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
  </p>
  <div class="jumbotron">
    <h1>Ekşi Veri</h1>
    <p>Veri Madenciliği Projesi</p>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <section>
        <?php echo $the_view_content;?>
      </section>
    </div><!--/col-sm-12-->
  </div><!--/row-->
</div><!--/.col-xs-12.col-sm-9-->
</div><!--/row-->
</div><!--/.container-->
<script type="text/javascript" src="<?php echo assets_url(); ?>/js/scroll-script.js"></script>
<?php $this->load->view('templates/_parts/master_footer_view'); ?>
