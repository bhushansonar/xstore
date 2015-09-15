<?php
	ob_start();
	session_start();
	require_once("../utils/config.php");
	require_once("../utils/functions.php");
	require_once("../utils/dbClass.php");
	$objDB = new MySQLCN;
	
	if($_SESSION['session_adminID'] != '1'){
		$p = loadVariable("p","login");
	}else{
		$p = loadVariable("p","home");
	}
	$p = loadVariable("p","login");
	$a = loadVariable("a","");
	$bLoggedIn=false;
	$bAdmin=true;
	$msg="";
	$error="";
	
	include "include/process.php";
	include "include/adminSecurity.php";
	$heading="X-Store - Admin Panal";
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="shortcut icon" href="<?php echo $AbsoluteURL?>images/x1.jpg" type="image/jpeg">
<title>


<?php echo ($heading!=""?" - ".$heading:"");?></title>
<!-- New Admin js-->
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/tablesorter.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/tablesorter-pager.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/ui/ui.widget.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/ui/ui.mouse.js"></script>
<?php /*?><script type="text/javascript" src="<?php echo $AbsoluteURLAdmin?>js/live_search.js"></script><?php */?>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/tooltip.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/cookie.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/ui/ui.sortable.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/ui/ui.draggable.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/ui/ui.resizable.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/ui/ui.position.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/ui/ui.button.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/ui/ui.dialog.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/validator.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/ajax.js"></script>

<!-- end new Admin js-->
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/calendar.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/calendar-en.js"></script>
<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/calendar-setup.js"></script>
<link rel="shortcut icon" href="<?php echo $AbsoluteURL?>images/favicon.ico" type="image/x-icon">
<link href="<?php echo $AbsoluteURLAdmin;?>css/ui/ui.base.css" rel="stylesheet" media="all" />
<link href="<?php echo $AbsoluteURLAdmin;?>css/ui/ui.core.css" rel="stylesheet" media="all" />
<link href="<?php echo $AbsoluteURLAdmin;?>css/themes/blueberry/ui.css" rel="stylesheet" title="style" media="all" />
<!--<link rel="stylesheet" href="<?php echo $AbsoluteURLAdmin;?>css/calendar-win2k-cold-1.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $AbsoluteURLAdmin;?>css/calendar-win2k-cold-1.css" title="win2k-cold-1" />-->
<!--

</head>
<body>-->
	<div id="page_wrapper">
     <?php if($p!='export'){include('include/top-header.php');}?>
     <?php  if($p=='login' && !isset($_SESSION['session_adminID'])){?>
     	<?php include('include/'.$p.'.php');?>
     <?php }else{ ?>
	     <?php include('include/'.$p.'.php');?>
     <?php } ?>
	</div>     
<!--</body>
</html>-->
<?php $objDB->close(); ?>
 