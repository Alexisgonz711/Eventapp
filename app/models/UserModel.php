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
}
function login($pdo,$pseudo,$mdp){
  $pseudoExist = pseudoExist($pdo,$pseudo,$pseudo);
  if ($pseudoExist === false){
      header('location: login.php?error=connectionfailed'); //page d'erreur de connexion
      exit();//fin de la fonction
  }
  $pwdh = $pseudoExist['password']; // mdp encrypté
  $checkmdp = password_verify($mdp,$pwdh); // vérifier le mdp
  if ($checkmdp === false){
      header('location: login.php?error=connectionfailed'); //page d'erreur de connexion
      exit();//fin de la fonction
  }
  else if($checkmdp === true){
      session_start(); //commencer la connexion
      $_SESSION['user'] = $pseudoExist['username'];
      header('location: index.php?connectionsucceed='.$_SESSION['user']);
  }
}

function pseudoExist($pdo,$pseudo,$email){
  $sql = "select * from users where username=? or email=?";
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
