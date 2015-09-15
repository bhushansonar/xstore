<?php
error_reporting(0);
$p=loadvariable("p","");
$firstname=loadvariable("firstname","");
$lastname=loadvariable("lastname","");
//$gender=loadvariable("gender","");
$password=loadvariable("password","");
$email=loadvariable("email","");
$flag=0;	
// check for user name....
	$sql="select email from user";
	$rsemail=$objDB->select($sql);
	//$result=mysql_query($sql);
	for($i=0;$i<count($rsemail);$i++)
	
		{
			$email1=$rsemail[$i]['email'];
			if($email==$email1)
			{
				$flag=1;
			}
		}
	if($flag==1)
	{
		$_SESSION["uname"]="Unavailable UserName";
		header("location:index.php?p=login");
		exit;
	}
	else
	{
		$sql="insert into user(firstname,lastname,email,password,Status) values ('".$firstname."','".$lastname."','".$email."','".$password."','1')";
		$objDB->insert($sql);
		
		$sql1="select * from user where email='".$email."'";
		$rslogin=$objDB->select($sql1);
		$result1=mysql_query($sql1);
		for($i=0;$i<count($rslogin);$i++)
		{
			
			$firstname=$rslogin[$i]['firstname'];
			$userid=$rslogin[$i]['UserId'];
			$_SESSION["username"]=$firstname;
			$_SESSION["userid"]=$userid;
		}		
		
		
		$sql2="SELECT * FROM user WHERE email='$email' and password='$password'";
		//$rslogin1=$objDB->select($sql1);
		$result=mysql_query($sql2);
		$count=mysql_num_rows($result);
		echo $count;
		
		if($count==1)
			{
				$_SESSION["email"]=$email;
				$sql = "update user set LastLogin = '".date('Y-m-d H:i:s')."' where UserId = '".$_SESSION["userid"]."'";
		$update = $objDB->sql_query($sql);
				header("Location:index.php?p=myaccount");
			}
			else 
			{	
				
				header("Location:".$AbsoluteURL."index.php?p=".$p);
			}
		
	}

?>
