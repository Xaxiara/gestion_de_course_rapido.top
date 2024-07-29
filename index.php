<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard d'Administration</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <style>
    .hidden-section {
      display: none;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Admin Rapido.Top</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Déconnexion</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-2">
  <h3 class="text-center">Tableau de Bord - Rapido.Top</h3>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">Gestion des Courses</div>
        <div class="card-body">
          <a href="add_course.php" class="btn btn-success btn-block">Ajouter une Course</a>
          <button class="btn btn-primary btn-block" onclick="toggleSection('courses')">Voir les Courses</button>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">Gestion des Chauffeurs</div>
        <div class="card-body">
          <a href="add_chauffeur.php" class="btn btn-success btn-block">Ajouter un Chauffeur</a>
          <button class="btn btn-primary btn-block" onclick="toggleSection('chauffeurs')">Voir les Chauffeurs</button>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">Gestion des Utilisateurs</div>
        <div class="card-body">
          <a href="add_user.php" class="btn btn-success btn-block">Ajouter un Utilisateur</a>
          <button class="btn btn-primary btn-block" onclick="toggleSection('users')">Voir les Utilisateurs</button>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-4 hidden-section" id="courses">
    <h3>Courses</h3>
    <table id="coursesTable" class="table table-striped dataTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Départ</th>
          <th>Arrivée</th>
          <th>Date et Heure</th>
          <th>Chauffeur</th>
          <th>Statut</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include('connexion.php');
        $sql = "SELECT courses.*, chauffeurs.nom, chauffeurs.prenom FROM courses JOIN chauffeurs ON courses.chauffeur_id = chauffeurs.chauffeur_id";
        $result = $connexion->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['course_id']}</td>
                    <td>{$row['point_depart']}</td>
                    <td>{$row['point_arrivee']}</td>
                    <td>{$row['date_heure']}</td>
                    <td>{$row['nom']} {$row['prenom']}</td>
                    <td>{$row['statut']}</td>
                    <td>
                      <a href='edit_course.php?id={$row['course_id']}' class='btn btn-info'>Éditer</a>
                      <a href='delete_course.php?id={$row['course_id']}' class='btn btn-danger'>Supprimer</a>
                    </td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='7'>Aucune course trouvée</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="mt-4 hidden-section" id="chauffeurs">
    <h3>Chauffeurs</h3>
    <table id="chauffeursTable" class="table table-striped dataTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Téléphone</th>
          <th>Sexe</th>
          <th>Disponible</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM chauffeurs";
        $result = $connexion->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['chauffeur_id']}</td>
                    <td>{$row['nom']}</td>
                    <td>{$row['prenom']}</td>
                    <td>{$row['telephone']}</td>
                    <td>{$row['sexe']}</td>
                    <td>{$row['disponible']}</td>
                    <td>
                      <a href='edit_chauffeur.php?id={$row['chauffeur_id']}' class='btn btn-info'>Éditer</a>
                      <a href='delete_chauffeur.php?id={$row['chauffeur_id']}' class='btn btn-danger'>Supprimer</a>
                    </td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='7'>Aucun chauffeur trouvé</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="mt-4 hidden-section" id="users">
    <h3>Utilisateurs</h3>
    <table id="usersTable" class="table table-striped dataTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM users";
        $result = $connexion->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['email']}</td>
                    <td>
                      <a href='edit_user.php?id={$row['id']}' class='btn btn-info'>Éditer</a>
                      <a href='delete_user.php?id={$row['id']}' class='btn btn-danger'>Supprimer</a>
                    </td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='3'>Aucun utilisateur trouvé</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#coursesTable').DataTable();
    $('#chauffeursTable').DataTable();
    $('#usersTable').DataTable();
  });

  function toggleSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section.style.display === "none" || section.style.display === "") {
      section.style.display = "block";
    } else {
      section.style.display = "none";
    }
  }
</script>
</body>
</html>
