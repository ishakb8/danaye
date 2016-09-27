<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Danaye-Classified Directory Online</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="font-awesome.min.css" rel="stylesheet" type="text/css"  />
<link rel="stylesheet" href="jquery.mCustomScrollbar.css">

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "autosearch/readCountry.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
</head>
<body>
<?php include('includes/index-header.php');?>
<!-- Container Starts here -->
<div class="container clear">
  <?php include('includes/connect.php');?>
  <?php 

$territory_query=mysql_query("SELECT * FROM territory ORDER BY territory_name");

while($territory = mysql_fetch_assoc($territory_query)){?>
  <div class="contentDiv">
    <h1><?php echo $territory['territory_name']?></h1>
    <div class="greyCntDiv">
      <!------------------------Country Start----------------------------------------------------->
      <!------------------------------------------------------------------------------------------>
      <!------------------------------------------------------------------------------------------>
      <?php $country_query=mysql_query("SELECT * FROM country WHERE territory_id_fkey='".$territory['territory_id']."' ORDER BY country_name");
while($country = mysql_fetch_assoc($country_query)){?>
      <!-- Box1 Starts here -->
      <div class="blocksDiv">
        <div> <span class="countyTxthdng"> <?php echo  $country['country_name']?></span>
          <ul>
            <?php $city_query=mysql_query("SELECT * FROM city WHERE country_id='".$country['country_id']."' and territory_id='".$territory['territory_id']."' ORDER BY city_name");

while($city = mysql_fetch_assoc($city_query)){?>
            <li> <a href="select-cities.php?territory_id=<?php echo $territory['territory_id']?>&country_id=<?php echo $country['country_id']; ?>&city_id=<?php echo $city['city_id'];?>"><i class="fa fa-angle-double-right iconarow"></i> <?php echo $city['city_name'];?></a> </li>
            <?php }?>
          </ul>
        </div>
      </div>
      <!-- Ends here -->
      <?php }?>
      <!------------------------Country End----------------------------------------------------->
      <!------------------------------------------------------------------------------------------>
      <!------------------------------------------------------------------------------------------>
    </div>
  </div>
  <?php }?>
</div>
<!-- Ends here -->
<!-- Footer Starts Here -->
<?php include('includes/index-footer.php');?>
<!-- Footer Ends here -->
<!-- Google CDN jQuery with fallback to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- custom scrollbar plugin -->
<script src="jquery.mCustomScrollbar.concat.min.js"></script>
<script>
		(function($){
			$(window).load(function(){
				
				$("a[rel='load-content']").click(function(e){
					e.preventDefault();
					var url=$(this).attr("href");
					$.get(url,function(data){
						$(".content .mCSB_container").append(data); //load new content inside .mCSB_container
						//scroll-to appended content 
						$(".content").mCustomScrollbar("scrollTo","h2:last");
					});
				});
				
				$(".content").delegate("a[href='top']","click",function(e){
					e.preventDefault();
					$(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
				});
				
			});
		})(jQuery);
	</script>
</body>
</html>
