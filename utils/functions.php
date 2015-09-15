<?php	
function loadVariable($var,$default) {
	if (isset($_POST[$var])) {
		return $_POST[$var];
	} elseif (isset($_GET[$var])) {
		return $_GET[$var];
	} else {
		return $default;
	}
}
global $TempArr;

function inserttext($Textvalue){
	$Textvalue=addslashes($Textvalue);
	$Textvalue=str_replace('“','"',$Textvalue);
	$Textvalue=str_replace('”','"',$Textvalue);
	$trans = get_html_translation_table(HTML_ENTITIES); 
	$Textvalue = strtr($Textvalue, $trans); 
	$Textvalue=trim($Textvalue);
	return $Textvalue;
}

function viewtext($Textvalue){
	$Textvalue=stripslashes($Textvalue);
	$trans = get_html_translation_table(HTML_ENTITIES); 
	$trans = array_flip($trans); 
	$Textvalue = strtr($Textvalue, $trans); 
	$Textvalue=trim($Textvalue);
	return $Textvalue;
}
function decodeurlstring($UrlString){
	$UrlString = urldecode($UrlString);
	$UrlString = str_replace('-',' ',$UrlString);
	return $UrlString;
}

function encodestring($String){
	$enc1=base64_encode($String);
	//echo "<br>enc1=".$enc1;
	$enc2=base64_encode($enc1);
	//echo "<br>enc2=".$enc2;
	$enc3=base64_encode($enc2);
	//echo "<br>enc3=".$enc3;
	return $enc3;
}
function str_rand($length = 8, $seeds = 'alphanum')
{
    // Possible seeds
    $seedings['alpha'] = 'abcdefghijklmnopqrstuvwqyz';
    $seedings['numeric'] = '0123456789';
    $seedings['alphanum'] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $seedings['hexidec'] = '0123456789abcdef';
    
    // Choose seed
    if (isset($seedings[$seeds]))
    {
        $seeds = $seedings[$seeds];
    }
    
    // Seed generator
    list($usec, $sec) = explode(' ', microtime());
    $seed = (float) $sec + ((float) $usec * 100000);
    mt_srand($seed);
    
    // Generate
    $str = '';
    $seeds_count = strlen($seeds);
    
    for ($i = 0; $length > $i; $i++)
    {
        $str .= $seeds{mt_rand(0, $seeds_count - 1)};
    }
    
    return $str;
}
// Resample Image 
function resampimagejpg($forcedwidth, $forcedheight, $sourcefile, $destfile, $imgcomp)
{
	$g_imgcomp=100-$imgcomp;
	$g_srcfile=$sourcefile;
	$g_dstfile=$destfile;
	$g_fw=$forcedwidth;
	$g_fh=$forcedheight;
	if(file_exists($g_srcfile))
	{
		$g_is=getimagesize($g_srcfile);
		if(($g_is[0]-$g_fw)>=($g_is[1]-$g_fh))
		{
		$g_iw=$g_fw;
		$g_ih=($g_fw/$g_is[0])*$g_is[1];
		}
		else
		{
		$g_ih=$g_fh;
		$g_iw=($g_ih/$g_is[1])*$g_is[0]; 
		}
		$src=explode(".",$g_srcfile);
		$var=count($src);
		if($src[$var-1]=='gif' || $src[$var-1]=='GIF')
		{
			$img_src=ImageCreateFromGIF($g_srcfile);
			//$img_src= ImageColorAllocate($img_src, 250, 250, 250);
			$img_dst=imagecreate($g_iw,$g_ih);
			$img_dst1 = ImageColorAllocate($img_dst, 255, 255, 255);
		}
		if($src[$var-1]=='png')
		{
			$img_src=ImageCreateFromPNG($g_srcfile);
			$img_dst=imagecreate($g_iw,$g_ih);
			$img_dst1 = ImageColorAllocate($img_dst,255, 255, 255);
		}
		if($src[$var-1]=='jpg' || $src[$var-1]=='JPG')
		{
			$img_src=imagecreatefromjpeg($g_srcfile);
			$img_dst=imagecreate($g_iw,$g_ih);
			$img_dst = &imageCreateTrueColor( $g_iw, $g_ih);
		}
	
		imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, $g_iw, $g_ih, $g_is[0], $g_is[1]);
		if($src[$var-1]=='jpg' || $src[$var-1]=='JPG')
		{
			imagejpeg($img_dst, $g_dstfile, $g_imgcomp);
		}
		if($src[$var-1]=='png')
		{
			imagepng($img_dst, $g_dstfile, $g_imgcomp);
		}
		if($src[$var-1]='gif' || $src[$var-1]=='GIF')
		{
			imagegif($img_dst, $g_dstfile, $g_imgcomp);
		}
	imagedestroy($img_dst);
	return true;
	}
	else
	return false;
}
?>