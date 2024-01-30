<?php
$page_title = "Inscription" ;
include_once 'components/header.php';
?>
<div class="content-wrapper">
    <div class="content">
        <div class="l-box-lrg pure-u-2 pure-u-md-1-5">
            <div class="pure-g">
                <div class="l-box-lg-1-4 pure-u-2-3">
                    <form action="signin.inc.php" method="POST">
                        <h1>Inscription</h1>
                        <label for="username">Nom d'utilisateur</label> 
                        <input type="text" id="username" name="username" required>
                        <br/>
                        <label for="email">Adresse email</label> 
                        <input type="email" id="email" name="email" required>
                        <br/>
                        <label for="mdp">Mot de passe</label> 
                        <input type="password" id="mdp" name="password" required>
                        <br/>
                        <label for="mdp">Répéter le mot de passe</label> 
                        <input type="password" id="mdp" name="rpassword" required>
                        <br/>
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
                            ?>
                        </span>
                        <br/>
                        <input type="reset" value="Réinitialiser" class="pure-button button-secondary"/> 
                        <input type="submit" name="signinsubmit" value="S'enregistrer" class="pure-button pure-button-primary"/>
                        <br/>
                        <div>
                            <a href="login.php" class="apwd">J'ai déjà un compte</a>
                        </div>
                    </form>
                </div>
                <div class=" pure-u-2-3">
                    <img src="https://img.freepik.com/free-vector/access-control-system-abstract-concept_335657-3180.jpg" class="img-form"/>
                </div>
            </div>
        </div>
    </div>
<?php
include_once 'components/footer.php';
?>