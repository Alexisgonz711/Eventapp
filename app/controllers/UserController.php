<?php

require_once('../models/UserModel.php');


class UserController {
    public function getUsers() {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        return $users;
    }
}
