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

        if (isset($values['firstName'])) {
            $this->firstName = $this->validation($values['firstName']);
        } else {

        }
        if (isset($values['lastName'])) {
            $this->lastName = $this->validation($values['lastName']);
        } else {

        }

        if (isset($values['userName'])) {
            $username_lowercase  = $this->validation($values['userName']);
            $username_lowercase=str_replace(" ","",$username_lowercase);
            $username_lowercase=preg_replace('/\s+/','',$username_lowercase);
            $this->userName=strtolower($username_lowercase);

        } else {

        }
        if (isset($values['email'])) {
            $this->email = $this->validation($values['email']);
        } else {

        }
        if (isset($values['password'])) {
            $this->password = $values['password'];
        } else {

        }

    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->email;
    }

//    Validation value
    private function validation($value)
    {
        $value = htmlspecialchars($value);
        $value = stripcslashes($value);
        $value = trim($value);

        return $value;

    }


}