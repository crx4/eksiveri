<?php
		if ($hnu['unhappy'] === 1)
			$tempStyle = 'entry_u';
		elseif($hnu['happy'] === 1)
			$tempStyle = 'entry_h';
		else
			$tempStyle = 'entry_n';
 ?>
<span class="list-group-item" id="<?php echo $tempStyle; ?>">
  <h3 class="list-group-item-heading">
    <a href="https://eksisozluk.com/<?php echo $entry->headerSource; ?>"><?php echo $entry->header; ?></a>
    <a href="https://eksisozluk.com/<?php echo $entry->authorSource; ?>" class="btn btn-large btn-link" style="text-decoration: none">@<?php echo $entry->author; ?></a>
    <a class="btn btn-small btn-link" style="text-decoration: none"><?php echo $entry->time; ?></a>
  </h3>
  <p class="list-group-item-text"></p>
  <div class="content">
  <?php echo $entry->contentHtml; ?>
  </div>
  <p></p>
  <?php
    $tempPPercent = ($entry->notrPolarWeight + 2) * 100 / 4;
    $tempNPercent = 100 - $tempPPercent;
    $tempHPercent = ($entry->happyUnhappyWeight + 2) * $tempPPercent / 4;
    $tempUPercent = $tempPPercent - $tempHPercent;
   ?>
  <h4 class="list-group-item-footer">
    <div class="progress">
      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $tempHPercent; ?>" style="width:<?php echo $tempHPercent; ?>%">
        <strong>%<?php echo $tempHPercent; ?> mutlu</strong>
      </div>
      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $tempNPercent; ?>" style="width:<?php echo $tempNPercent; ?>%">
        <strong>%<?php echo $tempNPercent; ?> nötr</strong>
      </div>
      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $tempUPercent; ?>" style="width:<?php echo $tempUPercent; ?>%">
        <strong>%<?php echo $tempUPercent; ?> bedbaht</strong>
      </div>
    </div>
    <div style="width: 100%">
      <a href="https://eksisozluk.com/entry/<?php echo $entry->number; ?>" class="btn btn-lg btn-link pull-left" style="text-decoration: none">
        <span class="glyphicon glyphicon-link"></span>
        <strong><?php echo $entry->number; ?></strong>
      </a>
      <a class="btn btn-lg btn-link" style="text-decoration: none; display: inline-block">
        <span class="glyphicon glyphicon-fire"></span>
        <strong>0</strong>
      </a>
      <a class="btn btn-lg btn-link pull-right" style="text-decoration: none; float:none !important">
        <span class="glyphicon glyphicon-share"></span>
      </a>
    </div>
  </h4>
</span>
