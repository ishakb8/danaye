<?php ob_start();
session_start();
//print_r($_POST);
include 'email_activation2/db.php';
		if(isset($_POST['submit'])){
$msg='';
if(!empty($_POST['email']) && isset($_POST['email']) &&  !empty($_POST['password']) &&  isset($_POST['password']))
{
// username and password sent from Form
 @$name=mysql_real_escape_string($connection,$_POST['name']); 
  @$contact=mysql_real_escape_string($connection,$_POST['contact']); 
   @$email=mysql_real_escape_string($connection,$_POST['email']); 
@$password=mysql_real_escape_string($connection,$_POST['password']); 

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';


$password=md5($password); // Encrypted password
$activation=stripslashes($email.time()); // Encrypted email+timestamp

echo $count=mysql_query($connection,"SELECT email FROM registration WHERE email='$email'")."okok";
if(mysql_num_rows($count) < 1)
{
 mysql_query($connection,"INSERT INTO registration(name,email,contact,password,activation,user_type,payment_type,status,date) VALUES('$name','$contact','$phone','$password','$activation','user', 'FREE','Pending', now());");
//print_r(mysqli_query);

include 'email_activation2/smtp/Send_Mail.php';
$to=$email;
$subject="Email verification";
echo $xurl = $base_url.'activation/'.$activation;
//print_r($xurl);
$body="
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>Untitled Document</title>
</head>

<body>

<div style='width:700px; border-radius:6px; border:2px solid #efefef; overflow:hidden;'>
	<div style='padding:15px 0px; overflow:hidden; text-align:center;'>
    <img src='http://www.bestinciti.com/clients/danaye/images/logo-email.jpg' height='71' width='257' border='0' />
    </div>
    <div style='clear:both; padding:20px 35px; background:#efefef; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#333333; line-height:36px;'>
    <span style='font-size:20px; color:#000000; font-weight:bold;'><span style='color:#e31b23;'>Hi</span> Friends </span>
    <span style='display:block;'>We need to make sure you are human. Please verify your email and get started using your Website account. </span>
    <a href='$xurl' style='text-decoration:none; color:#ffffff;'>
		<span style='background:#e31b23; padding:10px 20px; border-radius:4px; display: inline-block; color:#ffffff; font-size:30px; font-weight:bold;'>    
		Click Here 
		</span>
    </a>
    </div>
</div>
<div style='width:700px; overflow:hidden; clear:both; padding:10px 0px; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#6d6d6d;'>
Copyrights © 2015 Danaye
</div>
</body>
</html>
";

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
 ?>
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
<script type="text/javascript">
   <!--
      function validation()
      {
         
		 
		 if( document.registration.name.value == "" )
         {
            alert( "Please Enter Your Name" );
            document.registration.name.focus() ;
            return false;
         }
		 
		  
         var emailID = document.registration.email.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
            alert("Please Enter Correct Email ")
            document.registration.email.focus() ;
            return false;
         }
    var x = document.registration.phone.value;
       
        if (x==null || x=="")
   {
    alert("Phone no. cannot be left blank");
    return false;
   }       

         if(isNaN(x)|| x.indexOf(" ")!=-1)
 {
                 alert("Enter numeric value");
   return false;
                }
           if ((x.length < 10) || (x.length > 10))
   {
                   alert("enter Phone Number 10 characters"); 
    return false;
              }
	 if( document.registration.password.value == "" )
         {
            alert( "Please Enter Your Password" );
            document.registration.password.focus() ;
            return false;
         }
		  
   
            return ( true );
   }
   //-->
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
      <div class="memberLogin" style="display:block;"> Create Account <span class='msg' style="font-size:14px; display:block; padding:5px 0px 0px 0px;"><?php echo $msg; ?></span>
        <ul>
          <form name="registration" method="POST" action="" onsubmit="return(validation());">
            <li>
              <div class="fieldDiv">
                <input name="name" type="text" style="width:80%;" placeholder="Name" />
              </div>
            </li>
            <li id="frmCheckUsername">
              <div class="fieldDiv">
                <div >
                  <input name="email" type="email" style="width:80%;" placeholder="Email"   id="username"  onBlur="checkAvailability()" />
                 </div>
              </div>
              <span id="user-availability-status"></span>
            </li>
            <li>
              <div class="fieldDiv">
                <input name="phone" type="text" style="width:80%;" placeholder="Phone"  />
              </div>
            </li>
            <li>
              <div class="fieldDiv">
                <input name="password" type="password" style="width:80%;" placeholder="Password" />
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
