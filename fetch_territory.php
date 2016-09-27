<option>Select Country</option>
<?php
if(isset($_POST['territory_id']))
{
include('includes/connect.php');
 
echo $territory_id = $_POST['territory_id'];
$find=mysql_query(" SELECT * FROM country WHERE territory_id ='".$territory_id."' ORDER BY country_name");
while($row=mysql_fetch_array($find))


{?> 
<option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
<?php } 
}
?>