<?php
session_start();

require_once (__DIR__ . '/../models/EventModel.php');
require_once '../../database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['event_id'];

    $eventModel = new EventModel();

    $success = $eventModel->deleteEvent($event_id);

    $_SESSION['success_message'] = "L'événement a été supprimé avec succès.";
    if ($success) {
        header('Location: index.php');
    } else {
        echo "Erreur lors de la suppression de l'événement.";
    }
}
