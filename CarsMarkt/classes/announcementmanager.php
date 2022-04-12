<?php
class AnnouncementManager extends Database
{
    private $announcements;
    public function __construct() {
        $this->announcements = array();
    }
    public static function GetAnnouncements()
    {
        $announcements = [];
        $sql = "SELECT * FROM announcements;";
        $query = Database::connect()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        foreach ($result as $row)
        {
            $announcement = new Announcement($row['id'],$row['announcement'],$row['admin_id']);
            array_push($announcements,$announcement);
        }
        return $announcements;
    }
    public static function PostAnnouncement($announcement,$admin_id)
    {
        $sql = "INSERT into announcements (announcement,admin_id) VALUES (?,?);";
        $query = Database::connect()->prepare($sql);
        $result = $query->execute([$announcement,$admin_id]);
        return $result;
    }
    
}

?>