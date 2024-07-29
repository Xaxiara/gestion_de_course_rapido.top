<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Espace Utilisateur - Rapido.Top</title>
  <!-- Intégration Bootstrap 4 -->
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
    .header-buttons {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
    .filter-container {
      width: 45%;
    }
    .order-container {
      width: 45%;
    }
    .logout-container {
      display: flex;
      justify-content: flex-end;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">RAPIDO TOP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <div class="logout-container">
          <a href="../script_controle/deconnexionApp.php" class="btn btn-danger">Se déconnecter</a>
        </div>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="header-buttons">
    <!-- Filtre sur l'historique des courses -->
    <div class="filter-container">
      <form id="filterForm" class="form-inline">
        <div class="form-group">
          <label for="filter" class="sr-only">Filtrer l'historique</label>
          <input type="text" class="form-control mr-2" id="filter" placeholder="Filtrer l'historique">
          <button type="button" class="btn btn-primary" onclick="filterHistory()">Filtrer</button>
        </div>
      </form>
    </div>
    <!-- Commande de course -->
    <div class="order-container text-right">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#orderModal">Commander une course</button>
    </div>
  </div>

  <!-- Historique des courses -->
  <div class="mt-4">
    <h3>Historique des courses</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID de la course</th>
          <th>Point de départ</th>
          <th>Point d'arrivée</th>
          <th>Date et heure</th>
          <th>Chauffeur</th>
          <th>Statut</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="courseHistory">
        <!-- PHP code to fetch and display courses -->
        <?php
        include('../connexion.php');
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
                    <td><button class='btn btn-info' data-toggle='modal' data-target='#courseDetailsModal' onclick='showCourseDetails({$row['course_id']})'>Détails</button></td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='7'>Aucune course trouvée</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal pour commander une course -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="orderModalLabel">Commander une course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="traitement_commande.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="point_depart">Point de départ</label>
            <input type="text" class="form-control" id="point_depart" name="point_depart" required>
          </div>
          <div class="form-group">
            <label for="point_arrivee">Point d'arrivée</label>
            <input type="text" class="form-control" id="point_arrivee" name="point_arrivee" required>
          </div>
          <div class="form-group">
            <label for="date_heure">Date et heure</label>
            <input type="datetime-local" class="form-control" id="date_heure" name="date_heure" required>
          </div>
          <div class="form-group">
            <label for="chauffeur_id">Chauffeur</label>
            <select class="form-control" id="chauffeur_id" name="chauffeur_id" required>
              <?php
              // Fetch available chauffeurs
              $sql = "SELECT chauffeur_id, nom, prenom FROM chauffeurs WHERE disponible = 'Oui'";
              $result = $connexion->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "<option value='{$row['chauffeur_id']}'>{$row['nom']} {$row['prenom']}</option>";
                }
              } else {
                echo "<option value=''>Aucun chauffeur disponible</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Commander</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal pour les détails de la course -->
<div class="modal fade" id="courseDetailsModal" tabindex="-1" role="dialog" aria-labelledby="courseDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="courseDetailsModalLabel">Détails de la course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="courseDetailsContent">
          <!-- Détails de la course chargés ici via AJAX -->
        </div>
        <div id="map" style="height: 400px;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY"></script>
<script>
  function filterHistory() {
    const filter = document.getElementById('filter').value.toLowerCase();
    const rows = document.getElementById('courseHistory').getElementsByTagName('tr');
    for (let i = 0; i < rows.length; i++) {
      const cells = rows[i].getElementsByTagName('td');
      let rowVisible = false;
      for (let j = 0; j < cells.length; j++) {
        if (cells[j].textContent.toLowerCase().includes(filter)) {
          rowVisible = true;
          break;
        }
      }
      rows[i].style.display = rowVisible ? '' : 'none';
    }
  }

  function showCourseDetails(courseId) {
    $.ajax({
      url: 'details_course.php',
      type: 'GET',
      data: { course_id: courseId },
      success: function(response) {
        $('#courseDetailsContent').html(response);
        const courseData = JSON.parse(response);
        initMap(courseData.point_depart, courseData.point_arrivee);
      }
    });
  }

  function initMap(pointDepart, pointArrivee) {
    const map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: pointDepart
    });

    const markerDepart = new google.maps.Marker({
      position: pointDepart,
      map: map,
      title: 'Point de départ'
    });

    const markerArrivee = new google.maps.Marker({
      position: pointArrivee,
      map: map,
      title: 'Point d\'arrivée'
    });

    const bounds = new google.maps.LatLngBounds();
    bounds.extend(pointDepart);
    bounds.extend(pointArrivee);
    map.fitBounds(bounds);
  }
</script>
</body>
</html>
