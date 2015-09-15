<?php
$p = loadVariable("p","");
$a = loadVariable("a","");
$TestimonialsID = loadVariable("TestimonialsID",0);
$AutherName = loadVariable('AutherName','');
$CompanyName = loadVariable('CompanyName','');
$Testimonials = loadVariable('Testimonials','');
$s = loadVariable("s","");

if($p == "testimonials"){	
	if($a == "add"){
		$SQL = "INSERT INTO testimonials SET AutherName='".inserttext($AutherName)."',CompanyName='".inserttext($CompanyName)."',Testimonials='".inserttext($Testimonials)."',Status='1'";
		$inserttextproperty = $objDB->insert($SQL);
		$_SESSION['success'] = "Testimonials Added";
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;
	}elseif($a == "update"){
		$SQL = "UPDATE testimonials SET AutherName='".inserttext($AutherName)."',CompanyName='".inserttext($CompanyName)."',Testimonials='".inserttext($Testimonials)."' where TestimonialsID ='".$TestimonialsID."'";
		$updatetextproperty=$objDB->sql_query($SQL);		
		$_SESSION['success'] = "<span>Testimonials Updated.</span>";
		header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
		exit;										  	
}

if($a=="delete"){
	$SQL="delete from testimonials where TestimonialsID ='".$TestimonialsID."'";
	$rspropertydel = $objDB->sql_query($SQL);
	$_SESSION['success'] = "<span>Testimonials Deleted.</span>";
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
						$SQL="delete from testimonials where TestimonialsID ='".$del_id."' ";
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
			$success = "Selected atleast one Testimonials";
			$_SESSION['error'] = $success;
			$_SESSION['check'] = 'add';
			header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
			exit;
		}
	}
if($a == 'status' && $s != '' && $TestimonialsID  != '0'){
	$SQL="update testimonials set Status = '".$s."' where TestimonialsID =".$TestimonialsID ;		
	$rsUser = $objDB->sql_query($SQL);
	if($s == '0'){
		$success = "Testimonials Deactivated";			
	}else{
		$success = "Testimonials Activated";			
	}
	$_SESSION['success'] = $success;
	$_SESSION['check'] = 'add';
	header("Location:".$AbsoluteURLAdmin."index.php?p=".$p);
}
}
	
?>