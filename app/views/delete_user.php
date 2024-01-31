<?php
session_start();

if (!isset($_SESSION)) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['role_id'] != 1) {
    header('Location: index.php');
    exit;
}

if (!isset($_GET['uid']) || empty($_GET['uid'])) {
    header('Location: index.php');
    exit;
}

$user_id = $_GET['uid'];

require_once '../controllers/UserController.php';

$userController = new UserController;

$success = $userController->deleteUser($user_id);

if ($success) {
    header('Location: users.php');
    exit;
} else {
    echo "Erreur lors de la suppression de l'utilisateur.";
}
?>
