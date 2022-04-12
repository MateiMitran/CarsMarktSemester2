<?php
if (isset($_POST['submit'])) {
    $announcement = false;
    if(isset($_POST['announcement']) && !empty(trim($_POST['announcement']))) {
        $announcement = $_POST['announcement'] . ' | posted on ' . date("Y-m-d h:i:sa");
    } else {
        errorMessage('Please enter an announcement!');
    }
    if ($announcement!=null) {
        $result = AnnouncementManager::PostAnnouncement($announcement,$_SESSION['admin']->GetID());
        if (!empty($result)) {
            successMessage("Announcement posted!");
        }
        else {
            errorMessage("An error occured!");
        }
        
    }
}

?>