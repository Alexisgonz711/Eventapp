<?php
session_start();
$page_title = "Modifier un utilisateur";
include_once 'components/header.php';
include_once '../controllers/UserController.php';

if (!isset($_SESSION)) {
    header('Location: login.php');
    exit;
}
if ($_SESSION['role_id'] != 1) {
    header('Location: index.php');
    exit;
}
if (!isset($_GET['uid']) || empty($_GET['uid'])) {
    header('Location: index.php');
    exit;
}

$user_id = $_GET['uid'];
$userController = new UserController;
$user = $userController->getUserById($user_id);

if (!$user) {
    header('Location: index.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedUser = array(
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'role_id' => $_POST['role_id']
    );

    $success = $userController->updateUser($user_id, $updatedUser);

    if ($success) {
        header('Location: users.php');
        exit;
    } else
        $error_message = "Erreur lors de la mise à jour de l'utilisateur.";
    }
}
?>

<div class="content-wrapper">
    <div class="content">
        <div class="l-box-lrg pure-u-2 pure-u-md-5-5">
            <div>
                <div class="l-box-lg-4-4 pure-u-3-3">
                    <h1 class="content-head is-center">Modifier un utilisateur</h1>
                    
                    <?php if (isset($error_message)) : ?>
                        <p style="color: red;"><?= $error_message ?></p>
                    <?php endif; ?>

                    <form method="post" action="">
                        <label for="username">Nom d'utilisateur:</label>
                        <input type="text" id="username" name="username" value="<?= $user['username'] ?>" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?= $user['email'] ?>" required>

                        <label for="role_id">Rôle:</label>
                        <select id="role_id" name="role_id" required>
                            <option value="1" <?= ($user['role_id'] == 1) ? 'selected' : '' ?>>Jedi</option>
                            <option value="2" <?= ($user['role_id'] == 2) ? 'selected' : '' ?>>Padawan</option>
                        </select>

                        <button type="submit" class="pure-button">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'components/footer.php'; ?>
