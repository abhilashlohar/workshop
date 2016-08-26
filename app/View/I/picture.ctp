<?php
$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
?>
<!-- BEGIN PAGE CONTENT-->
<!--<div class="row">
	<div class="col-md-12">
		<?php if($role=="admin"){ ?>
			<a href="<?php echo $webroot_path ?>i/add_picture" class="btn green pull-right"><i class="fa fa-plus"></i> UPLOAD PICTURES</a>
		<?php } ?>
	</div>
</div>-->

			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom boxless">
					
						<div class="tab-content" style="border:none;">
							<div class="tab-pane active" id="tab_1">
								<!-- BEGIN FILTER -->
								<div class="margin-top-10">
									<ul class="mix-filter">
										<li class="filter" data-filter="all">
											 All
										</li>
										<li class="filter" data-filter="Welcome">
											 Welcome
										</li>
										<li class="filter" data-filter="Session-1">
											 Session-1
										</li>
										<li class="filter" data-filter="Product launch">
											 Product launch
										</li>
										<li class="filter" data-filter="Lunch">
											 Lunch
										</li>
										<li class="filter" data-filter="Session-2">
											 Session-2
										</li>
										<li class="filter" data-filter="Hypnotic Show">
											 Hypnotic Show
										</li>
										<li class="filter" data-filter="Dinner">
											 Dinner
										</li>
										<li class="filter" data-filter="Factory Visit">
											 Factory Visit
										</li>
									</ul>
									<div class="row mix-grid">
									<?php foreach($pictures as $picture){
										$name=$picture["picture"]["name"];
										$category=$picture["picture"]["category"];?>
										<div class="col-md-3 col-sm-4 mix <?php echo $category ?>">
											<div class="mix-inner" style="height: 150px;" align="center">
												<img class="img-responsive" src="<?php echo $webroot_path ?>assets/global/plugins/jquery-file-upload/server/php/files/<?php echo $name ?>" alt="">
												<div class="mix-details">
													<a class="mix-link" href="<?php echo $webroot_path ?>assets/global/plugins/jquery-file-upload/server/php/files/<?php echo $name ?>" download="download">
													<i class="fa fa-cloud-download"></i>
													</a>
													<a class="mix-preview fancybox-button" href="<?php echo $webroot_path ?>assets/global/plugins/jquery-file-upload/server/php/files/<?php echo $name ?>" title="Project Name" data-rel="fancybox-button">
													<i class="fa fa-search"></i>
													</a>
												</div>
											</div>
										</div>
									<?php } ?>
									</div>
								</div>
								<!-- END FILTER -->
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->