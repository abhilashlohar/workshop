<?php
$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
?>
<ul class="nav nav-tabs">
	<li class="active">
		<a aria-expanded="true" href="add_picture" >
		Add Pictures </a>
	</li>
	<li class="">
		<a aria-expanded="false" href="update_category" >
		Update Category </a>
	</li>
</ul>				
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					
					<form id="fileupload" action="<?php echo $webroot_path ?>assets/global/plugins/jquery-file-upload/server/php/" method="POST" enctype="multipart/form-data">
						<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
						<div class="row fileupload-buttonbar">
							<div class="col-lg-7">
								<!-- The fileinput-button span is used to style the file input field as button -->
								<span class="btn green fileinput-button">
								<i class="fa fa-plus"></i>
								<span>
								Add files... </span>
								<input type="file" name="files[]" multiple="">
								</span>
								<button type="submit" class="btn blue start">
								<i class="fa fa-upload"></i>
								<span>
								Start upload </span>
								</button>
								<button type="reset" class="btn warning cancel">
								<i class="fa fa-ban-circle"></i>
								<span>
								Cancel upload </span>
								</button>
								<button type="button" class="btn red delete">
								<i class="fa fa-trash"></i>
								<span>
								Delete </span>
								</button>
								<input type="checkbox" class="toggle">
								<!-- The global file processing state -->
								<span class="fileupload-process">
								</span>
							</div>
							<!-- The global progress information -->
							<div class="col-lg-5 fileupload-progress fade">
								<!-- The global progress bar -->
								<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
									<div class="progress-bar progress-bar-success" style="width:0%;">
									</div>
								</div>
								<!-- The extended global progress information -->
								<div class="progress-extended">
									 &nbsp;
								</div>
							</div>
						</div>
						<!-- The table listing the files available for upload/download -->
						<table role="presentation" class="table table-striped clearfix">
						<tbody class="files">
						</tbody>
						</table>
					</form>
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Notes</h3>
						</div>
						<div class="panel-body">
							<ul>
								<li>
									 The maximum file size for uploads in this demo is <strong>5 MB</strong> (default file size is unlimited).
								</li>
								<li>
									 Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction).
								</li>
								<li>
									 Uploaded files will be deleted automatically after <strong>5 minutes</strong> (demo setting).
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
	