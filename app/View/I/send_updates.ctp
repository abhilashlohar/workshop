<?php
$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
?>
<div class="row">
	<div class="col-md-12">
		<!-- BEGIN PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user"></i> SEND UPDATES
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form method="post" class="form-horizontal form-bordered" >
					<div class="form-body">
						<div class="form-group">
							<div class="col-md-12">
								<input class="form-control todo-taskbody-tasktitle" placeholder="Title..." type="text" name="title">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="Update in Detail..." name="detail"></textarea>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn purple" name="send"><i class="fa fa-check"></i> SEND UPDATE</button>
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