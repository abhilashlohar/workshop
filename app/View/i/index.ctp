<?php
$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
?>
<div class="row">
	<div class="col-md-8">
		<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption font-green-sharp">
						<i class="fa fa-file-picture-o font-green-sharp"></i>
						<span class="caption-subject bold uppercase"> Pictures</span>
					</div>
					<div class="actions">
						<a href="picture" class="btn btn-circle btn-default btn-sm">
						<i class="fa fa-search"></i> See All Pictures </a>
					</div>
				</div>
				<div class="portlet-body" style=" overflow: auto; ">
					
					<?php foreach($pictures as $picture){ 
					$name=$picture["picture"]["name"];?>
					<div class="col-md-3 col-sm-4 mix ">
						<div style=" height: 70px; overflow: hidden; ">
						<img class="img-responsive" src="<?php echo $webroot_path ?>assets/global/plugins/jquery-file-upload/server/php/files/<?php echo $name ?>" alt="">
						</div><br/>
					</div>
					<?php } ?>
				</div>
			</div>
			
			
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption font-green-sharp">
						<i class="fa fa-file-picture-o font-green-sharp"></i>
						<span class="caption-subject bold uppercase"> Selfies</span>
					</div>
					<div class="actions">
						<a href="selfies" class="btn btn-circle btn-default btn-sm">
						<i class="fa fa-search"></i> See All Selfies </a>
					</div>
				</div>
				<div class="portlet-body" style=" overflow: auto; ">
					
					<?php foreach($selfies as $selfie){
					$id=$selfie["selfie"]["id"];
					$ext=$selfie["selfie"]["ext"];?>
					<div class="col-md-3 col-sm-4 mix ">
						<div style=" height: 70px; overflow: hidden; ">
							<img class="img-responsive" src="<?php echo $webroot_path ?>selfie/<?php echo $id.".".$ext; ?>" alt="">
						</div>
						<br/>
					</div>
					<?php } ?>
				</div>
			</div>
	</div>
	<div class="col-md-4">
		<!-- BEGIN ALERTS PORTLET-->
		<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption font-green-sharp">
						<i class="fa fa-bell font-green-sharp"></i>
						<span class="caption-subject bold uppercase"> UPDATES</span>
					</div>
					<div class="actions">
						<?php if($role=="admin"){ ?>
						<a href="<?php echo $webroot_path ?>i/send_updates" class="btn btn-circle btn-default btn-sm">
						<i class="fa fa-plus"></i> SEND UPDATES </a>
						<?php } ?>
					</div>
				</div>
				<div class="portlet-body" style=" overflow: auto; ">
					<div style="height:450px;overflow: auto;">
						<?php foreach($updates as $update){
							$title=$update["update"]["title"];
							$detail=$update["update"]["detail"];
							$time=$update["update"]["time"];
							$class=$update["update"]["class"];
							$date_time=explode(" ",$time);
							$date=date("d-m-Y", strtotime($date_time[0]));
							$time=$date_time[1];
							?>
						<div class="note <?php echo $class; ?>">
						<span class="label  pull-right" style="color:#000;"><?php echo $date; ?> <?php echo $time; ?></span>
							<h4 class="block"><b><?php echo $title; ?></b></h4>
							
							<p>
								 <?php echo $detail; ?>
							</p>
						</div>
						<?php } ?>
						</div>
				</div>
			</div>
		<!-- END ALERTS PORTLET-->
	</div>
</div>