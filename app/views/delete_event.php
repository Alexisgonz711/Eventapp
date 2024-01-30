<?php
session_start();

require_once (__DIR__ . '/../models/EventModel.php');
require_once '../../database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez l'ID de l'événement à supprimer depuis le formulaire
    $event_id = $_POST['event_id'];

    // Instanciez la classe EventModel
    $eventModel = new EventModel();

    // Appelez la méthode pour supprimer l'événement
    $success = $eventModel->deleteEvent($event_id);

    // Vérifiez si la suppression a réussi avant de rediriger
    if ($success) {
        // Redirigez l'utilisateur vers la page index.php après la suppression
        header('Location: index.php');
        exit(); // Terminer le script après la redirection
    } else {
        echo "Erreur lors de la suppression de l'événement.";
        // Gérez l'erreur ou redirigez l'utilisateur vers une page d'erreur
    }
}
