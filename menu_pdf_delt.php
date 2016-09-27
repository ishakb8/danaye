<?php 
	include('includes/connect.php');

$menu_id =$_GET['menupdf'];
$deltemenupdf= mysql_query("DELETE FROM menu_pdf_files WHERE pf_id='$menu_id'");
if($deltemenupdf){
echo '<script>';
echo 'alert("Pdf file deteted from the server")';
echo '</script>';

}
// ------------PDF delte function ------------------>

?>