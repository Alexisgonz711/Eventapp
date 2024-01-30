<?php
require_once('../models/UserModel.php');

$result = "";
if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") {
  $result = login();
}

?>

<div class="login-container">
  <div class="page-cover">
    <h1>Bienvenu sur Eventapp</h1>
  </div>
  <div class="page-main">
    <div class="form-container">
      <h2>Login</h2>
      <?php if ($result && $result !== "") { ?>
        <div class="error-message">
          <?= $result ?>
        </div>
      <?php } ?>

      <form action="" method="post">
        <div class="form-container">
          <div class="email">
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" placeholder="example@example.com">
          </div>
          <div class="password">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" placeholder="********">
          </div>

          <button type="submit">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
