<?php
$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
?>
<!-- BEGIN PAGE CONTENT-->
<!--<div class="row">
	<div class="col-md-12">
		<?php if($role=="admin"){ ?>
		<a href="<?php echo $webroot_path ?>i/embed_video" class="btn red pull-right"><i class="fa fa-plus"></i> ADD VIDEOS</a>
		<?php } ?>
	</div>
</div>-->
<div class="row">
	<div class="col-md-9">
	<?php 
	$novideo="no";
	if(sizeof(@$current_video)>0){
		$vid=$current_video[0]["youtube_video"]["vid"];
		$v_id=@$current_video[0]["youtube_video"]["id"];
	}elseif(sizeof($videos)>0){
		$vid=@$videos[0]["youtube_video"]["vid"];
		$v_id=@$videos[0]["youtube_video"]["id"];
	}else{
		$novideo="yes";
	} ?>
	<?php if($novideo=="no"){ ?>
		<iframe width="100%" style="height:400px;" src="https://www.youtube.com/embed/<?php echo $vid; ?>" frameborder="0" allowfullscreen></iframe>
		<!--<button type="button" class="btn btn-primary send_video" v_id="<?php echo $v_id; ?>"><i class="fa fa-send"></i> Send me this video</button>-->
	<?php } ?>
	</div>
	<div class="col-md-3">
		<?php foreach($videos as $video){
			$id=$video["youtube_video"]["id"];
			$vid=$video["youtube_video"]["vid"];
			$title=$video["youtube_video"]["title"];?>
			<a href="videos2?vid=<?php echo $id; ?>" style=" text-decoration: none; ">
				<div style="padding: 5px;border: solid 1px rgba(204, 204, 204, 0.71);margin-bottom: 3px;background-color: #FFF;color: #0A1942;">
					<?php echo $title; ?>
				</div>
			</a>
		<?php } ?>
	<div>
</div>
<!-- END PAGE CONTENT-->
