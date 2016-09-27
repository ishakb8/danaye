	<?php
	if(isset($_FILES['files'])){
	$errors= array();
	$file_name_array="";
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
	$file_name = $key.$_FILES['files']['name'][$key];
	//$file_size =$_FILES['files']['size'][$key];
	$file_tmp =$_FILES['files']['tmp_name'][$key];
	//$file_type=$_FILES['files']['type'][$key];	
	
	move_uploaded_file($file_tmp,"upload/".$file_name);
	$file_name_array.=$file_name.",";
	
	}
	echo $file_name_array;
	
	
	}
	?>
	
	
	<form action="" method="POST" enctype="multipart/form-data">
	<input type="file" name="files[]" multiple/>
	<input type="submit"/>
	</form>
