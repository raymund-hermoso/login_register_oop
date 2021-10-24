<?php

class Signup_Control extends Signup_Class {

    private $firstname;
    private $middlename;
    private $lastname;
    private $email;
    private $username;
    private $password;
    private $passwordRpt;

    public function __construct($firstname, $middlename, $lastname, $email, $username, $password, $passwordRpt) {

        $this->firstname = $firstname;
        $this->middlename = $middlename;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->passwordRpt = $passwordRpt;
        
    }

    public function signupUser() {

        if($this->emptyInput() == false) {
            $_SESSION['msg'] = 'Empty Input';
            header('location: ../signup.php?firstname='.$this->firstname.'&middlename='.$this->middlename.'&lastname='.$this->lastname.'&email='.$this->email.'&username='.$this->username);
            exit();
        }
        if($this->invalidUsername() == false) {
            $_SESSION['msg'] = 'Invalid Username';
            header('location: ../signup.php?firstname='.$this->firstname.'&middlename='.$this->middlename.'&lastname='.$this->lastname.'&email='.$this->email.'&username='.$this->username);
            exit();
        }
        if($this->invalidEmail() == false) {
            $_SESSION['msg'] = 'Invalid Email';
            header('location: ../signup.php?firstname='.$this->firstname.'&middlename='.$this->middlename.'&lastname='.$this->lastname.'&email='.$this->email.'&username='.$this->username);
            exit();
        }
        if($this->pwdMatch() == false) {
            $_SESSION['msg'] = 'Password not matched';
            header('location: ../signup.php?firstname='.$this->firstname.'&middlename='.$this->middlename.'&lastname='.$this->lastname.'&email='.$this->email.'&username='.$this->username);
            exit();
        }
        if($this->usernameTakenCheck() == false) {
            $_SESSION['msg'] = 'Username Already Taken';
            header('location: ../signup.php?firstname='.$this->firstname.'&middlename='.$this->middlename.'&lastname='.$this->lastname.'&email='.$this->email.'&username='.$this->username);
            exit();
        }

        $this->setUser($this->firstname, $this->middlename, $this->lastname, $this->email, $this->username, $this->password);
    }

    private function emptyInput() {
        $result;
        if(empty($this->firstname) || empty($this->middlename) || empty($this->lastname) || empty($this->email) || empty($this->username) || empty($this->password) || empty($this->passwordRpt)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidUsername(){
		$result;
		if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}

	private function invalidEmail(){
		$result;
		if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}
	
	private function pwdMatch(){
		$result;
		if($this->password !== $this->passwordRpt){
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}

    private function usernameTakenCheck(){
		$result;
		if(!$this->checkUser($this->username, $this->email)){
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}

}