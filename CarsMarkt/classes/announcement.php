<?php
class Announcement {
    private $id;
    private $announcement;
    private $admin_id;
    public function __construct($id,$announcement,$admin_id) {
        $this->id = $id;
        $this->announcement = $announcement;
        $this->admin_id = $admin_id;
    }
    public function GetID()
    {
        return $this->id;
    }
    public function GetAnnouncement()
    {
        return $this->announcement;
    }
    public function GetAdminID() 
    {
        return $this->admin_id;
    }
}
?>