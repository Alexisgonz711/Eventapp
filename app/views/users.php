<?php
session_start();
$page_title = "Tous nos utilisateurs" ;
include_once 'components/header.php';

if(!isset($_SESSION['id'])){ 
    header('Location: index.php'); 
    exit; 
}

?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php 
var_dump($_SESSION);?>
coucou.