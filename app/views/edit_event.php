<?php
session_start();

require_once (__DIR__ . '/../models/EventModel.php');
require_once '../../database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    // Instanciez la classe EventModel
    $eventModel = new EventModel();

    // Obtenez les détails de l'événement à éditer
    $eventDetails = $eventModel->getEventDetails($event_id);

    if ($eventDetails) {
        // Affichez le formulaire d'édition avec les détails actuels
        include('edit_event_form.php');
    } else {
        echo "Événement non trouvé.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitez le formulaire d'édition soumis
    $event_id = $_POST['event_id'];
    $new_activity_type = $_POST['new_activity_type'];
    $new_description = $_POST['new_description'];
    $new_start = $_POST['new_start'];
    $new_end = $_POST['new_end'];

    // Instanciez la classe EventModel
    $eventModel = new EventModel();

    // Appelez la méthode pour mettre à jour l'événement
    $success = $eventModel->updateEvent($event_id, $new_activity_type, $new_description, $new_start, $new_end);

    if ($success) {
        // Redirigez l'utilisateur vers la page index.php après l'édition
        header('Location: index.php');
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'événement.";
        // Gérez l'erreur ou redirigez l'utilisateur vers une page d'erreur
    }
} else {
    echo "Méthode de requête non autorisée.";
}
