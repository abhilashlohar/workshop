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
				<option value="">Select Cotegory</option>
				<option value="Workshop" <?php if($category=="Workshop"){ echo "selected=''"; } ?>>Workshop</option>
				<option value="Lunch" <?php if($category=="Lunch"){ echo "selected=''"; } ?>>Lunch</option>
				<option value="Member" <?php if($category=="Member"){ echo "selected=''"; } ?>>Member</option>
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