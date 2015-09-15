<?php
$SQL = "SELECT * FROM admin WHERE AdminID='".$_SESSION['session_adminID']."'"; 
$rsAdmin = $objDB->select($SQL);
if($rsAdmin[0]['AdminRole'] == '1'){
	if($_REQUEST['p']=='admin' || $_REQUEST['p']=='admin_list'){
		header("Location:".$AbsoluteURLAdmin."index.php?p=authorize");
	}
}
if($p != 'login' && isset($_SESSION['session_adminID']) && $_SESSION['session_adminID'] != ''){ ?>
<!--<script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/custom.js"></script>-->
<?php } ?>
<div id="page-header">
			<div id="page-header-wrapper">
				<div id="top">
					<?php  if($p!='login' && isset($_SESSION['session_adminID']) && $_SESSION['session_adminID'] != ''){
					$sqllogin = "SELECT * FROM admin where AdminID = '".$_SESSION['session_adminID']."'";
					$namedata = $objDB->select($sqllogin);
					?>
                    <div class="welcome">
						<span class="note">Welcome, <?php echo ucwords($namedata[0]['FirstName']." ".$namedata[0]['LastName']);?></span>
						<a class="btn ui-state-default ui-corner-all" href="<?php echo $AbsoluteURLAdmin;?>index.php?p=login&a=logout">
							<span class="ui-icon ui-icon-power"></span>
							Logout
						</a>						
					</div>
					<?php  } ?>                    
				</div>
					<?php  if($p!='login'){?>
                    <script type="text/javascript" src="<?php echo $AbsoluteURLAdmin;?>js/superfish.js"></script>                
                        <ul id="navigation">
							<li><a href="<?php echo $AbsoluteURLAdmin;?>index.php?p=home" class="sf-with-ul <?php if($p == 'home'){?> current<?php } ?>">Dashboard</a></li>
                       		<li><a href="<?php echo $AbsoluteURLAdmin;?>index.php?p=admin_list">Administrator</a></li>
                        	<li><a href="<?php echo $AbsoluteURLAdmin;?>index.php?p=category">Category</a></li>
                            <li><a href="<?php echo $AbsoluteURLAdmin;?>index.php?p=subcategory">Sub Category</a></li>
                            <li><a href="<?php echo $AbsoluteURLAdmin;?>index.php?p=product">Product</a></li>
                            <li><a href="<?php echo $AbsoluteURLAdmin;?>index.php?p=report">Report</a></li>
                            <li><a href="<?php echo $AbsoluteURLAdmin;?>index.php?p=inventory">Inventory</a></li>
                       </ul>
                    <?php }  ?>
			</div>
		</div>