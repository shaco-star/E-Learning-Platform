<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearning";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $userType = $_POST["userType"];

    createUser($conn,$userName, $password, $email, $userType);
}


function createUser($conn,$userName, $password, $email, $userType) {
    // Insert a new row into the Users table
    $sql = "INSERT INTO Users (userName, password, email, userType) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $userName, $password, $email, $userType);
    $stmt->execute();

    
    if ($userType == 'Instructor') {
        $sql = "INSERT INTO Instructors (instructorId) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
    } elseif ($userType == 'Student') {
        $sql = "INSERT INTO Students (studentId) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
    }
}



$conn->close();

?>