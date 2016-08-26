<?php
$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
?>
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		<?php if($role!="admin"){ ?>
			<a href="<?php echo $webroot_path ?>i/add_selfie" class="btn green pull-right"><i class="fa fa-plus"></i> UPLOAD SELFIE</a>
		<?php } ?>
	</div>
</div>
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom boxless">
						<div class="tab-content" style="border:none;">
							<div class="tab-pane active" id="tab_1">
								<!-- BEGIN FILTER -->
								<div class="margin-top-10">
									<div class="row mix-grid">
									<?php foreach($selfies as $selfie){
										$id=$selfie["selfie"]["id"];
										$ext=$selfie["selfie"]["ext"]; 
										$is_liked= $this->requestAction(array('controller' => 'i', 'action' => 'is_liked'), array('pass' => array($id)));
										$count_like=@$this->requestAction(array('controller' => 'i', 'action' => 'count_like'), array('pass' => array($id)));
										if($is_liked>0){
											$a_cls="btn-primary";
											$i_clr='style="color: #FFF"';
											$act="";
										}else{
											$a_cls="";
											$i_clr='';
											$act="liker";
										}
										if($count_like==0){
											$vsbl='visibility: hidden';
										}else{
											$vsbl='';
										}?>
										<div class="col-md-3 col-sm-4 mix qw">
											<div style="overflow: hidden; height: 200px; width:100%;">
												<img class="img-responsive" src="<?php echo $webroot_path ?>selfie/<?php echo $id.".".$ext; ?>" alt="">
											</div>
											<div>
												<table width="100%">
													<tr>
														<td width="50%">
															<a class="btn btn-default btn-block <?php echo $a_cls ?> heart <?php echo $act ?>" href="#" s_id="<?php echo $id ?>">
																<i class="fa fa-thumbs-up" <?php echo $i_clr ?>></i> Like 
															</a>
														</td>
														<td width="50%">
															<a class="btn btn-default btn-block fancybox-button" href="<?php echo $webroot_path ?>selfie/<?php echo $id.".".$ext; ?>" title="Project Name" data-rel="fancybox-button">
																<i class="fa fa-search"></i> View
															</a>
														</td>
													</tr>
												</table>
											</div>
											<div style="margin-top:5px;<?php echo $vsbl; ?>" s_id="<?php echo $id ?>">
											<a href="javascript:;" class="btn btn-circle btn-xs blue" style="background-color: #428bca;"><i class="fa fa-thumbs-up"></i></a> <span class="numbr"><?php echo $count_like; ?></span> guests like this selfie.
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
