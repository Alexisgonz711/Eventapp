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
            <div class="pure-g">
                <div class="l-box-lg-3-4 pure-u-3-3">
                    <h1 class="content-head is-center">Liste des utilisateurs</h1>
                    <table id="userTable" class="pure-table pure-table-horizontal content-table pure-table-centered">
                        <thead>
                            <tr>
                                <th>Nom d'utilisateur</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Affichage de la liste des utilisateurs -->
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
                                    <td><button onclick="showEditForm(event, <?= $user['id'] ?>)" class="pure-button button-secondary" data-modal-id="editModal<?= $user['id'] ?>">Modifier</button></td>
                                    <td><button onclick="editUser(event, <?= $user['id'] ?>)" class="pure-button button-secondary">Supprimer</button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'components/footer.php';