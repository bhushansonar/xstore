<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$CaseID = loadVariable("CaseID",0);
$CaseTitle = loadVariable('CaseTitle','');
$CaseDetails = loadVariable('CaseDetails','');
$CaseLink = loadVariable('CaseLink','');
$ImagePath = '../extraimages/caseimages/';
$MainFeatures  = loadVariable('MainFeatures','');
$s = loadVariable("s","");

if($p == "case_studies"){	
	if($a == "add"){
		$SQL = "INSERT INTO case_studies SET CaseTitle='".inserttext($CaseTitle)."',CaseDetails='".inserttext($CaseDetails)."',MainFeatures='".inserttext($MainFeatures)."',CaseLink='".inserttext($CaseLink)."',Status='1'";
		$inserttextproperty = $objDB->insert($SQL);
		if($_FILES["CaseImage"]["name"]!= ''){
			$Image= "image_".$inserttextproperty.strrchr(basename($_FILES["CaseImage"]["name"]),".");
			@copy($_FILES["CaseImage"]["tmp_name"],$ImagePath.$Image);
			$SQL = "UPDATE case_studies SET CaseImage='".$Image."' where CaseID='".$inserttextproperty."'";
			$objDB->sql_query($SQL);
		}
		$_SESSION['success'] = "Case Studies Added";
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;
	}elseif($a == "update"){
		$SQL = "UPDATE case_studies SET CaseTitle='".inserttext($CaseTitle)."',CaseDetails='".inserttext($CaseDetails)."',MainFeatures='".inserttext($MainFeatures)."',CaseLink='".inserttext($CaseLink)."' where CaseID ='".$CaseID."'";
		$updatetextproperty=$objDB->sql_query($SQL);	
		if($_FILES["CaseImage"]["name"]!= ''){
			$Image= "image_".$CaseID.strrchr(basename($_FILES["CaseImage"]["name"]),".");
			@copy($_FILES["CaseImage"]["tmp_name"],$ImagePath.$Image);
			$SQL = "UPDATE case_studies SET CaseImage='".$Image."' where CaseID='".$CaseID."'";
			$objDB->sql_query($SQL);
		}	
		$_SESSION['success'] = "<span>Case Studies Updated.</span>";
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;										  	
}

if($a=="delete"){
	$SQL="delete from case_studies where CaseID ='".$CaseID."'";
	$rspropertydel = $objDB->sql_query($SQL);
	$_SESSION['success'] = "<span>Case Studies Deleted.</span>";
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
						$SQL="delete from case_studies where CaseID ='".$del_id."' ";
						$rsExtPro = $objDB->sql_query($SQL);
					}else{
						$erro = "Something Wrong.";
					}
				}					
			}
			$_SESSION['success'] = "<span>Selected Testimonial's Deleted.</span>";
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
		else
		{
			$success = "Selected atleast one Case Studies";
			$_SESSION['error'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
	}
if($a == 'status' && $s != '' && $CaseID  != '0'){
	$SQL="update case_studies set Status = '".$s."' where CaseID =".$CaseID ;		
	$rsUser = $objDB->sql_query($SQL);
	if($s == '0'){
		$success = "Case Studies Deactivated";			
	}else{
		$success = "Case Studies Activated";			
	}
	$_SESSION['success'] = $success;
	$_SESSION['check'] = 'add';
	header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
}
}
	
?>