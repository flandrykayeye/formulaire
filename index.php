<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=formulaire;charset=utf8;', 'root', '');

// Vérification de la connexion
if (isset($_POST['connexion'])) {
    // Récupérer et normaliser le nom
    $nom = htmlspecialchars(trim($_POST['nom'])); // Champ pour le nom
    $matricule = htmlspecialchars(trim($_POST['matricule'])); // Champ pour le matricule

    // Préparation de la requête pour récupérer l'utilisateur
    // Utilisation de LIKE pour permettre le filtrage
    $query = $bdd->prepare("SELECT * FROM personnel WHERE LOWER(nom) LIKE LOWER(?) AND matricule = ?");
    $query->execute(['%' . $nom . '%', $matricule]);
    $user = $query->fetch();

    // Vérification de l'utilisateur
    if ($user) { // L'utilisateur existe avec le matricule correspondant
        $_SESSION['user'] = $user; // Stocke les informations de l'utilisateur dans la session
        header("Location: formulaire.php"); // Redirection vers agent.php
        exit();
    } else {
        $error = "Nom ou matricule incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="ma.radees.radees.png" />
    <title>Connexion BTC</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">

    <style>
        .forme {
            transition: transform 0.3s ease; /* Animation de transition */
        }

        .forme:hover {
            transform: scale(1.05); /* Agrandit légèrement la div */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Ajoute une ombre */
        }
    </style>
</head>

<body>
    <center><br>
        <header class="geapp-header-bar center-block">
            <img class="logo" src="btc.jpg"/>
        </header><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <table class="table table-bordered forme">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col"><center>Connexion Agent</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div class="container">
                                        <div class="panel-body">
                                            <form method="POST">
                                                <input type="text" class="form-control" name="nom" placeholder="Nom, Postnom, Prénom" required> <br>
                                                <input type="text" class="form-control" name="matricule" placeholder="Matricule" required> <br>
                                                <button type="submit" name="connexion" class="btn btn-lg btn-primary btn-block">Se Connecter</button>
                                            </form>
                                            <?php if (isset($error)): ?>
                                                <div class="alert alert-danger mt-2"><?php echo $error; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </center>
</body>
</html>