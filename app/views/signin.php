<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="signin.inc.php" method="POST">
    <label for="username">Nom d'utilisateur</label> 
        <input type="text" id="username" name="username" required>
        <br/>
        <label for="mdp">Mot de passe</label> 
        <input type="password" id="mdp" name="password" required>
        <br/>
        <label for="mdp">Répéter le mot de passe</label> 
        <input type="password" id="mdp" name="rpassword" required>
        <span class="errsignin">
        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == 'nomatchpassword'){
                    ?>
                    <p>Les mots de passe entrés ne correspondent pas.</p>
                    <?php
                } 
                if($_GET['error'] == 'existingID'){
                    ?>
                    <p>Le pseudo ou l'email est indisponible</p>
                    <?php
                }    
            }
        ?></span>
        <br/>
        <input type="reset" value="réinitialiser"/> 
        <input type="submit" name="signinsubmit" value="s'enregistrer"/>
        <a href="login.php" class="apwd">J'ai déjà un compte</a>
    </form>
</body>
</html>