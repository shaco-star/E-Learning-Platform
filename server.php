<?php

include './database.php';
include './signupController.php';
include('./singup.php');
include('./loginController.php');
include('./login.php');
include('./categoryController.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["passwordcon"];
    $email = $_POST["email"];
    $userType = $_POST["userType"];

    $signup = new Signup($userName, $email, $password,  $passwordConfirm, $userType);
    $signup->signupUser();

    header("Location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $uri = $_SERVER['REQUEST_URI'];
    if (strpos($uri, '/getAllCategories') !== false) {
        // Call the function
        $category = new CategoryController();
        echo $category->getAllCategories();
    } else {
        $email = $_GET["email"];
        $password = $_GET["password"];


        $login = new Login($email, $password);
        $login->loginUser();
    }

    // header("Location: index.php");
}
