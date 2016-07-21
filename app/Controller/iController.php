<?php
class iController extends AppController {
var $helpers = array('Html', 'Form','Js');
public $components = array(
'Paginator',
'Session','Cookie','RequestHandler'
);


var $name = 'i';

function beforeFilter(){
	//Configure::write('debug', 0);
}

function webroot_path() {
	$this->loadmodel('extra');
	$conditions=array("id" => 1);
	$resultwebroot_path=$this->extra->find('all',array('conditions'=>$conditions));
	return $resultwebroot_path[0]['extra']['info'];
}

function logout(){
$this->layout=null;
$this->Session->destroy(); 
$this->redirect(array('action' => 'login'));
}

function ath(){
	$user_id=$this->Session->read('ws_user_id');
	if(empty($user_id)){
		$this->Session->destroy();
		$this->redirect(array('action' => 'login'));
	}
	date_default_timezone_set('Asia/Kolkata');
	$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
	$this->set(compact("webroot_path"));
}



function index() {
	$this->layout="session";
	$this->ath();
	
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	
	$this->loadmodel('user');
	$result_user=$this->user->find('all',array('conditions'=>array('id'=>$ws_user_id)));
	$role=$result_user[0]["user"]["role"];
	$this->set('role',$role);
	
	$this->loadmodel('picture');
	$order=array('picture.id'=>'DESC');
	$this->set('pictures',$this->picture->find('all', array('order' => $order,'limit' => 8)));
	
	$this->loadmodel('selfie');
	$order=array('selfie.id'=>'DESC');
	$this->set('selfies',$this->selfie->find('all', array('order' => $order,'limit' => 8)));
	
	$this->loadmodel('update');
	$order=array('update.id'=>'DESC');
	$this->set('updates',$this->update->find('all', array('order' => $order)));
}



function login(){
	$this->layout="";
	if (isset($this->request->data['login'])){
		$email=$this->request->data['email'];
		
		$this->loadmodel('user');
		$conditions=array("email" => $email);
		$user_info=$this->user->find('all',array('conditions'=>$conditions));
		$ws_user_id=@$user_info[0]["user"]["id"];
		$this->set('user_info',$user_info);
		if(sizeof($user_info)>0){
			$this->Session->write('ws_user_id', $ws_user_id);
			$this->redirect(array('controller' => 'i','action' => 'index'));
		}else{
			$this->set('wrong',"true");
		}
	}
}

function picture(){
	$this->layout="file_view";
	$this->ath();
	
	$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
	$this->set("webroot_path",$webroot_path);
	
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	
	$this->loadmodel('user');
	$result_user=$this->user->find('all',array('conditions'=>array('id'=>$ws_user_id)));
	$role=$result_user[0]["user"]["role"];
	$this->set('role',$role);
	
	$this->loadmodel('picture');
	$order=array('picture.id'=>'DESC');
	$this->set('pictures',$this->picture->find('all', array('order' => $order)));
	
}

function add_picture(){
	$this->layout="file_upload";
	$this->ath();
	
}

function insert_picture($file_name=null){
	$this->layout=null;
	
	$this->loadmodel('picture');
	$this->picture->saveAll(Array(Array("name" => $file_name,"uploaded_by"=>"2")));
}

function delete_picture($file_name=null){
	$this->layout=null;
	
	$this->loadmodel('picture');
	$this->picture->deleteAll(array('name'=>$file_name));
}

function update_category(){
	$this->layout="session";
	$this->ath();
	
	$this->loadmodel('picture');
	$order=array('picture.id'=>'DESC');
	$this->set('pictures',$this->picture->find('all', array('order' => $order)));
}

function update_category_submit($cat=null,$id=null){
	$this->layout=null;
	
	$this->loadmodel('picture');
	$this->picture->updateAll(array('category'=>"'$cat'"),array('picture.id'=>$id));
	echo "ok";
}


function videos(){
	$this->layout="file_view";
	$this->ath();
	$vid=$this->request->query('vid');
	$this->set('vid',$vid);
	
	$this->loadmodel('video');
	$this->set('current_video',$this->video->find('all',array('conditions'=>array('id'=>$vid))));
	
	$this->loadmodel('video');
	$order=array('video.id'=>'DESC');
	$this->set('videos',$this->video->find('all', array('order' => $order)));
	
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	
	$this->loadmodel('user');
	$result_user=$this->user->find('all',array('conditions'=>array('id'=>$ws_user_id)));
	$role=$result_user[0]["user"]["role"];
	$this->set('role',$role);
}

function videos2(){
	$this->layout="file_view";
	$this->ath();
	
	
	
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	
	$this->loadmodel('user');
	$result_user=$this->user->find('all',array('conditions'=>array('id'=>$ws_user_id)));
	$role=$result_user[0]["user"]["role"];
	$this->set('role',$role);
}

function add_video(){
	$this->layout="selfie";
	$this->ath();
	
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	
	if (isset($this->request->data['submit'])){
		$url=$_POST['url'];
		
		$this->loadmodel('video');
		$this->video->saveAll(Array( Array("url" => $url,"uploaded_by" => $ws_user_id))); 
	}
	
	$this->loadmodel('video');
	$order=array('video.id'=>'DESC');
	$this->set('videos',$this->video->find('all', array('order' => $order)));
}

function upload_video(){
	$this->layout="video";
	$this->ath();
	
	if (isset($this->request->data['upload'])){
		if(isset($_FILES['file'])){
			$this->loadmodel('video');
			$this->video->saveAll(Array( Array("uploaded_by" => "2"))); 
			$videoid=$this->video->getLastInsertID();
			
			$filename=$_FILES['file']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$file_name=$videoid.".".$ext;
			$file_tmp_name =$_FILES['file']['tmp_name'];
			$target = "videos/";
			$target=@$target.basename($file_name);
			move_uploaded_file($file_tmp_name,@$target);
		}
	}
	
}

function submit_video(){
	$this->layout=null;
	
		$file_name=$_FILES['file']['name']; 
		$file_tmp_name =$_FILES['file']['tmp_name'];
		$target = "videos/";
		$target=@$target.basename($file_name);
		move_uploaded_file($file_tmp_name,@$target);
}

function add_selfie(){
	$this->layout="selfie";
	$this->ath();
	
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	if (isset($this->request->data['submit'])){
		if(isset($_FILES['file'])){
			$this->loadmodel('selfie');
			$this->selfie->saveAll(Array( Array("uploaded_by" => "2"))); 
			$selfieid=$this->selfie->getLastInsertID();
			
			$filename=$_FILES['file']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$file_name=$selfieid.".".$ext;
			$file_tmp_name =$_FILES['file']['tmp_name'];
			$target = "selfie/";
			$target=@$target.basename($file_name);
			move_uploaded_file($file_tmp_name,@$target); 
			
			$this->loadmodel('selfie');
			$this->selfie->updateAll(array("ext" => "'$ext'"),array("selfie.id" => $selfieid));
		}
	}
	
	$this->loadmodel('selfie');
	$order=array('selfie.id'=>'DESC');
	$this->set('selfies',$this->selfie->find('all', array('order' => $order,'conditions'=>array('uploaded_by'=>$ws_user_id))));
	
}

function delete_selfie($row_id=null){
	$this->layout="";
	
	$this->loadmodel('selfie');
	$conditions4=array('id'=>$row_id);
	$this->selfie->deleteAll($conditions4);
	$this->redirect(array('action' => 'add_selfie'));
}

function delete_video($row_id=null){
	$this->layout="";
	
	$this->loadmodel('video');
	$conditions4=array('id'=>$row_id);
	$this->video->deleteAll($conditions4);
	$this->redirect(array('action' => 'add_video'));
}

function selfies(){
	$this->layout="file_view";
	$this->ath();
	
	$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
	$this->set("webroot_path",$webroot_path);
	
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	
	$this->loadmodel('user');
	$result_user=$this->user->find('all',array('conditions'=>array('id'=>$ws_user_id)));
	$role=$result_user[0]["user"]["role"];
	$this->set('role',$role);
	
	$this->loadmodel('selfie');
	$order=array('selfie.id'=>'DESC');
	$this->set('selfies',$this->selfie->find('all', array('order' => $order)));
	
}

function menus(){
	$this->layout="";
	$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
	?>
	<li class="start">
		<a href="<?php echo $webroot_path; ?>i/index" style="text-align: center;color: #444140;">
		<div style=" height: 8px; "></div>
		<i class="fa fa-dashboard " style="font-size: 26px;color: #fcb82e;;"></i><br>
		<span class="title" style="font-size: 14px;">Dashboard</span>
		<div style=" height: 8px; "></div>
		</a>
	</li>
	<li>
		<a href="<?php echo $webroot_path; ?>i/picture" style="text-align: center;color: #444140;">
		<div style=" height: 8px; "></div>
		<i class="fa fa-file-picture-o" style="font-size: 26px;color: #fcb82e;"></i><br>
		<span class="title" style="font-size: 14px;">Pictures</span>
		<div style=" height: 8px; "></div>
		</a>
	</li>
	<li>
		<a href="<?php echo $webroot_path; ?>i/selfies" style="text-align: center;color: #444140;">
		<div style=" height: 8px; "></div>
		<i class="fa fa-file-picture-o" style="font-size: 26px;color: #fcb82e;"></i><br>
		<span class="title" style="font-size: 14px;">Selfie Contest</span>
		<div style=" height: 8px; "></div>
		</a>
	</li>
	<li >
		<a href="<?php echo $webroot_path; ?>i/videos" style="text-align: center;color: #444140;">
		<div style=" height: 8px; "></div>
		<i class="fa fa-file-video-o" style="font-size: 26px;color: #fcb82e;"></i><br>
		<span class="title" style="font-size: 14px;">Videos</span>
		<div style=" height: 8px; "></div>
		</a>
	</li>
	<li >
		<a href="<?php echo $webroot_path; ?>i/logout" style="text-align: center;color: #444140;">
		<div style=" height: 8px; "></div>
		<i class="icon-lock" style="font-size: 26px;color: #fcb82e;"></i><br>
		<span class="title" style="font-size: 14px;">Log Out</span>
		<div style=" height: 8px; "></div>
		</a>
	</li>
	
	<?php
}

function logo(){
	$this->layout="";
	$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
	?>
	<a href="<?php echo $webroot_path ?>i/index">
	<img src="<?php echo $webroot_path ?>img/logo.png" alt="logo" class="logo-default" style="height:40px;margin:2px;" />
	</a>
	<?php
}

function title(){
	$this->layout="";
	$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
	?>
	Pyrotech Workspace Solutions Pvt. Ltd.
	<?php
}

function user_name(){
	$this->layout="";
	$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	
	$this->loadmodel('user');
	$result_user=$this->user->find('all',array('conditions'=>array('id'=>$ws_user_id)));
	$name=$result_user[0]["user"]["name"];
	?>
	<div class="username username-hide-on-mobile" style="color: #FFF;font-weight: bold;margin-top: 15px;">
		Abhilash Lohar </div>
	<?php
}

function send_updates(){
	$this->layout="selfie";
	
	if (isset($this->request->data['send'])){
		$title=$this->request->data['title'];
		$detail=nl2br($this->request->data['detail']);
		
		$a=array("note-success","note-info","note-danger","note-warning");
		$random_keys=array_rand($a,1);
		$class=$a[$random_keys];
		
		$this->loadmodel('update');
		$this->update->saveAll(Array( Array("title" => $title,"detail" => $detail,"class" => $class))); 
	}
}

function update_popup(){
	$this->layout="";
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	
	$this->loadmodel('update');
	$order=array('update.id'=>'DESC');
	$updates = $this->update->find('all',array('order'=>$order,'limit'=>1));
	$this->set('updates',$updates);
	
	if(sizeof($updates)>0){
		$update_id=@$updates[0]["update"]["id"];
		$this->loadmodel('updated_member');
		$conditions=array("update_id" => $update_id,"user_id" => $ws_user_id);
		$count = $this->updated_member->find('count',array('conditions'=>$conditions));
		$this->set('count',$count);
	}
	
	
	 
}

function auto_update(){
	$this->layout="";
	$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
	?>
	<script>
	setInterval(function(){
	   $.ajax({
		   url: "<?php echo $webroot_path ; ?>i/update_popup/",
		   success: function(data){
			   $("#update_popup_div").html(data);
		   }
		 });
	}, 5000);
	$(document).ready(function() {
		$(".close_update").live("click",function(){
			var update_id=$(this).attr("update_id");
			//alert(update_id);
			$.ajax({
			   url: "<?php echo $webroot_path ; ?>i/update_member_impression/"+update_id,
			   success: function(data){
				   $("#update_popup_div").html("");
			   }
			 });
		})
	});
	</script>
	<div id="update_popup_div"></div>
	<?php
}

function update_member_impression($update_id=null){
	$this->layout="";
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	
	$this->loadmodel('updated_member');
	$this->updated_member->saveAll(Array( Array("update_id" => $update_id, "user_id" => $ws_user_id))); 
}

function sync(){
	$this->layout="";
	$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
	$storeFolder = 'videos/';
	$files = scandir($storeFolder);               
										
	if ( false!==$files ) {
		foreach ( $files as $file ) {
			if ( '.'!=$file && '..'!=$file) {
				$obj['name'] = $file;
				
				$result[] = $obj;
			}
		}
	}
	foreach($result as $data){
		$name=$data["name"];
		$this->loadmodel('video'); 
		$conditions=array("name"=> $name);
		$count=$this->video->find('count',array('conditions'=>$conditions));
		if($count==0){
			$this->loadmodel('video');
			$this->video->saveAll(Array( Array("name" => $name))); 	
		}
	}
	
	$this->loadmodel('video'); 
	$videos=$this->video->find('all');
	foreach($videos as $video){
		$name=$video["video"]["name"];
		
		$checkFolder = 'videos/'.$name;
		if(file_exists($checkFolder)){
			//echo $name;
		}else{
			$this->loadmodel('video');
			$conditions4=array('name'=>$name);
			$this->video->deleteAll($conditions4);
		}
	}
	
	$this->redirect(array('action' => 'add_video'));
}

function is_liked($s_id){
	$this->layout=null;
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	$this->loadmodel('liker'); 
	$conditions=array("s_id"=> $s_id,"user_id"=> $ws_user_id);
	return $count=$this->liker->find('count',array('conditions'=>$conditions));
}

function count_like($s_id){
	$this->layout=null;
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	$this->loadmodel('liker'); 
	$conditions=array("s_id"=> $s_id);
	return $count=$this->liker->find('count',array('conditions'=>$conditions));
}

function submit_like($s_id=null){
	$this->layout="";
	
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	
	$this->loadmodel('liker');
	$this->liker->saveAll(Array( Array("s_id" => $s_id,"user_id" => $ws_user_id))); 	
	//echo "ok";
}

function send_video($v_id=null){
	$this->layout="";
	
	$ws_user_id = (int)$this->Session->read('ws_user_id');
	
	$this->loadmodel('video_rqst');
	$this->video_rqst->saveAll(Array( Array("v_id" => $v_id,"user_id" => $ws_user_id))); 	
	//echo "ok";
}

}
?>


