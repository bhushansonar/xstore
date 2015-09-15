<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$PackageID = loadVariable("PackageID",0);
$PackageName = loadVariable('PackageName','');
$PFeature = loadVariable('PFeature','');
$SPackage = loadVariable('SPackage','');
$GPackage = loadVariable('GPackage','');
$PPackage = loadVariable('PPackage','');
$SPrice = loadVariable('SPrice','');
$GPrice = loadVariable('GPrice','');
$PPrice = loadVariable('PPrice','');
$FeaturesID = loadVariable('FeaturesID','');

$Includes = loadVariable('Includes','');
$WYRecieve = loadVariable('WYRecieve','');
$SDesc = loadVariable('SDesc','');
$SPTerms = loadVariable('SPTerms','');
$GIncludes = loadVariable('GIncludes','');
$GWYRecieve = loadVariable('GWYRecieve','');
$GDesc = loadVariable('GDesc','');
$GPTerms = loadVariable('GPTerms','');
$PIncludes = loadVariable('PIncludes','');
$PWYRecieve = loadVariable('PWYRecieve','');
$PDesc = loadVariable('PDesc','');
$PPTerms = loadVariable('PPTerms','');

$Silver = loadVariable('Silver','');
$Gold = loadVariable('Gold','');
$Platinum = loadVariable('Platinum','');


$s = loadVariable("s","");
if($p == "package"){	
	if($a == "add"){
		$SQL = "INSERT INTO packages SET PackageName='".inserttext($PackageName)."',SPrice='".$SPrice."',GPrice='".$GPrice."',PPrice='".$PPrice."',Includes='".inserttext($Includes)."',WYRecieve='".inserttext($WYRecieve)."',SDesc='".inserttext($SDesc)."',SPTerms='".inserttext($SPTerms)."',GIncludes='".inserttext($GIncludes)."',GWYRecieve='".inserttext($GWYRecieve)."',GDesc='".inserttext($GDesc)."',GPTerms='".inserttext($GPTerms)."',PIncludes='".inserttext($PIncludes)."',PWYRecieve='".inserttext($PWYRecieve)."',PDesc='".inserttext($PDesc)."',PPTerms='".inserttext($PPTerms)."',Silver='".$Silver."',Gold='".$Gold."',Platinum='".$Platinum."',Status='1'";
		$inserttextproperty = $objDB->insert($SQL);
		for($i=0;$i<count($PFeature);$i++){
			$SQL = "INSERT INTO packfeatures SET PackageID='".$inserttextproperty."',PFeature='".$PFeature[$i]."',SPackage='".$SPackage[$i]."',GPackage='".$GPackage[$i]."',PPackage='".$PPackage[$i]."'";
			$objDB->insert($SQL);
		}
		$_SESSION['success'] = "Package Added";
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;
	}elseif($a == "update"){
		$SQL = "UPDATE packages SET PackageName='".inserttext($PackageName)."',SPrice='".$SPrice."',GPrice='".$GPrice."',PPrice='".$PPrice."',Includes='".inserttext($Includes)."',WYRecieve='".inserttext($WYRecieve)."',SDesc='".inserttext($SDesc)."',SPTerms='".inserttext($SPTerms)."',GIncludes='".inserttext($GIncludes)."',GWYRecieve='".inserttext($GWYRecieve)."',GDesc='".inserttext($GDesc)."',GPTerms='".inserttext($GPTerms)."',PIncludes='".inserttext($PIncludes)."',PWYRecieve='".inserttext($PWYRecieve)."',PDesc='".inserttext($PDesc)."',PPTerms='".inserttext($PPTerms)."',Silver='".$Silver."',Gold='".$Gold."',Platinum='".$Platinum."' where PackageID ='".$PackageID."'";
		$updatetextproperty=$objDB->sql_query($SQL);		
		$SQL="delete from packfeatures where PackageID ='".$PackageID."'";
		$objDB->sql_query($SQL);
		
		for($i=0;$i<count($PFeature);$i++){
			$SQL = "INSERT packfeatures SET PackageID='".$PackageID."',PFeature='".$PFeature[$i]."',SPackage='".$SPackage[$i]."',GPackage='".$GPackage[$i]."',PPackage='".$PPackage[$i]."'";
			$objDB->sql_query($SQL);
		}
		$_SESSION['success'] = "<span>Package Updated.</span>";
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;										  	
}

if($a=="delete"){
	$SQL="delete from packages where PackageID ='".$PackageID."'";
	$rspropertydel = $objDB->sql_query($SQL);
	$SQL="delete from packfeatures where PackageID ='".$PackageID."'";
	$objDB->sql_query($SQL);
	$_SESSION['success'] = "<span>Package Deleted.</span>";
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
						$SQL="delete from packages where PackageID ='".$del_id."' ";
						$rsExtPro = $objDB->sql_query($SQL);
						$SQL="delete from packfeatures where PackageID ='".$del_id."'";
						$objDB->sql_query($SQL);
					}else{
						$erro = "Something Wrong.";
					}
				}					
			}
			$_SESSION['success'] = "<span>Selected Packages Deleted.</span>";
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
		else
		{
			$success = "Selected atleast one Package";
			$_SESSION['error'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
	}
if($a == 'status' && $s != '' && $PackageID  != '0'){
	$SQL="update packages set Status = '".$s."' where PackageID =".$PackageID ;		
	$rsUser = $objDB->sql_query($SQL);
	if($s == '0'){
		$success = "Package Deactivated";			
	}else{
		$success = "Package Activated";			
	}
	$_SESSION['success'] = $success;
	$_SESSION['check'] = 'add';
	header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
}
}
	
?>