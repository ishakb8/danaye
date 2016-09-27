<?php ob_start();

session_start();

if($_SESSION['login_user']){ 
}
?>
<html>
<title>PayPal</title>
<body>
<h2>We are here to help you !</h2>
<div align="center">

 <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="upload" value="1">
	
	<?php
		$conn=mysql_connect('localhost','bestinci_danayeu','danaye12!@') or die ('UserName or Password is incorrect');
	$db=mysql_select_db('bestinci_danayedb') or die ('Database Incorrect');
		
		$sql="SELECT p.price_id, p.price, cat.category_name FROM price p LEFT OUTER JOIN  categories cat ON cat.category_id = p.category_id"; 
		$qry=mysql_query($sql);
		$serialNo=1;
		while($row=mysql_fetch_array($qry))
		{ 
		?>
			<input type="hidden" name="item_name_<?php echo $serialNo; ?>" 	value="<?php echo $row['category_name']; ?>"	 />
			<input type="hidden" name="amount_<?php echo $serialNo; ?>" value="<?php echo $row['price']; ?>" />
	<?php
		$serialNo++;		
		}
	?>
<input type="hidden" name="business" value="sumanth.wetech@gmail.com">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="cancel_return" value="http://phtutorial.in/livedemo/dynamicpaypal/cancel.php">
    <input type="hidden" name="return" value="http://phtutorial.in/livedemo/dynamicpaypal/success.php">
    <input type="submit" value="Go with Paypal" name="submit" style="cursor:pointer;background:#BE4C46;color:white;padding:10px;border:1px solid #BE4C46">
</form>


</div>
</body>
</html>
                    