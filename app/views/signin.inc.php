<?php
require_once '../../database/connection.php';
require_once '../controllers/UserController.php';

if(isset($_POST['signinsubmit'])){
    $pseudo = $_POST['username'];
    $mdp = $_POST['password'];
    $mdp2 =$_POST['rpassword'];
    if(passwordTest($mdp,$mdp2)== false){
        header("location: signin.php?error=nomatchpassword") ;
        exit();
    } 
    if(pseudoExist($pdo,$pseudo,$email)==true){
        header("location: signin.php?error=existingID") ;
        exit();
    }
    createUser($pdo,$pseudo,$email,$mdp);
}else {
    header('location: signin.php');

}