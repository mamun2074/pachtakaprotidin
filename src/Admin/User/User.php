<?php

/**
 * Created by PhpStorm.
 * User: mahmud120520@gmail.com
 * skye:mamun2074
 * Date: 3/13/2018
 * Time: 4:20 PM
 */
class User
{
    private $id = '';
    private $firstName = '';
    private $lastName = '';
    private $userName = '';
    private $email = '';
    private $password = '';
    private $confirmPassword = '';

    public function storeAllInformations($values)
    {

        if (!empty($values['firstName'])) {
            $this->firstName = $this->validation($values['firstName']);
            session_start();
            $_SESSION['firstNameValue'] = $this->firstName;
        } else {
            session_start();
            $_SESSION['firstName'] = "First name is require";
            header('Location: ../../views/user/create.php');
//            die();
        }

        if (!empty($values['lastName'])) {
            $this->lastName = $this->validation($values['lastName']);

            $_SESSION['lastNameValue'] = $this->lastName;
        } else {

            session_start();
            $_SESSION['lastName'] = "Last name is require";
            header('Location: ../../views/user/create.php');
//            die();
        }


        if (!empty($values['userName'])) {

            $username_lowercase = $this->validation($values['userName']);
            $username_lowercase = str_replace(" ", "", $username_lowercase);
            $username_lowercase = preg_replace('/\s+/', '', $username_lowercase);
            $userName = strtolower($username_lowercase);

            $userNameCheck = $this->findRegisterUser($userName);
            $_SESSION['userNameValoue'] = $userName;
            if (empty($userNameCheck)) {
                $this->userName = $userName;

            } else {
                session_start();
                $_SESSION['userError'] = "User Name already have.Try another one";
                header('Location: ../../views/user/create.php');
//                die();
            }

        } else {
            session_start();
            $_SESSION['userName'] = "User name is require";
            header('Location: ../../views/user/create.php');
//            die();

        }

        if (!empty($values['email'])) {
            $email = $this->validation($values['email']);
            $checkEmail = $this->findRegisterEmail($email);
            $_SESSION['emailValoue'] = $email;
            if (empty($checkEmail)) {
                $this->email = $email;

            } else {
                session_start();
                $_SESSION['emailError'] = "Already email exit. Try another one or login";
                header('Location: ../../views/user/create.php');
//                die();
            }

        } else {
            session_start();
            $_SESSION['email'] = "Email is required";
            header('Location: ../../views/user/create.php');
//            die();

        }

        if (!empty($values['password'])) {
            $pass = $values['password'];
            $_SESSION['passwordValue'] = $pass;
            $passwordLength = strlen($pass);
            if ($passwordLength >= 4) {

            } else {
                session_start();
                $_SESSION['passwordLength'] = "Password should at least four charectores";
                header('Location: ../../views/user/create.php');
//                die();
            }

        } else {

            session_start();
            $_SESSION['password'] = "Password is required";
            header('Location: ../../views/user/create.php');
//            die();

        }

        if (!empty($values['confirmPassword'])) {
            $confirmPassword = $values['confirmPassword'];
            $_SESSION['confirmPasswordValue'] = $confirmPassword;
            if ($pass === $confirmPassword) {
                $this->password = $pass;

            } else {
                session_start();
                $_SESSION['matchPasswordError'] = "Password does not match";
                header('Location: ../../views/user/create.php');
//                die();
            }

        } else {
            session_start();
            $_SESSION['confirmPasswordError'] = "Confirm Password is required ";
            header('Location: ../../views/user/create.php');
//            die();
        }


    }

//    Validation value
    private function validation($value)
    {
        $value = htmlspecialchars($value);
        $value = stripcslashes($value);
        $value = trim($value);
        return $value;
    }

    private function findRegisterUser($userName)
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=pachtakaprotidin', 'root', '');
            $query = "SELECT `userName` FROM `users` WHERE `userName` = :userName";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(
                ':userName' => $userName,
            ));

            $result = $stmt->fetch();
            return $result;

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    private function findRegisterEmail($userEmail)
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=pachtakaprotidin', 'root', '');
            $query = "SELECT `email` FROM `users` WHERE `email` = :emailName";
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(
                ':emailName' => $userEmail,
            ));

            $result = $stmt->fetch();
            return $result;

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

//    insert user signup information

    public function storeSignupValuesInDatabase()
    {

        if (!empty($this->firstName) and !empty($this->lastName) and !empty($this->userName) and !empty($this->email) and !empty($this->password)) {
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=pachtakaprotidin', 'root', '');
                $query = "INSERT INTO `users`(`firstName`, `lastName`, `userName`, `email`, `user_pass`) VALUES (:firstName ,:lastName,:userName,:email,:password)";
                $stmt = $pdo->prepare($query);
                $stmt->execute(array(
                    ':firstName' => $this->firstName,
                    ':lastName' => $this->lastName,
                    ':userName' => $this->userName,
                    ':email' => $this->email,
                    ':password' => $this->password,
                ));

                $userCurrentId = $pdo->lastInsertId();
                if ($stmt->rowCount()) {
                    session_start();
                    $_SESSION['curentUserId'] = $userCurrentId;
                    $_SESSION['successfullyCreateMassage'] = "Successfully Create your account";
                    header('Location: ../../views/profile/index.php');
                } else {
                    session_start();
                    $_SESSION['storeErrorMessage']="Something went wrong.";
                    header('Location: ../../views/user/create.php');
                }

            } catch (PDOException $e) {
                echo "Error:" . $e->getMessage();

            }


        }
    }

//    public function userLogin($loginInformations){
//
//
//    }


}



