<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - Rapido.Top</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .form-container {
      max-width: 400px;
      margin: 50px auto;
    }
    .input-group-text img {
      width: 20px;
      height: 20px;
    }
    .form-row {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
    }
    .form-image {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .form-image img {
      max-width: 100%;
      height: auto;
    }
    .form-content {
      flex: 1;
    }
  </style>
</head>
<body>
<?php include ('menu.php'); ?>
<div class="container">
  <div class="form-container">
    <h2 class="mt-4 text-center">Inscription</h2>
    
    <!--div class="row justify-content-left">
      <div class="form-image">
        <img src="images/cousier_touchpoint.png" alt="Inscription Image">
      </div>
    </div -->
      <div class="form-content">
        <form action="../script_controle/traitement_inscription.php" method="POST" class="mt-3">
          <div class="form-group">
            <label for="email">Adresse e-mail :</label>
            <div class="input-group">
              <input type="email" class="form-control" id="email" name="email" required>
              <div class="input-group-append">
                <span class="input-group-text">
                  <img src="../images/icones/Guillendesign-Variations-3-Mail-Gmail.256.png" alt="Email Icon">
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
                  <img src="../images/icones/password.128.png" alt="Password Icon">
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="confirm_password">Confirmer le mot de passe :</label>
            <div class="input-group">
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
              <div class="input-group-append">
                <span class="input-group-text">
                  <img src="../images/icones/password.128.png" alt="Confirm Password Icon">
                </span>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
      </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
