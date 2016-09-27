<?php 
ob_start();
session_start();
 $_SESSION['price']  = $_POST['price'];
if($_SESSION['login_user']){ ?>
<?php  include('includes/connect.php');
$sess_id = session_id();
    if(isset($_POST['secondbtn'])){
		$continent_id = $_POST['continent_id'];
		$territory_id= $_POST['territory_id'];
		$country_id= $_POST['country_id'];
		$city_id= $_POST['city_id'];
		 $categories_id= $_POST['categories_id'];
		//$sub_categories_id= $_POST['sub_categories_id'];
		echo $checkbox1=$_POST['sub_categories_id'];  
		echo $checkbox1= implode(",",$checkbox1);
		//$chk="";  
		
		
/* 		foreach($checkbox1 as $chk1)  {  
			$chk .= $chk1.",";  
		}   
		$chk = substr($chk,0,-1); */
	}

    if(isset($_POST['thirddbtn'])){
		$login_user= $_SESSION['login_user'];
		$phone = $_POST['phone'];
		$contactname = $_POST['contactname'];
		$posting_title = $_POST['posting_title'];
		$specific_location = $_POST['specific_location'];
		$posting_description =$_POST['posting_description'];
		$compensation = $_POST['compensation'];
		$disabilities = $_POST['disabilities'];
		$continent_id_x = $_POST['continent_id'];
		$territory_id_x = $_POST['territory_id'];
		$country_id_x = $_POST['country_id'];
		$city_id_x = $_POST['city_id'];
		$sub_categories = $_POST['sub_categories'];
		$checkbox1=explode(",",$sub_categories);
		$categories_id_x = $_POST['categories_id'];
		//$sub_categories_id_x = $_POST['sub_categories_id'];
	
		$j = 0; //Variable for indexing uploaded image 
		
	$k = 0;
	//print_r($checkbox1)."okkk";
	While($k<sizeof($checkbox1))
	{
		//echo sizeof($checkbox1);
		 $posting_query="INSERT INTO postings (contactname, posting_title, posting_description, specific_location, compensation, disabilities, phone, login_user,  continent_id, territory_id, country_id, city_id, categories_id, sub_categories_id, superadmin_id, payment_status, posting_status, time)
	
		VALUES ('$contactname', '$posting_title', '$posting_description', '$specific_location', '$compensation', '$disabilities', '$phone', '$login_user', '$continent_id_x', '$territory_id_x', '$country_id_x', '$city_id_x', '$categories_id_x', '$checkbox1[$k]', '1', 'Pending', 'Active', now() )";
		$posting_res=mysql_query($posting_query);
$k++;		
	}	
	
	
		$posting_id = mysql_insert_id();
		
	
		if ($posting_res){
				//$target_path = "posting_uploads/"; //Declaring Path for uploaded images
				$insert_images_id = 0;
			for ($i = 0; $i < count($_FILES['file']['name']); $i++) { //loop to get individual element from the array
				$image_name = "";
				$target_path = "";
				$validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
				$ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
				$file_extension = end($ext); //store extensions in the variable
				$image_name=md5(uniqid()) . "." . $ext[count($ext) - 1];
				$target_path = "posting_uploads/".$image_name;//set the target path with a new name of image
				$j = $j + 1;//increment the number of uploaded images according to the files in array       
				if (($_FILES["file"]["size"][$i] < 380000) //Approx. 380kb files can be uploaded.
					&& in_array($file_extension, $validextensions)) {
					if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
						mysql_query("INSERT INTO `postings_images`(`posting_id`,`posting_paths`) VALUES('$posting_id','$image_name')");
						$insert_images_id = mysql_insert_id();
						//  echo $j.').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
					} else {//if file was not moved.
						echo $j. ').<span id="error">please try again!.</span><br/><br/>';
					}
				} else {//if file size and file type was incorrect.
					echo $j. ').<span id="error">***Image Size Should Be Less Than 380KB 6in x 4in and 72 DPI***</span><br/><br/>';
				}
			}
			if($insert_images_id > 0)
			{
				mysql_query("UPDATE `postings` SET `image_status`='1' WHERE `posting_id`='$posting_id'");	
			}
			if(mysql_query($posting_query)){

			 $msg="Add Posted Successfully.";
			 }	
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!-------Including jQuery from google------>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="script_upload.js"></script>
<script>
function validateForm() {
    var x = document.forms["myForm"]["posting_title"].value;
    if (x == null || x == "") {
        alert("Title must be filled out");
        return false;
    }
}
</script>
<!-------Including CSS File------>
<link rel="stylesheet" type="text/css" href="script_upload.css">

</head>
<body>
<!-- Header Starts here -->
<?php include('includes/post-header.php');?>
<!-- Ends here -->

 <?php if(@$msg){?><div style="color:green; text-align:center; font-size: 22px; padding:4px 0px;"><?php echo $msg; ?></div><?php }?>
<!-- steps Div Starts here -->
<div class="stepsDiv"> please limit each posting to a single area and category, once per <span>48 hours</span> <img src="images/step-3.jpg" height="112" width="935" border="0" /> </div>
<!-- Ends here -->
<!-- Grey Content Starts here -->

	  <?php  if($categories_id == 23 || $categories_id == 22) { ?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm">
<?php		  
	  }   $categories_id;
?>
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm">
		  
<div class="greyDivPost">
<div class="postContDiv">
  <fieldset class="feildsetBorder">
  <legend>Contact info</legend>
  <div class="formDiv">
    <ul>
      <li> Phone number<br />
        <input name="phone" type="text" class="textBox"  style="width:90%;" />
      </li>
      <li> Contact Name<br />
        <input name="contactname" type="text" class="textBox" style="width:90%;" />
		<input name="sub_categories" type="hidden" class="textBox" style="width:90%;" value="<?php echo $checkbox1; ?>"/>
      </li>
      <li style="width:100%; padding:10px 0px 0px 0px;"> users can also contact me :
        <input name="" type="checkbox" value="" />
        by phone
        <input name="" type="checkbox" value="" />
        by text </li>
    </ul>
  </div>
  </fieldset>
  <fieldset class="feildsetBorder">
  <legend>Posting Details</legend>
  <div class="formDiv">
    <ul>
      <li> Posting title<br />
        <input name="posting_title" type="text" class="textBox" style="width:90%;" />
      </li>
      <li> Specific location<br />
        <input name="specific_location" type="text" class="textBox" style="width:90%;" />
      </li>
      <li style="width:100%; padding:10px 0px 0px 0px;"> Posting Description<br />
        <div style="margin:10px 0px 0px 0px;">
          <!-- <textarea name="posting_description" id="product_desc" class="ckeditor" cols="30" rows="15" ></textarea>-->
          <textarea name="posting_description" id="product_desc" cols="100" rows="15" style="resize:none;"  ></textarea>
        </div>
      </li>
      <li style="width:100%; padding:10px 0px 0px 0px;"> Compensation<br />
        <input name="compensation" type="text" class="textBox" style="width:90%;" />
        <br />
        <small>please be as detailed as possible</small> </li>
      <li style="width:100%; padding:10px 0px 0px 0px;">
        <input name="disabilities" type="checkbox" value="Job opening for persons with disabilities" />
        ok to highlight this job opening for persons with disabilities </li>
    </ul>
  </div>
  
  <span style="font-size:12px; line-height:22px; padding:10px 18px; overflow:hidden; background:#f4f4f4; color:#6d6d6d; display:block; font-family:Arial, Helvetica, sans-serif;">
  <strong style="color:#cc0000;">Note :</strong>
  <span style="display:block;">First Field is Compulsory. Maximum 5 images you can able to upload Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be Less Than 380KB 6in x 4in and 72 DPI.</span>
  </span>
  

  <div id="filediv" style=" margin:10px 0px 0px 0px;">
    <input name="file[]" type="file" id="file"/>
  </div>
  <br/>
  <input type="hidden"  name="count" id="count" value="1" />
  <input type="button" id="add_more"  value="Add More Images"/>
  </fieldset>
</div>
</div>
  <!-- Ends here -->
  <div class="continueBtnDiv">
    <input name="continent_id" type="hidden" value="<?php echo $continent_id; ?>" class="textBox" />
    <input name="territory_id" type="hidden" value="<?php echo $territory_id; ?>" class="textBox" />
    <input name="country_id" type="hidden" value="<?php echo $country_id; ?>" class="textBox" />
    <input name="city_id" type="hidden" value="<?php echo $city_id; ?>" class="textBox" />
    <input name="categories_id" value="<?php echo $categories_id; ?>" type="hidden" class="textBox" />
    <input name="sub_categories_id" value="<?php echo $checkbox1; ?>" type="hidden" class="textBox" />
    <input name="gallery_id" value="<?php echo $file_name_array; ?>" type="hidden" class="textBox" />
    <input type="submit" name="thirddbtn" value="Preview" class="defaulthBtn" />
  </div>
   <input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="upload" value="1">
	
	<?php
		
		
		$sql="SELECT sub_categories_name,price  
				FROM sub_categories sc
				LEFT OUTER JOIN price p ON sc.sub_categories_id = p.sub_category_id
				WHERE sub_categories_id
				IN($checkbox1) "; 
		$qry=mysql_query($sql);
		$serialNo=1;
		while($row=mysql_fetch_array($qry))
		{ 
		?>
			<input type="hidden" name="item_name_<?php echo $serialNo; ?>" 	value="<?php echo $row['sub_categories_name']; ?>"	 />
                <input type="hidden" name="amount_<?php echo $serialNo; ?>" value="<?php echo $row['price']; ?>" />
	<?php
		$serialNo++;		
		}
	?>
<input type="hidden" name="business" value="sumanth.wetech@gmail.com">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="cancel_return" value="http://phtutorial.in/livedemo/dynamicpaypal/cancel.php">
    <input type="hidden" name="return" value="http://phtutorial.in/livedemo/dynamicpaypal/success.php">
</form>
<?php include('includes/footer.php') ?>
</body>
</html>
<?php }else{

	header('Location: login.php?msg=Please enter your User name and Password.');

}

?>
