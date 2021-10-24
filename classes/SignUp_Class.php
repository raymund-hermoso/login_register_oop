<?php

class Signup_Class extends Database {

    protected function setUSer($firstname, $middlename, $lastname, $email, $username, $password) {
        $sql = 'INSERT INTO users (firstname, middlename, lastname, email, username, password) VALUES (?, ?, ?, ?, ?, ?);';
        $stmt = $this->connection->prepare($sql);

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($firstname, $middlename, $lastname, $email, $username, $hashedPwd))) {
            $stmt = null;
            $_SESSION['msg'] = 'Error Query';
            header('location: ../index.php?e=1');
            exit();
        }

        $stmt - null;
    }

    protected function checkUSer($username, $email) {
        $sql = 'SELECT username FROM users WHERE username = ? OR email = ?;';
        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param("ss", $username, $email);

        if(!$stmt->execute(array($username, $email))) {
            $stmt = null;
            $_SESSION['msg'] = 'Error Query';
            header('location: ../index.php?e=2');
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    // public function User() {
    //     $sql = 'SELECT * FROM users;';
    //     $stmt = $this->connection->query($sql);

    //     if($stmt->num_rows > 0) {
    //         $row = $stmt->fetch_array();

    //         echo $row['firstname'];
    //     }
    //     else {
    //         echo 'bubu';
    //     }
    // }

}