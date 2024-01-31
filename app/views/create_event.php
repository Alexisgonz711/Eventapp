<?php
session_start();

require_once (__DIR__ . '/../models/EventModel.php');
require_once (__DIR__ . '/../models/UserModel.php');
require_once '../../database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $creator_id = $_POST['creator_id'];
    $activity_type = $_POST['activity_type'];
    $description = $_POST['description'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $eventModel = new EventModel();

    $success = $eventModel->createEvent($creator_id, $activity_type, $description, $start, $end);

    if ($success) {
        header('location: index.php');
    } else {
        echo "Erreur lors de la création de l'événement.";
        header('location: index.php');
    }
} else {
    header('location: index.php');
}
