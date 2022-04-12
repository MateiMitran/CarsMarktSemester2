<?php

class User
{
    protected $id;
    protected $type;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $password;
    protected $phone;
    
    public function __construct($id, $type, $firstName, $lastName, $email, $password, $phone)
    {
        $this->id = $id;
        $this->type = $type;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }

    public function GetID()
    {
        return "$this->id";
    }

    public function GetEmail()
    {
        return "$this->email";
    }

    public function GetFirstName() {
        return $this->firstName;
    }

    public function GetLastName() {
        return $this->lastName;
    }

    public function GetFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function GetPassword()
    {
        return "$this->password";
    }

    public function GetPhone()
    {
        return "$this->phone";
    }

    public function SetFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function SetLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function SetEmail($email) {
        $this->email = $email;
    }

    public function SetPassword($password) {
        $this->password = $password;
    }

    public function SetPhone($phone)
    {
        $this->phone = $phone;
    }

    public function UpdateSessionUserObject($firstName, $lastName, $email, $password, $phone) {
        $_SESSION['user']->SetFirstName($firstName);
        $_SESSION['user']->SetLastName($lastName);
        $_SESSION['user']->SetEmail($email);
        $_SESSION['user']->SetPassword($password);
        $_SESSION['user']->SetPhone($phone);
    }
    public function UpdateSessionAdminObject($firstName, $lastName, $email, $password, $phone) {
        $_SESSION['admin']->SetFirstName($firstName);
        $_SESSION['admin']->SetLastName($lastName);
        $_SESSION['admin']->SetEmail($email);
        $_SESSION['admin']->SetPassword($password);
        $_SESSION['admin']->SetPhone($phone);
    }

    
}