<?php
error_reporting(0);
$p=loadvariable("p","");
$oldpass=loadvariable("oldpass","");
$newpass=loadvariable("newpass","");
$rnewpass=loadvariable("rnewpass","");
$flag=0;
	

// check for user name....
	$sql="select password from user where email= '".$_SESSION["email"]."'";
	$rspass=$objDB->select($sql);
	//$result=mysql_query($sql);
	for($i=0;$i<count($rspass);$i++)
	
		{
			$oldpass1=$rspass[$i]['password'];
			
			
			if($oldpass!=$oldpass1)
			{
				$flag=1;
			}
			if($newpass==$oldpass1)
			{
				$flag=2;
			}
			
			
		}
	if($flag==1)
	{
		$_SESSION["old"]="Password change failed. Please provide your old password correctly.";
		header("location:index.php?p=changepass");
		exit;
	}
	if($flag==2)
	{
		$_SESSION["new"]="Password change failed. New Password same as the old password";
		header("location:index.php?p=changepass");
		exit;
	}
	else
	{
		$sql1="update user set  password='".$newpass."' where email= '".$_SESSION["email"]."'";
		$objDB->sql_query($sql1);
		$_SESSION["cpass"]="Password Has Been Changed SuccessFully";
		header("location:index.php?p=changepass");
		exit;
	}
	?>