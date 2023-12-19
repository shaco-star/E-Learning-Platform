<?php

class Database
{
  protected function connect()
  {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "elearning";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if (!mysqli_ping($conn)) {
      throw new Exception("Connection out");
    }

    return $conn;
  }
}
