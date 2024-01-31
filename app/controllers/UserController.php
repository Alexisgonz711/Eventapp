<?php

require_once('../models/UserModel.php');

class UserController {
    public function getUsers() {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        return $users;
    }

    public function getUserById($user_id) {
        $userModel = new UserModel;
        $user = $userModel->getUserById($user_id);

        return $user;
    }

    public function updateUser($user_id, $updatedUser) {
        $userModel = new UserModel;
        $success = $userModel->updateUser($user_id, $updatedUser);

        return $success;
    }
    public function deleteUser($user_id) {
        $userModel = new UserModel;
        return $userModel->deleteUser($user_id);
    }

    public static function checkIfUserParticipated($eventId, $userId) {
        $isParticipant = UserModel::checkIfUserParticipated($eventId, $userId);
        return $isParticipant;
    }
}