<?php
include "../classes/Database.php";
$id = 0;
$id = $_POST['delete_id'];
if ($id>0)
{
    $sql = "DELETE FROM users WHERE id=:id;";
    $query = Database::connect()->prepare($sql);
    $result = $query->execute([':id'=>$id]);
}
?>