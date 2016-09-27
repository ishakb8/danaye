<option>Select City</option>
<?php
if(isset($_POST['city_id']))
{
include('includes/connect.php');

 $city_id = $_POST['city_id'];
$find=mysql_query(" SELECT * FROM city WHERE country_id ='".$city_id."' ORDER BY city_name");
while($row=mysql_fetch_array($find))


{?> 
<option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
<?php } 
}
?>