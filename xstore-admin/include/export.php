<?php

// DB TABLE Exporter
//
// How to use:
//
// Place this file in a safe place, edit the info just below here
// browse to the file, enjoy!

// CHANGE THIS STUFF FOR WHAT YOU NEED TO DO
     $dbhost  = "localhost";
     $dbuser  = "root";
     $dbpass  = "";
     $dbname  = "xstore";
   //$dbtable = $_REQUEST["db"];
function export_excel_csv()
{
    $conn = mysql_connect("localhost","root","");
    $db = mysql_select_db("xstore",$conn);
   
   $sql = "SELECT * FROM ".$_REQUEST["db"];
    $rec = mysql_query($sql) or die (mysql_error());
   
    $num_fields = mysql_num_fields($rec);
   
    for($i = 0; $i < $num_fields; $i++ )
    {
        $header .= mysql_field_name($rec,$i)."\t";
    }
   
    while($row = mysql_fetch_row($rec))
    {
        $line = '';
        foreach($row as $value)
        {                                           
            if((!isset($value)) || ($value == ""))
            {
                $value = "\t";
            }
            else
            {
                $value = str_replace( '"' , '""' , $value );
                $value = '"' . $value . '"' . "\t";
            }
            $line .= $value;
        }
        $data .= trim( $line ) . "\n";
    }
   
    $data = str_replace("\r" , "" , $data);
   
    if ($data == "")
    {
        $data = "\n No Record Found!\n";                       
    }
	
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");
	 
	//this line is important its makes the file name
	header("Content-Disposition: attachment;filename=export.xls ");
	 
	header("Content-Transfer-Encoding: binary ");
	print "$header\n$data";
   /*
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=reports.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print "$header\\n$data";*/
}
export_excel_csv();
?>
