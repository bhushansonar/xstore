<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$email=loadVariable("email","");
$password=loadVariable("password","");

if($email!="" || $password!=""){
$sql="SELECT * FROM user WHERE email='$email' and password='$password' and Status='1'";
$getLogin = $objDB->select($sql);
if(!empty($getLogin) && count($getLogin) > 0){
		$_SESSION["email"]=$getLogin[0]["email"];
		$_SESSION["username"]=$getLogin[0]["firstname"];
		$_SESSION["userid"]=$getLogin[0]["UserId"];
		$sql = "update user set LastLogin = '".date('Y-m-d H:i:s')."' where UserId = '".$_SESSION["userid"]."'";
		$update = $objDB->sql_query($sql);
		header("Location:index.php");
		exit;
	}
	else{
			$_SESSION['nologin'] = "We could not find an account with that email address. Please try again";
			$_SESSION['email']=$email;
			$_SESSION['password3']=$password;
			header("Location:".$AbsoluteURL."index.php?p=login");
			exit;
		}
	}
	else
	{
		$_SESSION['nologin'] = "The username and password you entered does not belong to any account.";
	header("Location:".$AbsoluteURL."index.php?p=login");
	exit;
	}
			
?>	
