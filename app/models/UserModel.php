<?php

require_once(__DIR__ . '/../../database/connection.php');

class UserModel {
    public function getAllUsers() {
        $conn = Database::getConnection();

        try {
            $stmt = $conn->prepare('SELECT * FROM users');
            $stmt->execute();

            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $users;
        } catch (PDOException $exception) {
            // Afficher le message d'erreur en cas de problème avec la requête
            echo "Query error: " . $exception->getMessage();
            return array(); // Retourner un tableau vide en cas d'erreur
        }
    }
}
