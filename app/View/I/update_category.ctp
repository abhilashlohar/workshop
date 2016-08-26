<?php
$webroot_path=$this->requestAction(array('controller' => 'i', 'action' => 'webroot_path'));
?>
<ul class="nav nav-tabs">
	<li>
		<a aria-expanded="true" href="add_picture" >
		Add Pictures </a>
	</li>
	<li class="active">
		<a aria-expanded="false" href="update_category" >
		Update Category </a>
	</li>
</ul>
<table class="table table-striped clearfix">
	<tbody>
	<?php foreach($pictures as $picture){ 
	$name=$picture["picture"]["name"];
	$id=$picture["picture"]["id"];
	$category=$picture["picture"]["category"];	?>
		<tr class="template-download fade in">
			<td>
				<span class="preview">
						<a href="<?php echo $webroot_path ?>assets/global/plugins/jquery-file-upload/server/php/files/<?php echo $name; ?>" title="IMG-20150616-WA0034.jpg" download="IMG-20150616-WA0034.jpg" data-gallery=""><img src="<?php echo $webroot_path ?>assets/global/plugins/jquery-file-upload/server/php/files/<?php echo $name; ?>" style="width:50px;"></a>
				</span>
			</td>
			<td>
				<p class="name">
						<a href="#" title="<?php echo $name; ?>" ><?php echo $name; ?></a>
				</p>
			</td>
			<td width="30%">
			<select class="form-control update_cat" row_id="<?php echo $id; ?>">
				<option value="">Select Category</option>
				<option value="Welcome" <?php if($category=="Welcome"){ echo "selected=''"; } ?>>Welcome</option>
				<option value="Session-1" <?php if($category=="Session-1"){ echo "selected=''"; } ?>>Session-1</option>
				<option value="Product launch" <?php if($category=="Product launch"){ echo "selected=''"; } ?>>Product launch</option>
				<option value="Lunch" <?php if($category=="Lunch"){ echo "selected=''"; } ?>>Lunch</option>
				<option value="Session-2" <?php if($category=="Session-2"){ echo "selected=''"; } ?>>Session-2</option>
				<option value="Hypnotic Show" <?php if($category=="Hypnotic Show"){ echo "selected=''"; } ?>>Hypnotic Show</option>
				<option value="Dinner" <?php if($category=="Dinner"){ echo "selected=''"; } ?>>Dinner</option>
				<option value="Factory Visit" <?php if($category=="Factory Visit"){ echo "selected=''"; } ?>>Factory Visit</option>
			</select>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<script>
jQuery(document).ready(function() {
    $(".update_cat").on("change",function(){
		var cat=$(this).val();
		var row_id=$(this).closest("select").attr("row_id");
		$.ajax({
			url: "<?php echo $webroot_path; ?>i/update_category_submit/"+cat+"/"+row_id,
		}).done(function(response){
			
		});
	});
});
</script>