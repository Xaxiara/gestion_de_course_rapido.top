<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation de mot de passe - Rapido.Top</title>
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
    </style>
</head>
<body>
<?php include ('menu.php'); ?>
<div class="container">
    <div class="form-container">
        <h4 class="mt-2 text-center">Réinitialisation de mot de passe</h4>
        <form action="../script_controle/traitement_mot_de_passe_oublie.php" method="POST" class="mt-3">
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
            <button type="submit" class="btn btn-primary">Réinitialiser</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>