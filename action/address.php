<?php
//error_reporting(0);
$p=loadvariable("p","");
$name=loadvariable("name","");
$address=loadvariable("address","");
$country=loadvariable("country","");
$state=loadvariable("state","");
$city=loadvariable("city","");
$pincode=loadvariable("pincode","");




		$sql="update user set  firstname='".$name."',address='".$address."', country='".$country."',state='".$state."',city='".$city."',pincode='".$pincode."' where email= '".$_SESSION["email"]."'";
		
	
		$objDB->sql_query($sql);
		
		header("location:index.php?p=address");
		

?>
