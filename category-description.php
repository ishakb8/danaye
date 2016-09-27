<?php

$city_id = $_GET['city_id'];

$categoty_id = $_GET['categoty_id'];

$sub_categories_id = $_GET['sub_categories_id'];

$posting_id = $_GET['posting_id'];



 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

$(document).ready(function() {
  function setHeight() {
    windowHeight = $(window).innerHeight();
    $('.col-xs-1').css('min-height', windowHeight);
  };
  setHeight();
  $(window).resize(function() {
    setHeight();
  });
});

</script>
<link rel="stylesheet" href="style-slider.css">
<script type="text/javascript">
function showEmailPopUp(status)
{
	if(status == "Open")
	{
		document.getElementById("emailToFriend").style.display = '';
	}
	else
	{
		document.getElementById("emailToFriend").style.display = 'none';
	}
}
function showReplyPopUp(status)
{
	if(status == "Open")
	{
		document.getElementById("replyMail").style.display = '';
	}
	else
	{
		document.getElementById("replyMail").style.display = 'none';
	}
}showReplyPopUp
</script>
<script type="text/javascript">
	 function Reportspam(val)
    {
    $.ajax({
    type: 'post',
    url: 'report.php',
    data: {
    report_id:val
    },
    success: function (response) {
		//document.getElementById("report").innerHTML=response; 
		alert(response);
    }
    });
    }
</script>
</head>
<body>
<?php

if(isset($_POST['email_to_friend'])){
	$other = $_SERVER['REQUEST_URI'];
	$actual_link = 'http://'.$_SERVER['HTTP_HOST'];

	$finalurl = $actual_link.$other;
	$friend_email = $_POST['friend_email'];
	$me_email = $_POST['me_email'];
$to = $friend_email;
$subject = "Danaye Post referece ";

$message = "
<html>
<head>
<title>Danaye</title>
</head>
<body>
<table>
<tr>
<th>Please have a look bellow send link</th>
</tr>
<tr>
<td><h1><a href='$finalurl'>Please have a look this link </a></h1></td>
</tr>

</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <danaye@danaye.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

$succesmail = mail($to,$subject,$message,$headers);
if($succesmail){
	$msg = "Posting shared to you friend email id :".$friend_email;
	}
}
?>
<!-- Email to friend Popup -->
<div class="popup-container" style="display:none;" id="emailToFriend">
  <div class="popup-white">
    <div class="popuphdngDiv">
      <label class="hdngTxt-popup">Email to Friend</label>
      <div class="closeBtn-popup"><a href="javascript:void(0);" onclick="return showEmailPopUp('Close');" > <img src="images/close-btn.jpg" height="54" width="62" border="0" /></a></div>
    </div>
    <div class="clear popupFormDiv">
      <ul>
        <form action="" method="post">
          <li> 
            <input type="text" name="friend_email" placeholder="Friend Email ID" class="poptxtBox" style="width:86%;" required="required"/>
          </li>
          <li>
            <input type="email" name="me_email" placeholder="Your Email ID" class="poptxtBox" style="width:86%;" required="required"/>
          </li>
          <li>
            <input type="submit" name="email_to_friend" value="Send Email to Friend"  class="popbtn" style="width:90%;" />
          </li>
        </form>
      </ul>
      <span style="color:#0C0;"><?php echo $msg; ?></span> </div>
  </div>
</div>
<!-- Email to friend Popup -->
<!-- Email to friend Popup -->
<div class="popup-container" style="display:none;" id="replyMail">
  <div class="popup-white">
    <div class="popuphdngDiv">
      <label class="hdngTxt-popup">Email to Friend</label>
      <div class="closeBtn-popup"><a href="javascript:void(0);" onclick="return showReplyPopUp('Close');" > <img src="images/close-btn.jpg" height="54" width="62" border="0" /></a></div>
    </div>
    <div class="clear popupFormDiv">
      <ul>
