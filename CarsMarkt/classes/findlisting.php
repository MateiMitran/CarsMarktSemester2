<?php
class FindListing extends Database {
    public function findListingByCarId($carId) {
        $sql = "SELECT * FROM listings WHERE car_id = ?";

        $query = Database::connect()->prepare($sql);
        $query->execute([$carId]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}