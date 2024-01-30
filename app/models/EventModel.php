<?php

require_once(__DIR__ . '/../../database/connection.php');

class UserModel {
    public function getAllEvents() {
        $conn = Database::getConnection();

        try {
            $stmt = $conn->prepare('SELECT * FROM events');
            $stmt->execute();

            $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $events;
        } catch (PDOException $exception) {
            echo "Query error: " . $exception->getMessage();
            return array(); 
        }
    }
}
