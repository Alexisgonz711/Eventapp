<?php

session_start();

require_once (__DIR__ . '/../models/EventModel.php');
require_once (__DIR__ . '/../models/UserModel.php');
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

    <?php


  if ($_SESSION['role_id'] === 1) {

    ?>
    <section class="event">

    <h2>Créer un événement</h2>
    <form action="create_event.php" method="POST">
        <label for="activity_type">Type d'activité</label>
        <input type="text" id="activity_type" name="activity_type" required>
        <br/>

        <label for="description">Description</label>
        <textarea id="description" name="description" required></textarea>
        <br/>

        <label for="start">Début</label>
        <input type="datetime-local" id="start" name="start" required>
        <br/>

        <label for="end">Fin</label>
        <input type="datetime-local" id="end" name="end" required>
        <br/>

        <input type="submit" value="Créer l'événement">
    </form>


    </section>

    <?php
  } elseif ($_SESSION['role_id'] === 2) {
      // L'utilisateur n'est pas un administrateur
      // Vous pouvez rediriger vers une page d'erreur ou effectuer d'autres actions appropriées
  }


?>

</body>
</html>
