<?php

class Listing
{
    private $id;
    private $userid;
    private $carid;
    private $date_listed;

    public function __construct($id,$userid,$carid,$date_listed)
    {
        $this->id = $id;
        $this->userid = $userid;
        $this->carid = $carid;
        $this->date_listed = $date_listed;
    }

    public function GetId()
    {
        return "$this->id";
    }

    public function GetUserId()
    {
        return "$this->userid";
    }

    public function GetCarId()
    {
        return "$this->carid";
    }
    
    public function GetDateListed()
    {
        return "$this->date_listed";
    }
}