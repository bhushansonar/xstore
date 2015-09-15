<?php
	//ini_set("error_reporting",E_ALL|E_STRICT);
	error_reporting(0);
	putenv("TZ=Europe/Paris");
	define ("DB_SERVER","localhost");
		define ("DB_DATABASE","xstore");
		define ("DB_USERNAME","root");
		define ("DB_PASSWORD","");
		
		$AbsoluteURL="http://localhost/xstore/";
	$AbsoluteURLAdmin="http://localhost/xstore/xstore-admin/";
		define("MAIL_TEMPLATE_PATH","http://192.168.1.2/nikitech/mailtemplate/");
		define ("EMAIL_FROM","vijay@nikitechnologies.com");
		define ("EMAIL_TO","vijay@nikitechnologies.com");
		define ("EMAIL_FROM_NAME","");		
		$BasicHURL=str_replace('index.php','',$_SERVER['PHP_SELF']);
		$HURL="http://".$_SERVER['HTTP_HOST'].$BasicHURL;
		$HURLS="http://".$_SERVER['HTTP_HOST'].$BasicHURL;
?>

		