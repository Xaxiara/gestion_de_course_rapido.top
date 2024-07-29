<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - Rapido.Top</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .input-group-text img {
      width: 20px;
      height: 20px;
    }
    .form-image {
      max-width: 100%;
      height: auto;
      margin: 50px auto;
    }
  </style>
</head>
<body>
<?php include ('menu.php'); ?>
<div class="container">
  <div class="row justify-content-left">
      <div class="col-md-4">
        <img src="../images/coursier.jpg" alt="Left Image" class="form-image">
      </div>
    <div class="col-md-4">
      <h1 class="mt-2 text-center">Connexion</h1>
      <form action="../script_controle/traitement_connexion.php" method="POST" class="mt-3">
        <div class="form-group">
          <label for="email">Adresse e-mail :</label>
          <div class="input-group">
            <input type="email" class="form-control" id="email" name="email" required>
            <div class="input-group-append">
              <span class="input-group-text">
                <img src="../images/icones/email-11-240.png" alt="Email Icon">
              </span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="password">Mot de passe :</label>
          <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="input-group-append">
              <span class="input-group-text">
                <img src="../images/icones/passwordkey-11-240.png" alt="Password Icon">
              </span>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
        <a href="../vues/reinitialisationApp.php" class="btn btn-link">Mot de passe oublié ?</a>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
