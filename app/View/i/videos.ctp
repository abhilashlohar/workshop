<?php
$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
?>
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		<?php if($role=="admin"){ ?>
		<a href="<?php echo $webroot_path ?>i/add_video" class="btn red pull-right"><i class="fa fa-plus"></i> ADD VIDEOS</a>
		<?php } ?>
	</div>
</div>
<div class="row">
	<div class="col-md-9">
	<?php 
	$novideo="no";
	if(sizeof(@$current_video)>0){
		$current_name=$current_video[0]["video"]["name"];
		$v_id=@$current_video[0]["video"]["id"];
	}elseif(sizeof($videos)>0){
		$current_name=@$videos[0]["video"]["name"];
		$v_id=@$videos[0]["video"]["id"];
	}else{
		$novideo="yes";
	} ?>
	<?php if($novideo=="no"){ ?>
		<video  controls style="width:100%;max-height: 500px;" width="100%">
		  <source src="<?php echo $webroot_path; ?>videos/<?php echo $current_name; ?>" type="video/mp4">
		  <source src="<?php echo $webroot_path; ?>videos/<?php echo $current_name; ?>" type="video/ogg">
		  Your browser does not support the video tag.
		</video> 
		<button type="button" class="btn btn-primary send_video" v_id="<?php echo $v_id; ?>"><i class="fa fa-send"></i> Send me this video</button>
	<?php } ?>
	</div>
	<div class="col-md-3">
		<?php foreach($videos as $video){
			$id=$video["video"]["id"];
			$name=$video["video"]["name"]; ?>
			<a href="videos?vid=<?php echo $id; ?>">
				<div style="padding: 5px;border: solid 1px rgba(204, 204, 204, 0.71);margin-bottom: 3px;background-color: rgb(215, 215, 215);color: #000;">
					<?php echo $name; ?>
				</div>
			</a>
		<?php } ?>
	<div>
</div>
<!-- END PAGE CONTENT-->