<?php 
if(isset($_POST['reply'])){
$other1 = $_SERVER['REQUEST_URI'];
$actual_link1 = 'http://'.$_SERVER['HTTP_HOST'];
$finalurl1 = $actual_link1.$other1;
$name = $_POST['name'];
$email1 = $_POST['email1'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$mag_query = mysql_query("INSERT INTO reply_messages (post_owner, link, message, name, email, subject, status, date)
VALUES ('none', '$finalurl1', '$message', '$name', '$email1', '$subject', 'Pending', now())");
if($mag_query){
$msg = "Your reply we have recieved";
}
}
?>
        <form action="" method="post">
          <li>
            <input type="text" name="name" placeholder="Name" class="poptxtBox" style="width:86%;" required="required" />
          </li>
          <li>
            <input type="email" name="email1" placeholder="Email" class="poptxtBox" style="width:86%;" required="required" />
          </li>
          <li>
          <input type="text" name="subject" placeholder="Subject" class="poptxtBox" style="width:86%;" required="required" />
          </li>
          <li><textarea name="message" placeholder="Message" class="poptxtBox" style="width:86%;" required="required"></textarea></li>
          <li>
            <input type="submit" name="reply" value="Reply" class="popbtn" style="width:90%;" />
          </li>
        </form>
      </ul>
      <span style="color:#0C0;"><?php echo $msg; ?></span>
      </div>
  </div>
</div>
<!-- Email to friend Popup -->

    




<?php include('includes/header.php');?>
<!-- Container Starts here -->
<div class="container clear">
  <!-- Left Content Starts here -->
  <?php include('includes/left-side-row.php');?>
  <!-- Left Content Ends here -->
  <!-- Right Div starts Here -->
  <div class="col-xs-2">
    <div class="righthdngDiv" style="font-size:26px;"> <span class="redtxt"><a href="javascript:void();">
      <?php

$cityname_query =mysql_query("SELECT * FROM city WHERE city_id='".$city_id."' ");

while($cityname = mysql_fetch_assoc($cityname_query)){

echo $cityname['city_name'];

}?>
      </a></span> - <span class="blacktxt"><a href="javascript:void();">
      <?php

$country_query =mysql_query("SELECT * FROM categories WHERE category_id	='".$categoty_id."' ");

while($country_name = mysql_fetch_assoc($country_query)){

echo $country_name['category_name'];

}?>
      </a></span> - <span class="greentxt"><a href="javascript:void();">
      <?php

$territory_query =mysql_query("SELECT * FROM sub_categories WHERE sub_categories_id='".$sub_categories_id."' ");

while($territory_name = mysql_fetch_assoc($territory_query)){

echo ucfirst($territory_name['sub_categories_name']);

}?>
      </a></span> </div>
    <!-- Category List Starts here -->
    <div class="categoryListDiv" style="padding:10px 0px;">
      <?php 

$description_query=mysql_query("SELECT * FROM postings WHERE posting_id='".$posting_id."'");

while($description_res = mysql_fetch_assoc($description_query)){?>
      <div class="clear"> <span class="descDivHdng"><?php echo $description_res['posting_title'];?></span> </div>
      <div id="slider" style="float: left;">
      <a href="#" class="control_next">></a> <a href="#" class="control_prev"><</a>
        <ul>
          <?php 
        $images_query=mysql_query("SELECT * FROM postings_images WHERE posting_id ='".$posting_id."'");
        while($images_res = mysql_fetch_assoc($images_query)){?>
          <li><img src="posting_uploads/<?php echo $images_res['posting_paths'];?>"  alt="Image" style="width:600px; height:400px;" /> </li>
          <?php }  ?>
        </ul>
      </div>
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src="index-slider.js"></script>
      <div class="textDescr" style="clear:both;">
        <p><?php echo nl2br($description_res['posting_description']);?></p>
        <p><strong>Contact Us : </strong> None<br />
          <strong>Mobile :</strong> <?php echo $description_res['phone'];?><br />
          <strong>Specific Location  :</strong> <?php echo $description_res['specific_location'];?><br />
          <strong>Compensation :</strong> <?php echo $description_res['compensation'];?><br />
          <strong>Note :</strong> <?php echo $description_res['disabilities'];?></p>
      </div>
      <div id='container'> </div>
      <a href="javascript:void(0);" class="greyButt click" onclick="return showEmailPopUp('Open');">
      <div><i class="fa fa-envelope"></i> Email to Friend</div>
      </a> <a href="javascript:void(0);" class="greyButt" onclick="return showReplyPopUp('Open');">
      <div><i class="fa fa-reply"></i> Reply</div>
      </a>
      <a href="javascript:void(0);" class="greyButt" onclick="javascript:Reportspam(<?php echo $posting_id;?>);">
      <div> Report</div>
      </a>
      <?php }?>
       </div>
    <!-- Ends here -->
  </div>
  <!-- Ends here -->
</div>
<!-- Ends here -->
<!-- Footer Starts Here -->
<?php include('includes/index-footer.php'); ?>
<!-- Footer Ends here -->
<script type="text/javascript">
<!--
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
//-->
</script>

<script type="text/javascript" src="jquery-latest.js"></script> 
<script type="text/javascript" src="jquery.tinyscrollbar.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('.scrollbar_Y').tinyscrollbar();
});	
</script>

</body>
</html>
