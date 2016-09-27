<option>Select Sub Category</option>
<?php
if(isset($_POST['cat_id']))
{
include('includes/connect.php');

 $cat_id = $_POST['cat_id'];
$find=mysql_query(" SELECT * FROM sub_categories WHERE categories_id ='".$cat_id."' ORDER BY sub_categories_name");
while($row=mysql_fetch_array($find))


{?> 
<option value="<?php echo $row['sub_categories_id']; ?>"><?php echo $row['sub_categories_name']; ?></option>
<?php } 
}
?>