<?php
include('../databaseConnTrainingSet.php');

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
$limit = 100;
   call_user_func($actionfunction,$_REQUEST,$con,$limit);
}
function showData($data,$con,$limit){
  $page = $data['page'];
   if($page==1){
   $start = 0;
  }
  else{
  $start = ($page-1)*$limit;
  }

  $sql = "select * from training_set where analysis = 'u' order by length(content_text) limit $start,$limit";
  $str='';

  $data = $con->query($sql);
  if($data!=null && $data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){

        $chkH='';
        $chkN='';
        $chkU='';
        if($row['analysis'] == "h")
            $chkH = " active";
        else if($row['analysis'] == "n")
            $chkN = " active";
        else if($row['analysis'] == "u")
            $chkU = " active";

        $str.="<span class='list-group-item'><h4 class='list-group-item-heading'><a target='_blank' href='".$row['header_source']
                ."'>".$row['header']."</a> <a class='btn btn-large btn-link' href='".$row['author_source']
                ."' style='text-decoration: none'>@".$row['author']
                ."</a> <a class='btn btn-small btn-link' style='text-decoration: none'>"
                .date_diff(date_create($row['time']),date_create(date("Y-m-d H:i:s")))->format("%d gn %H sa %i dk")
                ."</a></h4><p class='list-group-item-text'>".$row['content_html']."</p><h4 class='list-group-item-footer'>
                <div class='btn-group btn-group-justified' data-toggle='buttons'>
                    <label disabled='disabled' class='btn btn-success".$chkH."'><input type='radio' id='button_H' value='h".$row['id']."' />Mutlu <span style='display: none' class='glyphicon glyphicon-ok'></span></label>
                    <label disabled='disabled' class='btn btn-warning".$chkN."'><input type='radio' id='button_N' value='n".$row['id']."' />Nötr <span style='display: none' class='glyphicon glyphicon-ok'></span></label>
                    <label disabled='disabled' class='btn btn-danger".$chkU."'><input type='radio' id='button_U' value='u".$row['id']."' />Mutsuz <span style='display: none' class='glyphicon glyphicon-ok'></span></label>
                </div>
                <div style='width: 100%'><a class='btn btn-lg btn-link pull-left' style='text-decoration: none' target='_blank' href='https://eksisozluk.com/entry/"
                .$row['number']."'><span class='glyphicon glyphicon-link'></span> <strong>".$row['number']
                ."</strong></a><br /></div></h4></span><!--/list-group-item-->";
   }
   $str.="<input type='hidden' class='nextpage' value='".($page+1)."'><input type='hidden' class='isload' value='true'>";
   }else{
    $str .= "<input type='hidden' class='isload' value='false'><hr><footer><p>&copy; 2015 KBÜ Mühendislik Fakültesi</p></footer>";
   }


echo $str;

}

?>
