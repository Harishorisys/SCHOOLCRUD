<?php 
// connnection page
$dsn = "mysql:host=localhost;dbname=yellow" ;
$dbuser = "root";
$dbpassword = "";

try{
    $conn = new PDO($dsn,$dbuser,$dbpassword);
    // echo "connection successful";
}catch(PDOException $e){
    echo $e->getmessage();
}


?>