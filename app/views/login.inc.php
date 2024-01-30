<?php
require_once (__DIR__ . '/../models/UserModel.php');
require_once '../../database/connection.php';

$pdo = Database::getConnection();

if(isset($_POST['loginsubmit'])){
    $pseudo = $_POST['username'];
    $mdp = $_POST['password'];
    login($pdo, $pseudo, $mdp);
    session_start();
}
else {
    header('location: login.php');
}
