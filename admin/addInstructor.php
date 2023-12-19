<?php
    $dbhost= "localhost";
	$dbuser= "root";
	$dbpass= "";
	$db= "elearning";
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);	

    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $userName=$_POST['userName'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $sql = "insert into instructors (id,firstName,lastName,userName,email,password) VALUES ('$id', '$firstName' , '$lastName' , '$userName' , '$email', '$password')";
        $result = mysqli_query($conn,$sql);
        
        if($result){
            header('Location: Instructors.php');
            header("Refresh:0");
        }
        
	}
?>