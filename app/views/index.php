<?php
require_once('../controllers/UserController.php');

$page_title = "EventApp :: Welcome" ;
include_once 'components/header.php' ;


$userController = new UserController();
$users = $userController->getUsers();
?>
    <h1>Liste des Utilisateurs</h1>
    <?php if (!empty($users)): ?>
        <ul>
            <?php foreach ($users as $user): ?>
                <li><?= $user['username']; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun utilisateur trouvé.</p>
    <?php endif; ?>

<?php 
require_once 'components/footer.php' ;
?>
