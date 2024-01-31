<?php

require_once(__DIR__ . '/../../database/connection.php');

class EventModel
{
  public function getAllEvents()
  {
    $conn = Database::getConnection();

    try {
      $stmt = $conn->prepare('SELECT events.*, users.username AS creator_username
      FROM events
      INNER JOIN users ON events.creator_id = users.id');
      $stmt->execute();

      $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $events;
    } catch (PDOException $exception) {
      echo "Query error: " . $exception->getMessage();
      return array();
    }
  }
  public function createEvent($creator_id, $activity_type, $description, $start, $end)
  {
      $conn = Database::getConnection();

      try {
          $stmt = $conn->prepare('INSERT INTO events (creator_id, activity_type, description, start, end) VALUES (?, ?, ?, ?, ?)');

          $stmt->bindParam(1, $creator_id);
          $stmt->bindParam(2, $activity_type);
          $stmt->bindParam(3, $description);
          $stmt->bindParam(4, $start);
          $stmt->bindParam(5, $end);

          $stmt->execute();

          return true;
      } catch (PDOException $exception) {
          echo "Query error: " . $exception->getMessage();
          return false;
      }
  }

  public function deleteEvent($event_id)
  {
    $conn = Database::getConnection();

    try {
      $stmt = $conn->prepare('DELETE FROM events WHERE event_id = ?');
      $stmt->bindParam(1, $event_id);
      $stmt->execute();

      return true;
    } catch (PDOException $exception) {
      echo "Query error: " . $exception->getMessage();
      return false;
    }
  }

  public function getEventDetails($event_id)
  {
    $conn = Database::getConnection();

    try {
      $stmt = $conn->prepare('SELECT * FROM events WHERE event_id = ?');
      $stmt->bindParam(1, $event_id);
      $stmt->execute();

      $eventDetails = $stmt->fetch(PDO::FETCH_ASSOC);

      return $eventDetails;
    } catch (PDOException $exception) {
      echo "Query error: " . $exception->getMessage();
      return false;
    }
  }

  public function updateEvent($event_id, $new_activity_type, $new_description, $new_start, $new_end)
  {
    $conn = Database::getConnection();

    try {
      $stmt = $conn->prepare('UPDATE events SET activity_type = ?, description = ?, start = ?, end = ? WHERE event_id = ?');

      $stmt->bindParam(1, $new_activity_type);
      $stmt->bindParam(2, $new_description);
      $stmt->bindParam(3, $new_start);
      $stmt->bindParam(4, $new_end);
      $stmt->bindParam(5, $event_id);

      $stmt->execute();

      return true;
    } catch (PDOException $exception) {
      echo "Query error: " . $exception->getMessage();
      return false;
    }
  }


}
