<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$DesignId = loadVariable("DesignId",0);
$DesignName = loadVariable('DesignName','');
$s = loadVariable("s","");

if($p == "design")
{	
		if($a == "add")
		{
		$SQL = "INSERT INTO product_design SET DesignName='".inserttext($DesignName)."'";
		$inserttextproperty = $objDB->insert($SQL);
		$success = "Design Added SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;
		}
		
		elseif($a == "update")
		{
		$SQL = "UPDATE product_design SET DesignName='".inserttext($DesignName)."'		
		where DesignId ='".$DesignId."'";
		$updatetextproperty=$objDB->sql_query($SQL);		
		$success = "Design Updated SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;	
		}
	
	
	if($a=="delete")
	{
	$SQL="delete from product_design  where DesignId='".$DesignId."'";
	$rspropertydel = $objDB->sql_query($SQL);
	$success = "Design Deleted SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
	header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
	exit;	
	}
	
if ($a == "muldelete") //code for deleting multiple data form the table
		{
	  		$multipledel = loadvariable('multipledel','');
			$todo = loadvariable('todo','');
		if($multipledel != '')
		{
			if(count($multipledel)>0)
			{	
				for($i=0;$i<count($multipledel);$i++)
				{
					$del_id = $multipledel[$i];
					//echo $del_id.'<br/>';
					if($todo == "delete"){
						$SQL="delete from product_design where DesignId ='".$del_id."' ";
						$rsExtPro = $objDB->sql_query($SQL);
					}
						else
							{
								$erro = "Something Wrong.";
							}
				}					
			}
				$_SESSION['success'] = "<span>Selected Design's Deleted.</span>";
				$_SESSION['check'] = 'add';
				header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
				exit;
		}
		else
		{
			$success = "Selected atleast one Design";
			$_SESSION['error'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
	}
}
?>