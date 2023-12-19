<?php
// echo "<pre>";

// print_r($_POST);
// echo "</pre>";
require_once("../inc/connection.php");

$name=$_POST['name'];
$bio=$_POST['bio'];
$gender=$_POST['gender'];
$password=$_POST['password'];
$email=$_POST['email'];
 $password = password_hash($password , PASSWORD_DEFAULT);
// echo "$name <br> $bio<br> $gender<br>$password<br>$email<br> ";
$insert_user = "INSERT INTO `users`(`name`,`bio`,`gender`,`PASSWORD`,`email`) VALUE(?,?,?,?,?)";
$stmt =$db->prepare($insert_user);
$stmt ->execute([
    $name,
    $bio,
    $gender,
    $password,
    $email
]);
header("location: ../login.php");

?>