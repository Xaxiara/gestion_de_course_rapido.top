<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil - Rapido.Top</title>
  <!-- Intégration Bootstrap 4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Styles personnalisés -->
  <style>
    body {
      background-color: #f8f8fa;
    }
    .jumbotron {
      background-image: url('../images/livreur1.jpg');
      background-size: cover;
      color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
  </style>
</head>
<body>
<?php include ('menu.php'); ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
    <h1 class="display-4">Bienvenue sur l'Application de Gestion de Courses "Rapido"</h1>
    <p class="lead">Trouvez des coursiers fiables pour vos livraisons</p>
    <hr class="my-4">
    <p>Inscrivez-vous dès maintenant pour profiter de notre service de livraison rapide et sécurisé.</p>
    <a class="btn btn-primary btn-lg" href="inscriptionApp.php" role="button">S'inscrire</a>
    <a class="btn btn-outline-light btn-lg" href="connexionApp.php" role="button">Se connecter</a>
  </div>
</div>

<div class="col-md-12">
    <h5>
      <p>Nous sommes une entreprise de livraison dédiée à fournir des services rapides, fiables et abordables pour toutes vos nécessités de livraison. Rejoignez-nous pour une expérience de livraison exceptionnelle.</p>
    </h5>
</div>

<!-- Scripts Bootstrap 4 (jQuery requis) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
<?php include ('footer.php'); ?>
</html>



