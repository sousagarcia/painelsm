.<?php
/*******EDIT LINES 3-8*******/
$DB_Server = "localhost"; //MySQL Server    
$DB_Username = "root"; //MySQL Username     
$DB_Password = "";             //MySQL Password     
$DB_DBName = "atendimento";         //MySQL Database Name  
$DB_TBLName = "gerenciamento_painel"; //MySQL Table Name   
$filename = "RelatorioRecepcao";         //File Name
$usuario = $_POST['usuario'];
$date1 = $_POST['data1'];
$date2 = $_POST['data2'];

$format2= "Y-m-d";

$data1 = date($format2, strtotime(str_replace('/', '-', $date1)));
$data2 = date($format2, strtotime(str_replace('/', '-', $date2)));
if ($data1 == '1970-01-01') {
    $data1 = null;
}
if ($data2 == '1970-01-01') {
    $data2 = null;
}
/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/
//create MySQL connection
if(!empty($usuario) AND empty($data1) AND empty($data2)){
  $sql = "Select * from $DB_TBLName WHERE usuario = $usuario ";  
} 
else if(empty($usuario) AND !empty($data1) AND !empty($data2)){
  $sql = "Select * from $DB_TBLName WHERE data BETWEEN '$data1' AND '$data2' ";  
}
else if (!empty($data1) AND empty($data2) AND !empty($usuario)) {
    $sql = "Select * from $DB_TBLName WHERE usuario = $usuario AND data >= '$data1' ";  
}
else if (empty($data1) AND !empty($data2) AND !empty($usuario)) {
   $sql = "Select * from $DB_TBLName WHERE usuario = $usuario AND data <= '$data2' "; 
}
else if (!empty($data1) AND empty($data2) AND empty($usuario)) {
    $sql = "Select * from $DB_TBLName WHERE data >= '$data1' ";  
}
else if (empty($data1) AND !empty($data2) AND empty($usuario)) {
   $sql = "Select * from $DB_TBLName WHERE data <= '$data2' "; 
}
else if(!empty($usuario) AND !empty($data1) AND !empty($data2)){
  $sql = "Select * from $DB_TBLName WHERE usuario = $usuario AND data BETWEEN '$data1' AND '$data2' ";  
}
else{
    echo "<script>";
    echo "alert('Insira algum parâmetro ou selecione Exportar relatório completo');history.go(-1);";
    echo "</script>";

}

$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
//select database   
$Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());   
//execute query 
$result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());    
$file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < mysql_num_fields($result); $i++) {
echo mysql_field_name($result,$i) . "\t";
}
print("\n");    
//end of printing column names  
//start while loop to get data
    while($row = mysql_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysql_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }   

?>
