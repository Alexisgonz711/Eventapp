<?php

// Inclure le modèle
require_once('../models/UserModel.php');

class UserController {
    public function getUsers() {
        // Instanciation du modèle
        $userModel = new UserModel();

        // Appel de la fonction pour récupérer tous les utilisateurs
        $users = $userModel->getAllUsers();

        return $users;

        // Charger la vue avec les données
        require_once('../views/index.php');
    }
}

