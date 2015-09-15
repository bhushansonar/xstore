<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$CollarId = loadVariable("CollarId",0);
$CollarName = loadVariable('CollarName','');
$s = loadVariable("s","");

if($p == "collar")
{	
		if($a == "add")
		{
		$SQL = "INSERT INTO product_collar SET CollarName='".inserttext($CollarName)."'";
		$inserttextproperty = $objDB->insert($SQL);
		$success = "Collar/Neck Added SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;
		}
		
		elseif($a == "update")
		{
		$SQL = "UPDATE product_collar SET CollarName='".inserttext($CollarName)."'		
		where CollarId ='".$CollarId."'";
		$updatetextproperty=$objDB->sql_query($SQL);		
		$success = "Collar/Neck Updated SuccessFully";
			$_SESSION['success'] = $success;
			$_SESSION['check'] = 'add';
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;	
		}
	
	
	if($a=="delete")
	{
	$SQL="delete from product_collar  where CollarId='".$CollarId."'";
	$rspropertydel = $objDB->sql_query($SQL);
	$success = "Collar/Neck Deleted SuccessFully";
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
						$SQL="delete from product_collar where CollarId ='".$del_id."' ";
						$rsExtPro = $objDB->sql_query($SQL);
					}
						else
							{
								$erro = "Something Wrong.";
							}
				}					
			}
				$_SESSION['success'] = "<span>Selected Collar's Deleted.</span>";
				$_SESSION['check'] = 'add';
				header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
				exit;
		}
		else
		{
			$success = "Selected atleast one Collar";
			$_SESSION['error'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
	}
}
?>