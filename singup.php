<?php
// require 'signupController.php';

class Signup extends SignupController
{
    private $userName;
    private $email;
    private $password;
    private $passwordConfirm;
    private $type;

    public function __construct($userName, $email, $password, $passwordConfirm, $type)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->passwordConfirm = $passwordConfirm;
        $this->type = $type;
    }


    private function checkInput()
    {
        $flag = true;
        if (
            empty($this->userName) ||
            empty($this->email) ||
            empty($this->password) ||
            empty($this->passwordConfirm) ||
            empty($this->type)
        ) {
            $flag = false;
        }

        return $flag;
    }

    private function pwdMatch()
    {
        $result = true;
        if ($this->password !== $this->passwordConfirm) {
            $result = false;
        }

        return $result;
    }

    private function checkEmail()
    {
        $result = false;
        if (!$this->checkUser($this->email)) {
            $result = true;
        }

        return $result;
    }

    public function signupUser()
    {
        if ($this->checkInput() == false) {
            header("location: index.php?error=emptyinput");
            exit();
        }
        if ($this->pwdMatch() == false) {
            header("location: index.php?error=pwdnotmatch");
            exit();
        }
        if ($this->checkEmail() == false) {
            header("location: index.php?error=emailmatch");
            exit();
        }

        $this->setUser($this->userName, $this->email, $this->password, $this->type);
    }
}

