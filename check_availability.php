<?php
 include('includes/connect.php');



if(!empty($_POST["email"])) {
  $result = mysql_query("SELECT count(*) FROM registration WHERE email='" . $_POST["email"] . "'");
  $row = mysql_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='status-not-available'> This Email exists with us.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}
?>