<?php
session_start();

require_once (__DIR__ . '/../models/EventModel.php');
require_once '../../database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    $eventModel = new EventModel();

    $eventDetails = $eventModel->getEventDetails($event_id);

    if ($eventDetails) {
        include('edit_event_form.php');
    } else {
        echo "Événement non trouvé.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') 
    $event_id = $_POST['event_id'];
    $new_activity_type = $_POST['new_activity_type'];
    $new_description = $_POST['new_description'];
    $new_start = $_POST['new_start'];
    $new_end = $_POST['new_end'];

    $eventModel = new EventModel();

    $success = $eventModel->updateEvent($event_id, $new_activity_type, $new_description, $new_start, $new_end);

    if ($success) {
        header('Location: index.php');
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'événement.";
    }
} else {
    echo "Méthode de requête non autorisée.";
}
