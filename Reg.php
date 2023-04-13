<?php
$tempUpp = $_POST["Username"]; 
$tempLos = $_POST["password"];
echo $tempUpp;
$db = new SQLite3('Regist.sq3');  
$db->exec("CREATE TABLE IF NOT EXISTS SignIn (Username text, Password text);");  
$db->exec("INSERT INTO SignIn VALUES('".$tempUpp."',".$tempLos.");");  
header("Location: Startsida.php");
?>