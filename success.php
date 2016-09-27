<?php
ob_start();
session_start();
$username=$_SESSION['login_user'];
if($_SESSION['login_user']){ ?>
<?php  include('includes/connect.php');
$item_no = $_GET['item_number'];
// $_SESSION['price']  = $_POST['price'];
$item_transaction = $_GET['tx']; // Paypal transaction ID
$item_price = $_GET['amt']; // Paypal received amount
$item_currency = $_GET['cc']; // Paypal received currency type

//Getting product details
$sql=mysql_query("SELECT sub_categories_name,price  
				FROM sub_categories sc
				LEFT OUTER JOIN price p ON sc.sub_categories_id = p.sub_category_id
				WHERE sub_categories_id
				IN($chk) ");
$row=mysql_fetch_array($sql);
$price=$row['price'];

//Rechecking the product price and currency details
if($item_price==$price && item_currency==$currency)
{

$result = mysql_query("INSERT INTO transaction(transaction_id,sub_category,price) VALUES('$item_transaction','$item_no','$price')");
if($result)
{
echo "<h1>Welcome, $username</h1>";
echo "<h1>Payment Successful</h1>";
}
}
else
{
echo "Payment Failed";
}
}
?>