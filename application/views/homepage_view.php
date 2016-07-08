<div class="list-group">
  <center id='loading'><span class="glyphicon glyphicon-tint glyphicon-spin"></span></center>
    <div id="ajaxscroll"></div>
</div><!--/list-group-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Girdi Analiz Penceresi</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('analyse',array('class'=>'form-horizontal'));?>
          <div class="form-group">
            <?php echo form_label('Girdi No:','entryid');?>
            <?php echo form_error('entryid');?>
            <?php echo form_input('entryid','','class="form-control"');?>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo form_submit('submit', 'Analiz Et!', 'class="btn btn-primary"');?>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
