<?php   
	ob_start();
	session_start();
	header("Content-Type: text/html; charset=UTF-8");
	
	require_once("utils/dbClass.php");	
   	require_once("utils/config.php");
	require_once("utils/functions.php");
	$objDB = new MySQLCN;


	if(empty($_REQUEST['p']))
		$page = "home.php";
	else if(isset($_REQUEST['p']))
		$page = $_REQUEST['p'].".php";
	else
		$page = "home.php";
	$p=loadVariable("p","home");
	if($p=='home'){
		$a=loadVariable("a","home");
	} else {
		$a=loadVariable("a","");
	}
	$includeDir = "include/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>X-Store Online Shop</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo $AbsoluteURL?>images/x1.jpg" type="image/jpeg">
<link href="<?php echo $AbsoluteURL;?>css/master.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $AbsoluteURL;?>css/magiczoomplus.css" rel="stylesheet" type="text/css" />

<!--<link rel="stylesheet" href="<?php echo $AbsoluteURL;?>css/style.css" type="text/css" media="screen" />-->


<script type="text/javascript" src="<?php echo $AbsoluteURL;?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURL;?>js/accordion.js"></script>
<script type="text/javascript">
jQuery().ready(function(){	
	// applying the settings
	jQuery('#theMenu').Accordion({
		active: 'h3.selected',
		header: 'h3.head',
		alwaysOpen: false,
		animated: true,
		showSpeed: 400,
		hideSpeed: 800
	});
});	
</script>

<script src="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationTextField.js" type="text/javascript"></script> 
<link href="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" /> 

<script src="<?php echo $AbsoluteURL;?>SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="<?php echo $AbsoluteURL;?>SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
</head>

<script src="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationPassword.js" type="text/javascript"></script> 
<link href="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" /> 

<script src="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script> 
<link href="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" /> 

<script src="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationRadio.js" type="text/javascript"></script> 
<link href="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" /> 

<script src="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />

<script src="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<script src="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="<?php echo $AbsoluteURL;?>SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />


</head>
<body>
<div id="wepr">
<div class="main_div">

    	<?php include("include/header.php") ?>
        <?php include($includeDir.$page)?></div></div>
        <?php include("include/footer.php") ?>
    </body>

</html>
