<?php
// require 'signupController.php';

class Login extends LoginController
{
    private $email;
    private $password;


    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }


    private function checkInput()
    {
        $flag = true;
        if (
            empty($this->email) || empty($this->password)

        ) {
            $flag = false;
        }

        return $flag;
    }

    private function checkEmail()
    {
        $result = false;
        if (!$this->checkUser($this->email)) {
            $result = true;
        }

        return $result;
    }


    public function loginUser()
    {
        if ($this->checkInput() == false) {
            header("location: index.php?error=emptyinput");
            exit();
        }
        if (!$this->checkEmail() == false) {
            header("location: index.php?error=emailnotfound");
            exit();
        }

        $this->getUser($this->email, $this->password);
    }
}
