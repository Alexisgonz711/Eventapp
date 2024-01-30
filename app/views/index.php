<?php

session_start();

require_once(__DIR__ . '/../models/EventModel.php');
require_once(__DIR__ . '/../models/UserModel.php');
require_once '../../database/connection.php';

?>

<DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon espace évenement</title>
  </head>

  <body>


    <?php if ($_SESSION['role_id'] === 1) { ?>


      <section class="event">

        <h2>Créer un événement</h2>
        <form action="create_event.php" method="POST">
          <label for="activity_type">Type d'activité</label>
          <input type="text" id="activity_type" name="activity_type" required>
          <br />

          <label for="description">Description</label>
          <textarea id="description" name="description" required></textarea>
          <br />

          <label for="start">Début</label>
          <input type="datetime-local" id="start" name="start" required>
          <br />

          <label for="end">Fin</label>
          <input type="datetime-local" id="end" name="end" required>
          <br />

          <input type="submit" value="Créer l'événement">
        </form>


      </section>

      <section class="event-list">
        <h2>Liste des événements</h2>
        <?php
        $eventModel = new EventModel();
        $events = $eventModel->getAllEvents();

        if (!empty($events)) {
          foreach ($events as $event) {
            echo '<div class="event-card">';
            echo '<div class="card-top">';
            echo '<p>Début: ' . $event['start'] . '</p>';
            echo '<p>Fin: ' . $event['end'] . '</p>';
            echo '</div>';
            echo '<p>Type d\'activité: ' . $event['activity_type'] . '</p>';
            echo '<p>Description: ' . $event['description'] . '</p>';

            echo '<div class="card-buttons">';
            echo '<button class="modify-button">Modifier</button>';
            echo '<form action="delete_event.php" method="POST" style="display: inline;">';
            echo '<input type="hidden" name="event_id" value="' . $event['event_id'] . '">';
            echo '<button type="submit" class="delete-button" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cet événement ?\')">Supprimer</button>';
            echo '</form>';
            echo '</div>';

            echo '</div>';
          }
        } else {
          echo 'Aucun événement trouvé.';
        }
        ?>
      </section>

      <?php
    } elseif ($_SESSION['role_id'] === 2) {

      ?>
      <section class="event-list">
        <h2>Liste des événements</h2>
        <?php
        $eventModel = new EventModel();
        $events = $eventModel->getAllEvents();

        if (!empty($events)) {
          foreach ($events as $event) {
            echo '<div class="event-card">';
            echo '<div class="card-top">';
            echo '<p>Début: ' . $event['start'] . '</p>';
            echo '<p>Fin: ' . $event['end'] . '</p>';
            echo '</div>';
            echo '<p>Type d\'activité: ' . $event['activity_type'] . '</p>';
            echo '<p>Description: ' . $event['description'] . '</p>';

            echo '<div class="card-buttons">';
            echo '<button class="participate-button">Participer</button>';
            echo '</div>';

            echo '</div>';
          }
        } else {
          echo 'Aucun événement trouvé.';
        }
        ?>
      </section>

      <?php
    }


    ?>


  </body>

  </html>
