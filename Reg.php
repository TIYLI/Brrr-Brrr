<?php
$username = $_POST["Username"];
$password = $_POST["Password"];

#öppnar databasen USER.sq3
$db = new SQLite3('USERS.sq3'); 

#Skapar tabellen direkt i PHP om den inte finns
$db->exec("CREATE TABLE IF NOT EXISTS USERS(USERID integer primary key autoincrement, USERNAME text unique, PASSWORD text)"); 

#$db->exec("INSERT INTO USER VALUES('".$username."','".$password."')"); #exec kör enskilda kommandon, just INSERT INTO är snällt och går bra. 

$allInputQuery = "SELECT * FROM USERS"; #vilket kommando vill vi köra? 
$userList = $db->query($allInputQuery); #en ny array som innehåller all information

#skapa en cookie som lagrar vilket ID som har loggat in
#skicka till "message board"
#skriv ut användarnamnet till den som har loggat in med hjälp av cookien 

$db->exec("INSERT INTO USERS(USERNAME, PASSWORD) VALUES('".$username."','".$password."')");
    setcookie("user", $username, time()+(86400*30),'/');

    header("Location: Headsite.php"); 
?>