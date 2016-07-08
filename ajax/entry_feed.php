<?php

$limit = 5;

$con = mysqli_connect("localhost","root","Dx87kcan","ci_eksi");
$con->set_charset("utf8");

if(mysqli_connect_errno()){
echo "Database did not connect";
exit();
}

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];

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

  $sql = "select * from startup_entries order by id desc limit $start,$limit";
	$str='';
  $tempStyle='';
  $strContent='';

  $data = $con->query($sql);
  if($data!=null && $data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){

		 	$tempPPercent = ($row['np_weight'] + 2) * 100 / 4;
		 	$tempNPercent = 100 - $tempPPercent;
		 	$tempHPercent = ($row['hu_weight'] + 2) * $tempPPercent / 4;
		 	$tempUPercent = $tempPPercent - $tempHPercent;

			if ($row['unhappy'] === '1')
				$tempStyle = 'entry_u';
			elseif($row['happy'] === '1')
				$tempStyle = 'entry_h';
			else
				$tempStyle = 'entry_n';

      $str.="
			<span class='list-group-item' id='".$tempStyle."'><h3 class='list-group-item-heading'>
			<a href='#'>".$row['header']."</a>
			<a class='btn btn-large btn-link' style='text-decoration: none'>@".$row['author']."</a>
			<a class='btn btn-small btn-link' style='text-decoration: none'>"
				.date_diff(date_create($row['time']),date_create(date("Y-m-d H:i:s")))->format("%d gn %H sa %i dk")
      ."</a></h3>
			<p class='list-group-item-text'>".$row['content']."</p>
			<h4 class='list-group-item-footer'>
				<div class='progress'>
				<div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='"
            .$tempHPercent."' style='width:".$tempHPercent."%'><strong>%".$tempHPercent." mutlu</strong></div>
				<div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow='"
            .$tempNPercent."' style='width:".$tempNPercent."%'><strong>%".$tempNPercent." nötr</strong></div>
				<div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow='"
						.$tempUPercent."' style='width:".$tempUPercent."%'><strong>%".$tempUPercent." bedbaht</strong></div>
				</div>
				<div style='width: 100%'>
					<a class='btn btn-lg btn-link pull-left' style='text-decoration: none'>
              <span class='glyphicon glyphicon-link'></span> <strong>".$row['number']."</strong>
					</a>
					<a class='btn btn-lg btn-link' style='text-decoration: none; display: inline-block'>
						<span class='glyphicon glyphicon-fire'></span> <strong>".$row['like_count']."</strong>
					</a>
					<a class='btn btn-lg btn-link pull-right' style='text-decoration: none; float:none !important'>
              <span class='glyphicon glyphicon-share'></span>
					</a>
				</div>
			</h4>
			</span><!--/list-group-item-->";
   }
   $str.="<input type='hidden' class='nextpage' value='".($page+1)."'><input type='hidden' class='isload' value='true'>";
   }else{
    $str .= "<input type='hidden' class='isload' value='false'><hr><footer><p>&copy; 2015 KBÜ Mühendislik Fakültesi</p></footer>";
   }


echo $str;

}

?>
