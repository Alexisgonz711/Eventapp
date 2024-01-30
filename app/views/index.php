<?php
require_once('../controllers/UserController.php');

$userController = new UserController();
$users = $userController->getUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
</head>
<body>
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
</body>
</html>
