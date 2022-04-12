<?php
class Admin extends User {
    public function __construct($id, $type, $firstName, $lastName, $email, $password, $phone) {
        parent::__construct($id, $type ,$firstName, $lastName, $email, $password, $phone);
    }
}
?>