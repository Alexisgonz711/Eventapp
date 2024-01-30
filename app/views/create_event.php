<?php
session_start();

require_once (__DIR__ . '/../models/EventModel.php');
require_once (__DIR__ . '/../models/UserModel.php');
require_once '../../database/connection.php';

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $activity_type = $_POST['activity_type'];
    $description = $_POST['description'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $eventModel = new EventModel();

    $success = $eventModel->createEvent($activity_type, $description, $start, $end);

    // Vérifiez si l'insertion a réussi
    if ($success) {
        echo "Événement créé avec succès!";
        echo '<a href="index.php"><button>Retour à la page d\'accueil</button></a>';
    } else {
        echo "Erreur lors de la création de l'événement.";
        echo '<a href="index.php"><button>Retour à la page d\'accueil</button></a>';
    }
} else {
    // Redirigez l'utilisateur vers la page du formulaire s'il n'a pas soumis le formulaire
    header('location: index.php');
}
