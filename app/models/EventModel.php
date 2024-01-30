<?php

require_once(__DIR__ . '/../../database/connection.php');

class EventModel {
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

    public function createEvent($activity_type, $description, $start, $end) {
      $conn = Database::getConnection();

      try {
          // Préparez votre requête SQL pour insérer un nouvel événement
          $stmt = $conn->prepare('INSERT INTO events (activity_type, description, start, end) VALUES (?, ?, ?, ?)');

          // Liez les valeurs aux paramètres de la requête
          $stmt->bindParam(1, $activity_type);
          $stmt->bindParam(2, $description);
          $stmt->bindParam(3, $start);
          $stmt->bindParam(4, $end);

          // Exécutez la requête
          $stmt->execute();

          // Retournez true si l'insertion a réussi
          return true;
      } catch (PDOException $exception) {
          // En cas d'erreur, affichez le message d'erreur
          echo "Query error: " . $exception->getMessage();
          return false;
      }
  }
}
