<?php
echo "Hi From Session-7";

$db_server ="localhost";
$db_username ="root";
$db_pass ="";
$db_name = "database_coures";
$db_port=3306;
$dsn ="mysql:dbname=$db_name;host=$db_server;port=$db_port";

$db = new PDO($dsn, $db_username, $db_pass);

if($db){
    echo "<h1>connection is established</h1>";
}