<?php
class SearchListing extends Database {
    public function searchById($listingId) {
        $sql = "SELECT * FROM listings WHERE id = ?";

        $query = Database::connect()->prepare($sql);
        $query->execute([$listingId]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}