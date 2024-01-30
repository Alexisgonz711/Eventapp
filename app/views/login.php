<?php

$page_title = "Connexion" ;
include_once 'components/header.php';

?>

<h1>Connexion</h1>
    <form action="login.inc.php" method="POST">
        <label for="pseudo">Pseudo</label> <input type="text" id="pseudo" name="username" required>
        <br/>
        <label for="mdp">Mot de passe</label> <input type="password" id="mdp" name="password" required>
        <div class="errlog">
        <?php
        if(isset($_GET["error"])){?>
        <h4>Le nom d'utilisateur et/ou le mot de passe utilisé contient des erreurs.</h4>
        <?php
        }
        ?>
        </div>
        <input type="reset" value="réinitialiser"/> <input type="submit" name="loginsubmit" value="connexion"/>
        <a href="forgotpassword.php" class="apwd">Mot de passe oublié ?</a>

        <a href="signin.php" class="apwd">Pas encore inscrit ?</a>

    </form>
<?php
include_once 'components/footer.php';
?>
