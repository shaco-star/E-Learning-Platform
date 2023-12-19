<?php

// require 'database.php';

class LoginController extends Database
{

    public function checkUser($email)
    {
        $conn = $this->connect();
        $sql = 'SELECT userId FROM users WHERE email = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        if (!$stmt->execute()) {
            $stmt = null;
            echo "user not found";
            exit();
        }

        $result = $stmt->get_result();
        $resultCheck = $result->num_rows > 0 ? true : false;
        return $resultCheck;
    }

    public function getUser($email, $password)
    {
        $conn = $this->connect();
        $sql = "SELECT userId, password, userName FROM `users` WHERE email= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        if (!$stmt->execute()) {
            echo "ERROR: " . $stmt->error;
            exit();
        }

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $pwdInDb = $row['password'];
            $userId = $row['userId'];
            $userName = $row['userName'];
            echo $pwdInDb;
            if ($password === $pwdInDb) {
                // setcookie("userId", $userId, time() + (86400 * 30), "/");
                echo "Logged in successfully";
                session_start();
                $_SESSION["userid"] = $userId;
                $_SESSION["username"] = $userName;
                header("Location: index.php");
            } else {
                echo "Invalid password";
            }
        } else {
            $stmt = null;
            header("Location: index.php?error=usernotfound");
            exit();
        }
    }
}
