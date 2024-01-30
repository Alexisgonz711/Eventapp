<?php

$page_title = "Connexion" ;
include_once 'components/header.php';

?>

<?php
$page_title = "Inscription" ;
include_once 'components/header.php';
?>
<div class="content-wrapper">
    <div class="content">
        <div class="l-box-lrg pure-u-2 pure-u-md-1-5">
            <div class="pure-g">
                <div class=" pure-u-2-3">
                    <img src="https://img.freepik.com/free-vector/sign-page-abstract-concept-illustration_335657-3875.jpg" class="img-form"/>
                </div>
                <div class="l-box-lg-3-4 pure-u-2-3">
                    <form action="login.inc.php" method="POST">
                        <h1>Connexion</h1>
                        <label for="pseudo">Pseudo</label> <input type="text" id="pseudo" name="username" required>
                        <br/>
                        <label for="mdp">Mot de passe</label> <input type="password" id="mdp" name="password" required>
                        <br/>
                        <div class="errlog">
                        <?php
                        if(isset($_GET["error"])){?>
                        <h4>Le nom d'utilisateur et/ou le mot de passe utilisé contient des erreurs.</h4>
                        <?php
                        }
                        ?>
                        </div>
                        <div>
                        <br/>
                            <input type="reset" value="Réinitialiser" class="pure-button button-secondary"/> 
                            <input type="submit" name="loginsubmit" value="Connexion" class="pure-button"/><br/>
                            <a href="forgotpassword.php" class="apwd">Mot de passe oublié ?</a>
                            <br/>
                            <a href="signin.php" class="apwd">Pas encore inscrit ?</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
include_once 'components/footer.php';
?>
