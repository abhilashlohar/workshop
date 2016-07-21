<?php
$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
?>
<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption font-green-sharp">
						<i class="fa fa-plus font-green-sharp"></i>
						<span class="caption-subject bold uppercase"> ADD VIDEOS</span>
					</div>
				</div>
				<div class="portlet-body" style=" overflow: auto; " align="center">
					<a href="<?php echo $webroot_path; ?>i/sync" class="btn btn-primary"> <i class="fa fa-cloud-upload"></i> Synchronize videos with database</a>
				</div>
			</div>