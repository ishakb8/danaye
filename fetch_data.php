<option>Select Territory</option>

<?php


if(isset($_POST['get_option']))
{
include('includes/connect.php'); 



echo $state = $_POST['get_option'];
$find=mysql_query("select * from  territory where continent_id='$state' ORDER BY territory_name");
while($row=mysql_fetch_array($find))
{?>        

<option value="<?php echo $row['territory_id']; ?>"><?php echo $row['territory_name']; ?></option>
<?php }


}

?>