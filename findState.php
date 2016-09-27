

<?php $country=intval($_GET['country']);
 include('includes/connect.php');
$query="SELECT city_id,city_name FROM city WHERE country_id='$country'";
$result=mysql_query($query);

?>
<select name="city" class="textBox selectBox" id="city" style="width: 96%;" onchange="getCity(<?php echo $country_name?>,this.value)">
<option>Select City</option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row['city_id']?>><?php echo $row['city_name']?></option>
<?php } ?>
</select>