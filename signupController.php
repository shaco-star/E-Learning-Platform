<?php
// require 'database.php';
class SignupController extends Database
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
        // if ($stmt->rowCount() > 0) {
        //     $resultCheck = false;
        // } else {
        //     $resultCheck = true;
        // }
        return $resultCheck;
    }

    public function setUser($userName, $email, $password, $userType)
    {
        $conn = $this->connect();
        $sql = "INSERT INTO Users (userName, password, email, userType) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $userName, $password, $email, $userType);
        if ($stmt->execute()) {
            $userId = $conn->insert_id;
            // setcookie("userId", $userId, time() + (86400 * 30), "/");
            session_start();
                $_SESSION["userid"] = $userId;
                $_SESSION["username"] = $userName;
            echo "set";
        } else {
            echo "ERROR: " . $stmt->error;
        }
    }
}
