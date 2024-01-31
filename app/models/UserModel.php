<?php

require_once(__DIR__ . '/../../database/connection.php');

class UserModel {
    public function getAllUsers() {
        $conn = Database::getConnection();

        try {
            $stmt = $conn->prepare('SELECT * FROM users');
            $stmt->execute();

            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $users;
        } catch (PDOException $exception) {
            echo "Query error: " . $exception->getMessage();
            return array();
        }
    }

    public function getUserById($user_id) {
        $conn = Database::getConnection();
        $sql = "SELECT * FROM users WHERE id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;

        return $user;
    }
    public function updateUser($user_id, $updatedUser) {
        $conn = Database::getConnection();
        $sql = "UPDATE users SET username = :username, email = :email, role_id = :role_id WHERE id = :user_id";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':username', $updatedUser['username'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $updatedUser['email'], PDO::PARAM_STR);
        $stmt->bindParam(':role_id', $updatedUser['role_id'], PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $success = $stmt->execute();
        $conn = null;

        return $success;
    }

    public function deleteUser($user_id) {
        $conn = Database::getConnection();

        $sql = "DELETE FROM users WHERE id = :user_id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $success = $stmt->execute();

        $conn = null;

        return $success;
    }
}
function login($pdo,$pseudo,$mdp){
    $pseudoExist = pseudoExist($pdo,$pseudo,$pseudo);
    if ($pseudoExist === false){
        header('location: login.php?error=connectionfailed');
        exit();
    }
    $pwdh = $pseudoExist['password'];
    $checkmdp = password_verify($mdp,$pwdh);
    if ($checkmdp === false){
        header('location: login.php?error=connectionfailed');
        exit();
    }
    else if($checkmdp === true){
        session_start();
        $_SESSION['id'] = true;
        $_SESSION['user'] = $pseudoExist['username'];
        $_SESSION['id_user'] = $pseudoExist['id'];
        $_SESSION['role_id'] = $pseudoExist['role_id'];
        header('location: index.php?connectionsucceed='.$_SESSION['user']);
    }
}

function pseudoExist($pdo,$pseudo,$email){
    $sql = "select * from users where USERNAME=? OR EMAIL=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$pseudo,$email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$result){
        $result = false;
        return $result;
    } else {
        return $result;
    }
}

function createUser($pdo,$pseudo,$email,$mdp){
    $sql = "insert into users (ROLE_ID,USERNAME,EMAIL,PASSWORD) values(2,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $hashpwd = password_hash($mdp,PASSWORD_DEFAULT);
    $stmt->execute([$pseudo,$email,$hashpwd]);




    header('location: index.php');
}

function passwordTest($password,$checkpassword) {
    if($password === $checkpassword){
        return true;
    }else {return false;}
}
