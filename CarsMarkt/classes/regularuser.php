<?php

class RegularUser extends User {
    function __construct($id, $type, $firstName, $lastName, $email, $password, $phone) {
        parent::__construct($id,$type, $firstName, $lastName, $email, $password, $phone);
    }

   
}