<?php
$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
?>
<div class="row">
	<div class="col-md-12 ">
		<!-- BEGIN SAMPLE FORM PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-red-sunglo">
					<i class="icon-settings font-red-sunglo"></i>
					<span class="caption-subject bold uppercase"> EMBED YOUTUBE VIDEO</span>
				</div>
				
			</div>
			<div class="portlet-body form">
				<form role="form" method="post">
					<div class="form-body">
						<div class="form-group">
							<label>Title</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Title" name="title"> </div>
						</div>
						<div class="form-group">
							<label>Youtube Url</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-youtube-play"></i>
								</span>
								<input type="text" class="form-control" placeholder="https://www.youtube.com/watch?v=OA8KjIMbh48" name="url"> </div>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn red" name="sub">EMBED</button>
					</div>
				</form>
			</div>
		</div>
		<!-- END SAMPLE FORM PORTLET-->
	</div>
	
	<div class="col-md-12 ">
		<!-- BEGIN SAMPLE FORM PORTLET-->
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-red-sunglo">
					<i class="icon-settings font-red-sunglo"></i>
					<span class="caption-subject bold uppercase"> EMBEDED VIDEOS</span>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Video</th>
						<th>Title</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($youtube_videos as $data){ 
				$id=$data["youtube_video"]["id"];
				$vid=$data["youtube_video"]["vid"];
				$url=$data["youtube_video"]["url"];
				$title=$data["youtube_video"]["title"];?>
					<tr>
						<td>
							<iframe width="100" height="50" src="https://www.youtube.com/embed/<?php echo $vid; ?>" frameborder="0" allowfullscreen></iframe>
						</td>
						<td><a href="<?php echo $url; ?>"><?php echo $title; ?></a></td>
						<td><button class="btn btn-large btn-danger btndelete" data-toggle="confirmation" data-original-title="Are you sure ?" title="" row_id="<?php echo $id; ?>"><i class="fa fa-trash-o"></i></button></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- END SAMPLE FORM PORTLET-->
	</div>
</div>
<script>
$( document ).ready(function() {
	$(".btndelete").on("click",function(){
		var row_id=$(this).attr("row_id");
		
		$(".btn-success").attr("row_id",row_id);
	})
    $(".btn-success").live("click",function(){
		var row_id=$(this).attr("row_id");
		window.location.href = "<?php echo $webroot_path; ?>i/delete_yvideo/"+row_id;
	})
});
</script>