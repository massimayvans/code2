<?php
require_once('configuration.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <?php
    // variable qui stock les information de la requete client
    $req_select = "SELECT * FROM client";
    $resultat = mysqli_query($connexion, $req_select);


    // fonction qui permet de compter le nombre de ligne dans la table client
    $nb_ligne = mysqli_num_rows($resultat);
    echo "<h3>Nombre de clients : $nb_ligne</h3>";
    ?>

    <h2>Liste des clients</h2>
    <a href="dashboard.php" class="btn btn-outline-success">Retour au menu</a>
    <br><br>
    <table class="table table-bordered">
      <thead>
        <tr class="table-secondary">
          <th scope="col">Email</th>
          <th scope="col">Nom</th>
          <th scope="col">Prenon</th>
          <th scope="col">Adresse</th>
          <th scope="col">Téléphone</th>
        </tr>
      </thead>

      <?php
      // On affiche les clients pour chaque ligne
      // mysqli_fetch_assoc() permet de récupérer les résultats de la requête sous forme de tableau associatif
      while ($client = mysqli_fetch_assoc($resultat)) {
      ?>
        <tbody>
          <tr>
            <td><?php echo $client['email_cli']; ?></td>
            <td><?php echo $client['name']; ?></td>
            <td><?php echo $client['prenom']; ?></td>
            <td><?php echo $client['adress']; ?></td>
            <td><?php echo $client['telephone']; ?></td>
          </tr>
        </tbody>
      <?php
      }
      ?>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>