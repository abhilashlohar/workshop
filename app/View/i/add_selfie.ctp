<?php
$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
?>

<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i> Add Selfie
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
					<div class="form-body">
						<div class="form-group last">
							<label class="control-label col-md-3">Select Your Selfie</label>
							<div class="col-md-9">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
									</div>
									<div>
										<span class="btn default btn-file">
										<span class="fileinput-new">
										Select Selfie </span>
										<span class="fileinput-exists">
										Change Selfie</span>
										<input type="file" name="file">
										</span>
										<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
										Remove </a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn purple" name="submit"><i class="fa fa-check"></i> Submit</button>
							</div>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
		<!-- END PORTLET-->
	</div>
</div>

<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-user"></i>Selfies Uploaded by You
		</div>
	</div>
	<div class="portlet-body">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Selfie</th>
					<th>Hearts</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($selfies as $selfie){ 
				$id=$selfie["selfie"]["id"];
				$ext=$selfie["selfie"]["ext"];?>
				<tr>
					<td>
						<img class="img-responsive" src="<?php echo $webroot_path ?>selfie/<?php echo $id.".".$ext; ?>" width="50px" style="width:50px;">
					</td>
					<td>5</td>
					<td><button class="btn btn-large btn-danger btndelete" data-toggle="confirmation" data-original-title="Are you sure ?" title="" row_id="<?php echo $id; ?>"><i class="fa fa-trash-o"></i></button></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
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
		window.location.href = "<?php echo $webroot_path; ?>i/delete_selfie/"+row_id;
	})
});
</script>