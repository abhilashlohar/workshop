<?php 
if(@$count==0 && sizeof($updates)>0){
$update_id=@$updates[0]["update"]["id"];
$title=@$updates[0]["update"]["title"];
$detail=@$updates[0]["update"]["detail"]; 
$time=$updates[0]["update"]["time"];
$class=$updates[0]["update"]["class"];
$date_time=explode(" ",$time);
$date=date("d-m-Y", strtotime($date_time[0]));
$time=$date_time[1];?>
<div class="modal in" id="basic" tabindex="-1" role="basic" aria-hidden="false" style="display: block; padding-right: 12px;"><div class="modal-backdrop  in" ></div>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body" style="padding:0px;">
					 <div class="note <?php echo $class; ?>" style="margin:0;">
						<span class="label  pull-right" style="color:#000;"><?php echo $date; ?> <?php echo $time; ?></span>
						<h4 class="block"><?php echo $title; ?></h4>
						<p><?php echo $detail; ?></p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn blue close_update"  update_id="<?php echo $update_id; ?>">OK</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<?php } ?>