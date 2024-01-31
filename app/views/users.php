<?php
session_start();
$page_title = "Tous nos utilisateurs";
include_once 'components/header.php';
include_once '../controllers/UserController.php';

$newUser = new UserController;
$users = $newUser->getUsers();

if(!isset($_SESSION)){ 
    header('Location: login.php'); 
    exit; 
}

if($_SESSION['role_id'] != 1 )
{ 
    header('Location: index.php'); 
    exit; 
}
?>

<div class="content-wrapper">
    <div class="content">
        <div class="l-box-lrg pure-u-2 pure-u-md-5-5">
            <div>
                <div class="l-box-lg-4-4 pure-u-3-3">
                    <h1 class="content-head is-center">Liste des utilisateurs</h1>
                    <div id="notification" class="notification">
                        <span id="notification-message"></span>
                        <span class="close-button" onclick="closeNotification()">&times;</span>
                    </div>
                    <table id="userTable" class="pure-table pure-table-horizontal content-table pure-table-centered" style="margin:auto">
                        <thead>
                            <tr>
                                <th>Nom d'utilisateur</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?= $user["username"] ?></td>
                                    <td><a href="mailto:<?= $user["email"] ?>"><?= $user["email"] ?></a></td>
                                    <td>
                                        <?php
                                        if ($user["role_id"] == 1) {
                                            echo "Jedi";
                                        } elseif ($user["role_id"] == 2) {
                                            echo "Padawan";
                                        } else {
                                            echo "Autre"; 
                                        }
                                        ?>
                                    </td>
                                    <td><button  class="pure-button"><a href="edit_user.php?uid=<?=$user['id']?>">Modifier</a></button></td>
                                    <td><button onclick="confirmDelete(<?= $user['id'] ?>)" class="pure-button button-secondary">Supprimer</button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

document.addEventListener('DOMContentLoaded', function () {
    var successMessage = "<?php echo isset($_SESSION['success_message']) ? $_SESSION['success_message'] : ''; ?>";

    if (successMessage) {
        showNotification(successMessage);

        <?php unset($_SESSION['success_message']); ?>
    }
});
</script>
<?php
include_once 'components/footer.php';