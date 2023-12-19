<?php
require_once("../inc/connection.php");


print_r($_POST);

$email = $_POST['email'];
$password = $_POST['bio'];


$check_user =
    "SELECT`name`,`id`,`password`,`email`,`bio`,`age`,`isGrad`,`role` FROM `users` WHERE `email`=? ";
$stmt = $db->prepare($check_user);

$stmt->execute([$email]);
$result = $stmt->fetch();


var_dump($result);

/**
 *  CREATE TABLE `users`(
 * name varchar(50)  NOT NULL
 * 
 * 
 * )
 * 
 * 
 * 
 * 
 * 
 */