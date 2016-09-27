<?php ob_start();
session_start();
include 'email_activation2/db.php';



		if(isset($_POST['submit'])){


$msg='';
if(!empty($_POST['email']) && isset($_POST['email']) &&  !empty($_POST['password']) &&  isset($_POST['password']) )
{
// username and password sent from Form
 $name=mysqli_real_escape_string($connection,$_POST['name']); 
  $phone=mysqli_real_escape_string($connection,$_POST['phone']); 
   $email=mysqli_real_escape_string($connection,$_POST['email']); 
$password=mysqli_real_escape_string($connection,$_POST['password']); 

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

if(preg_match($regex, $email))
{  
$password=md5($password); // Encrypted password
$activation=md5($email.time()); // Encrypted email+timestamp

$count=mysqli_query($connection,"SELECT email FROM registration WHERE email='$email'");
if(mysqli_num_rows($count) < 1)
{
mysqli_query($connection,"INSERT INTO registration(name,email,contact,password,activation,user_type,payment_type,status,date) VALUES('$name','$email','$phone','$password','$activation','user', 'FREE','Pending', now());");

include 'email_activation2/smtp/Send_Mail.php';
$to=$email;
$subject="Email verification";
$body='Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a>';
Send_Mail($to,$subject,$body);

$msg= "Registration successful, please activate email.";	

}
else
{
$msg= '<font color="#cc0000">The email is already taken, please try new.</font>';	
}



}
else
{
   $msg = '<font color="#cc0000">The email you have entered is invalid, please try again.</font>';  
}


}
} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />
<!-- Start WOWSlider.com HEAD section -->
<!-- add to the <head> of your page -->
<link rel="stylesheet" type="text/css" href="slider/style.css" />
<script type="text/javascript" src="slider/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'email='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>

</head>
<body>
<div class="loginMnDiv">
  <div class="loginDiv">
    <div class="box-login">
      <div>
        <a href="index.php"><label class="left logoTxt"><span>Dana</span>ye </label></a>
        <label class="right"><span class="homeIcn"><a href="index.php"><i class="fa fa-home"></i></a></span></label>
      </div>
      <!-- Members Login -->
      <!-- End hers -->
      <!-- Create Account -->
      <div class="memberLogin" style="display:block;"> Create Account <span class='msg'><?php echo $msg; ?></span>
        <ul>
          <form name="registration" method="POST" action="">
            <li>
              <div class="fieldDiv">
                <input name="name" type="text" style="width:80%;" placeholder="Name"  required="required"/>
              </div>
            </li>
            <li id="frmCheckUsername">
              <div class="fieldDiv">
                <div >
                  <input name="email" type="email" style="width:80%;" placeholder="Email" required="required"  id="username"  onBlur="checkAvailability()" />
                 </div>
              </div>
              <span id="user-availability-status"></span>
            </li>
            <li>
              <div class="fieldDiv">
                <input name="phone" type="text" style="width:80%;" placeholder="Phone" required="required" />
              </div>
            </li>
            <li>
              <div class="fieldDiv">
                <input name="password" type="password" style="width:80%;" placeholder="Password"  required="required"/>
              </div>
            </li>
            <li>
              <input name="submit" type="submit" class="defaultBtn" value="Create Account" />
            </li>
          </form>
        </ul>
      </div>
      <!-- End hers -->
      <img src="images/or-img.jpg" height="56" width="451" border="0" />
        <a href="login.php" style="text-decoration:none;">
        <div class="memberLogin" style="padding-bottom:20px;">
        <input name="" type="button" class="defaultBtn" value="Login" style="background:#e31c21;" />
        </div></a>
    </div>
  </div>
</div>
<!-- Start WOWSlider.com BODY section -->
<!-- add to the <body> of your page -->
<div id="wowslider-container1">
  <div class="ws_images">
    <ul>
      <li><img src="slider/images/1.jpg" alt="1" title="1" id="wows1_0"/></li>
      <li><img src="slider/images/2.jpg" alt="2" title="2" id="wows1_1"/></li>
      <li><img src="slider/images/3.jpg" alt="3" title="3" id="wows1_2"/></li>
    </ul>
  </div>
</div>
<script type="text/javascript" src="slider/wowslider.js"></script>
<script type="text/javascript" src="slider/script.js"></script>
<!-- End WOWSlider.com BODY section -->
</body>
</html>
