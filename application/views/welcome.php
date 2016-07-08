<?php
/*
	* Author: mevlutcanvar@gmail.com
*/
?>

<body>

<div id="container">
	<h1>Eksiveri Application</h1>

	<div id="body">
		<p>
			<?php echo form_open('word/build'); ?>
			<?php echo form_label('Add wordlist as column: '); ?>
			<?php echo form_button(array( 'type' => 'submit','content' => 'Start')); ?>
			<?php echo form_close(); ?>
		</p>
		<p>
			<?php echo form_open('entry/initialize'); ?>
			<?php echo form_label('Initialize columns: '); ?>
			<?php echo form_button(array( 'type' => 'submit','content' => 'Start')); ?>
			<?php echo form_close(); ?>
		</p>
		<p>
			<?php echo form_open('entry/update'); ?>
			<?php echo form_label('Update whole table: '); ?>
			<?php echo form_button(array( 'type' => 'submit','content' => 'Start')); ?>
			<?php echo form_close(); ?>
		</p>
		<p>
			<?php echo form_open('entry/clear_weaks'); ?>
			<?php echo form_label('Clear entries less than 3 matched word: '); ?>
			<?php echo form_button(array( 'type' => 'submit','content' => 'Start')); ?>
			<?php echo form_close(); ?>
		</p>
		<p>
			<?php echo form_open('entry/clear'); ?>
			<?php echo form_label('Clear neutral entries: '); ?>
			<?php echo form_button(array( 'type' => 'submit','content' => 'Start')); ?>
			<?php echo form_close(); ?>
		</p>
		<hr>
		<p>
			<?php echo form_open('word/truncate'); ?>
			<?php echo form_label('Truncate table: '); ?>
			<?php echo form_button(array( 'type' => 'submit','content' => 'Start')); ?>
			<?php echo form_close(); ?>
		</p>
		<p>
			<?php echo form_open('word/drop_columns'); ?>
			<?php echo form_label('Drop columns: '); ?>
			<?php echo form_button(array( 'type' => 'submit','content' => 'Start')); ?>
			<?php echo form_close(); ?>
		</p>
		<hr>
		<p>
			Average character length of n:
			<?php
				echo $total_n/$count_n;
			?>
		</p>
		<p>
			Average character length of h:
			<?php
				echo $total_h/$count_h;
			?>
		</p>
		<p>
			Average character length of u:
			<?php
				echo $total_u/$count_u;
			?>
		</p>
		<hr>
		<p>
			<?php echo form_open('word/update_frequencies'); ?>
			<?php echo form_label('Fill words frequencies table: '); ?>
			<?php echo form_button(array( 'type' => 'submit','content' => 'Start','disabled' => 'disable')); ?>
			<?php echo form_close(); ?>
		</p>
		<p>
			<?php echo form_open('word/truncate_frequencies'); ?>
			<?php echo form_label('Truncate words frequencies table: '); ?>
			<?php echo form_button(array( 'type' => 'submit','content' => 'Start','disabled' => 'disable')); ?>
			<?php echo form_close(); ?>
		</p>
	</div>
