<?php
$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
?>
<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-6">
		<form action="<?php echo $webroot_path; ?>i/submit_video" class="dropzone" id="my-dropzone">
		
		</form>
	</div>
	<div class="col-md-3">
	</div>
</div>
<style>
.btn-block{
	display: none !important;
}
</style>