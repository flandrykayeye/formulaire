<?php 
session_start();
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=formulaire;charset=utf8;', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
if (!isset($_SESSION['user'])) {
    header("Location: index.php"); // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Récupération des informations de l'utilisateur
$user = $_SESSION['user'];

if (isset($_POST['envoi'])) {
    // Liste des champs requis
    $required_fields = [
        'nom', 'postnom', 'prenom', 'sexe', 'dateNaissance', 'numCarteIdentite',
        'diplome', 'anneeObtention', 'telephone', 'adresseMailBTC', 'numAvenue',
        'quartier', 'commune', 'province', 'matricule', 'poste', 'dateContrat',
        'etudes', 'grade', 'typeContrat', 'direction', 'provinceAffectation',
        'division', 'bureau', 'superieurHierarchique', 'nomContactUrgence',
        'lienAvecEmploye', 'telephoneContactUrgence', 'etatCivil', 'nombreEnfants', 'numCNSS'
    ];

    // Vérifier que tous les champs requis sont remplis
    $missing_fields = [];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $missing_fields[] = $field;
        }
    }

    if (!empty($missing_fields)) {
        echo "Veuillez remplir tous les champs requis : " . implode(', ', $missing_fields);
    } else {
        // Récupérer et nettoyer les données
        $data = [];
        foreach ($required_fields as $field) {
            $data[$field] = htmlspecialchars($_POST[$field]);
        }

        // Vérifier si le matricule existe déjà
        $checkMatricule = $bdd->prepare("SELECT COUNT(*) FROM Agent WHERE matricule = ?");
        $checkMatricule->execute([$data['matricule']]);
        $existingMatricule = $checkMatricule->fetchColumn();

        if ($existingMatricule > 0) {
            echo "<script>alert('Erreur : le matricule {$data['matricule']} existe déjà. Veuillez en saisir un autre.');</script>";
        } else {
            // Vérifier si une personne avec le même nom, postnom et prénom existe déjà
            $checkPersonne = $bdd->prepare("SELECT COUNT(*) FROM Agent WHERE nom = ? AND postnom = ? AND prenom = ?");
            $checkPersonne->execute([$data['nom'], $data['postnom'], $data['prenom']]);
            $existingPersonne = $checkPersonne->fetchColumn();

            if ($existingPersonne > 0) {
                echo "<script>alert('Erreur : une personne avec le nom {$data['nom']}, postnom {$data['postnom']} et prénom {$data['prenom']} existe déjà.');</script>";
            } else {
                // Préparer la requête d'insertion
                $insertQuery = $bdd->prepare("
                    INSERT INTO Agent (
                        nom, postnom, prenom, sexe, dateNaissance, numCarteIdentite,
                        diplome, anneeObtention, telephone, adresseMailBTC, numAvenue,
                        quartier, commune, province, matricule, poste, dateContrat,
                        etudes, grade, typeContrat, direction, provinceAffectation,
                        division, bureau, superieurHierarchique, nomContactUrgence,
                        lienAvecEmploye, telephoneContactUrgence, etatCivil, nombreEnfants, numCNSS
                    ) VALUES (
                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                    )
                ");

                try {
                    // Exécuter la requête
                    $insertQuery->execute(array_values($data));
                    echo "<script>alert('Informations reçues de : {$data['nom']} {$data['prenom']}');</script>";
                } catch (PDOException $e) {
                    // Analyser l'erreur pour déterminer le champ problématique
                    $errorInfo = $insertQuery->errorInfo();
                    $errorCode = $errorInfo[0];

                    if ($errorCode == '23000') { // Code d'erreur pour violation de contrainte
                        echo "<script>alert('Erreur lors de l\\'insertion : " . addslashes($errorInfo[2]) . "');</script>";
                    } else {
                        echo "<script>alert('Erreur lors de l\\'insertion : " . addslashes($e->getMessage()) . "');</script>";
                    }
                }
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
<title>BTC</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!--Pour que le rendu et le zoom-->
	 <!-- CSS -->
	 <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <!-- Liens Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Personnalisation des styles -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f8fb;
            margin: 0;
            padding: 0;
        }

        header {
             background-color: #0d2130;
            color: #fff;
            padding: 20px 0;
            display: flex;               /* Utiliser Flexbox */
            justify-content: center;     /* Centrer horizontalement */
            align-items: center;         /* Centrer verticalement */
        }

        header .navbar {
            justify-content: center;
        }

        .navbar-brand img {
            width: 150px;
        }

        .container {
            margin-top: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #0d2130;;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.6);
        }

        .btn-custom {
            background-color: #28a745;
            color: #fff;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .btn-outline-secondary {
            border-radius: 20px;
        }

        .btn-outline-secondary:hover {
            background-color: #007bff;
            color: #fff;
        }

        .row .col-md-4, .row .col-md-6 {
            margin-bottom: 20px;
        }

        .expert-input input {
            width: 80%;
        }

        footer {
            background-color: #0d2130;;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control-textarea {
            height: 150px;
            resize: vertical;
        }

        .modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 999;
        }

    </style>
</head>
<body>

<header class="geapp-header-bar center-block">
            <img class="logo" src="btc.jpg"/>
            
        </header>

<div class="container mt-5">
    <center><h2 class="mb-4">Informations Agent BTC</h2></center>
    <form method="POST" onsubmit="return validateForm()">
        <!-- Informations de l'agent -->
        <center><h5 class="mb-4">Informations Agent BTC</h5></center>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
            </div>

            <div class="col-md-6 mb-4">
                <label for="postnom" class="form-label">Postnom</label>
                <input type="text" class="form-control" id="postnom" name="postnom" placeholder="Postnom" required>
            </div>

            <div class="col-md-6 mb-4">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
            </div>

            <div class="col-md-6 mb-4">
                <label for="sexe" class="form-label">Sexe</label>
                <select class="form-select" id="sexe" name="sexe" required>
                    <option value="" disabled selected>Sélectionner le sexe</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </div>

            <div class="col-md-6 mb-4">
                <label for="dateNaissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" required>
            </div>

            <div class="col-md-6 mb-4">
                <label for="numCarteIdentite" class="form-label">Numéro de carte d'identité</label>
                <input type="text" class="form-control" id="numCarteIdentite" name="numCarteIdentite" placeholder="Numéro de carte d'identité" required>
            </div>

            <div class="col-md-6 mb-4">
                <label for="diplome" class="form-label">Diplôme</label>
                <select class="form-select" id="diplome" name="diplome" required>
                    <option value="" disabled selected>Sélectionner un diplôme</option>
                    <option value="Licence">Licence</option>
                    <option value="Graduat">Graduat</option>
                    <option value="Diplôme d'État">Diplôme d'État</option>
                    <option value="Certificat primaire">Certificat primaire</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>

            <div class="col-md-6 mb-4">
                <label for="anneeObtention" class="form-label">Année d'obtention du diplôme</label>
                <input type="number" class="form-control" id="anneeObtention" name="anneeObtention" placeholder="Année d'obtention" required>
            </div>

            <div class="col-md-6 mb-4">
                <label for="telephone" class="form-label">Numéro de téléphone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Numéro de téléphone" required>
            </div>

            <div class="col-md-6 mb-4">
        <label for="etatCivil" class="form-label">État Civil :</label>
        <select id="etatCivil" name="etatCivil" class="form-control" required>
            <option value="" disabled selected>Sélectionnez votre état civil</option>
            <option value="marie">Marié(e)</option>
            <option value="celibataire">Célibataire</option>
            <option value="divorce">Divorcé(e)</option>
            <option value="veuf">Veuf(ve)</option>
        </select>
    </div>

    <div class="col-md-6 mb-4" class="form-label">
        <label for="nombreEnfants">Nombre d'enfants :</label>
        <input type="number" id="nombreEnfants" name="nombreEnfants" class="form-control" min="0" value="0" required>
    </div>

    <div class="col-md-6 mb-4" class="form-label">
        <label for="numCNSS">Numéro CNSS :</label>
        <input type="text" id="numCNSS" name="numCNSS" class="form-control" required>
    </div>
        </div>

        <center><h5 class="mb-4">Adresses</h5></center>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="adresseMailBTC" class="form-label">Adresse mail BTC</label>
                <input type="email" class="form-control" id="adresseMailBTC" name="adresseMailBTC" placeholder="Adresse mail BTC" required>
            </div>

            <div class="col-md-6 mb-4">
                <label for="numAvenue" class="form-label">N° & Avenue</label>
                <input type="text" class="form-control" id="numAvenue" name="numAvenue" placeholder="Numéro et avenue" required>
            </div>
        </div>

        <!-- Quartier, Commune, Province -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <label for="quartier" class="form-label">Quartier</label>
                <input type="text" class="form-control" id="quartier" name="quartier" placeholder="Quartier" required>
            </div>

            <div class="col-md-4 mb-4">
                <label for="commune" class="form-label">Commune</label>
                <input type="text" class="form-control" id="commune" name="commune" placeholder="Commune" required>
            </div>

            <div class="col-md-4 mb-4">
                <label for="province" class="form-label">Province</label>
                <select class="form-select" id="province" name="province" required>
                    <option value="" disabled selected>Sélectionner une province</option>
                    <option value="BAS UELE">BAS UELE</option>
                    <option value="EQUATEUR">EQUATEUR</option>
                    <option value="HAUT KATANGA">HAUT KATANGA</option>
                    <option value="HAUT LOMAMI">HAUT LOMAMI</option>
                    <option value="HAUT UELE">HAUT UELE</option>
                    <option value="ITURI">ITURI</option>
                    <option value="KASAI">KASAI</option>
                    <option value="KASAI CENTRAL">KASAI CENTRAL</option>
                    <option value="KASAI ORIENTAL">KASAI ORIENTAL</option>
                    <option value="KINSHASA">KINSHASA</option>
                    <option value="KONGO CENTRAL">KONGO CENTRAL</option>
                    <option value="KWANGO">KWANGO</option>
                    <option value="KWILU">KWILU</option>
                    <option value="LOMAMI">LOMAMI</option>
                    <option value="LUALABA">LUALABA</option>
                    <option value="MAI-NDOMBE">MAI-NDOMBE</option>
                    <option value="MANIEMA">MANIEMA</option>
                    <option value="MONGALA">MONGALA</option>
                    <option value="NORD-KIVU">NORD-KIVU</option>
                    <option value="NORD-UBANGI">NORD-UBANGI</option>
                    <option value="SANKURU">SANKURU</option>
                    <option value="SUD-KIVU">SUD-KIVU</option>
                    <option value="SUD-UBANGI">SUD-UBANGI</option>
                    <option value="TANGANYIKA">TANGANYIKA</option>
                    <option value="TSHOPO">TSHOPO</option>
                    <option value="TSHUAPA">TSHUAPA</option>
                </select>
            </div>
        </div>

        <center><h5 class="mb-4">Ressources humaines</h5></center>
        <!-- Matricule et Poste -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="matricule" class="form-label">Matricule</label>
                <input type="text" class="form-control" id="matricule" name="matricule" placeholder="Matricule" required>
            </div>

            <div class="col-md-6 mb-4">
                <label for="poste" class="form-label">Poste</label>
                <input type="text" class="form-control" id="poste" name="poste" placeholder="Poste" required>
            </div>
        </div>

        <!-- Date du contrat, Études, Grade -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <label for="dateContrat" class="form-label">Date du contrat</label>
                <input type="date" class="form-control" id="dateContrat" name="dateContrat" required>
            </div>

            <div class="col-md-4 mb-4">
                <label for="etudes" class="form-label">Étude faite</label>
                <input type="text" class="form-control" id="etudes" name="etudes" placeholder="Études faites" required>
            </div>

            <div class="col-md-4 mb-4">
                <label for="grade" class="form-label">Grade</label>
                <select class="form-select" id="grade" name="grade" required>
                    <option value="" disabled selected>Sélectionner un grade</option>
                    <option value="DG">DG</option>
                    <option value="DIR">DIR</option>
                    <option value="CD">CD</option>
                    <option value="CB">CB</option>
                    <option value="ATA1">ATA1</option>
                    <option value="ATA2">ATA2</option>
                    <option value="AGA1">AGA1</option>
                    <option value="AGA2">AGA2</option>
                    <option value="AA1">AA1</option>
                    <option value="AA2">AA2</option>
                    <option value="HUIS">HUIS</option>
                </select>
            </div>
        </div>

        <!-- Type de Contrat, Direction, Province d'affectation -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <label for="typeContrat" class="form-label">Type de Contrat</label>
                <select class="form-select" id="typeContrat" name="typeContrat" required>
                    <option value="" disabled selected>Sélectionner un type de contrat</option>
                    <option value="CDI">CDI</option>
                    <option value="CDD">CDD</option>
                </select>
            </div>

            <div class="col-md-4 mb-4">
                <label for="direction" class="form-label">Direction</label>
                <select class="form-select" id="direction" name="direction" required>
                    <option value="" disabled selected>Sélectionner une direction</option>
                    <option value="Direction Générale">Direction Générale</option>
                    <option value="Direction Administrative & Financière">Direction Administrative & Financière</option>
                    <option value="Direction Technique">Direction Technique</option>
                    <option value="Direction des contentieux">Direction des contentieux</option>
                    <option value="Direction d'audit">Direction d'audit</option>
                </select>
            </div>

            <div class="col-md-4 mb-4">
                <label for="provinceAffectation" class="form-label">Province d'affectation</label>
                <select class="form-select" id="provinceAffectation" name="provinceAffectation" required>
                    <option value="" disabled selected>Sélectionner une province</option>
                    <option value="BAS UELE">BAS UELE</option>
                    <option value="EQUATEUR">EQUATEUR</option>
                    <option value="HAUT KATANGA">HAUT KATANGA</option>
                    <option value="HAUT LOMAMI">HAUT LOMAMI</option>
                    <option value="HAUT UELE">HAUT UELE</option>
                    <option value="ITURI">ITURI</option>
                    <option value="KASAI">KASAI</option>
                    <option value="KASAI CENTRAL">KASAI CENTRAL</option>
                    <option value="KASAI ORIENTAL">KASAI ORIENTAL</option>
                    <option value="KINSHASA">KINSHASA</option>
                    <option value="KONGO CENTRAL">KONGO CENTRAL</option>
                    <option value="KWANGO">KWANGO</option>
                    <option value="KWILU">KWILU</option>
                    <option value="LOMAMI">LOMAMI</option>
                    <option value="LUALABA">LUALABA</option>
                    <option value="MAI-NDOMBE">MAI-NDOMBE</option>
                    <option value="MANIEMA">MANIEMA</option>
                    <option value="MONGALA">MONGALA</option>
                    <option value="NORD-KIVU">NORD-KIVU</option>
                    <option value="NORD-UBANGI">NORD-UBANGI</option>
                    <option value="SANKURU">SANKURU</option>
                    <option value="SUD-KIVU">SUD-KIVU</option>
                    <option value="SUD-UBANGI">SUD-UBANGI</option>
                    <option value="TANGANYIKA">TANGANYIKA</option>
                    <option value="TSHOPO">TSHOPO</option>
                    <option value="TSHUAPA">TSHUAPA</option>
                </select>
            </div>
        </div>

        <!-- Division, Bureau, Supérieur hiérarchique -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <label for="division" class="form-label">Division</label>
                <input type="text" class="form-control" id="division" name="division" placeholder="Division" required>
            </div>

            <div class="col-md-4 mb-4">
                <label for="bureau" class="form-label">Bureau</label>
                <input type="text" class="form-control" id="bureau" name="bureau" placeholder="Bureau" required>
            </div>

            <div class="col-md-4 mb-4">
                <label for="superieurHierarchique" class="form-label">Nom supérieur hiérarchique</label>
                <input type="text" class="form-control" id="superieurHierarchique" name="superieurHierarchique" placeholder="Nom supérieur hiérarchique" required>
            </div>
        </div>

        <!-- Infos personne à contacter en cas d'urgence -->
        <center><h5 class="mb-4">Infos personne en cas d'urgence</h5></center>
        <div class="row">
            <div class="col-md-4 mb-4">
                <label for="nomContactUrgence" class="form-label">Nom complet de la personne</label>
                <input type="text" class="form-control" id="nomContactUrgence" name="nomContactUrgence" placeholder="Nom complet" required>
            </div>

            <div class="col-md-4 mb-4">
                <label for="lienAvecEmploye" class="form-label">Lien avec l'employé</label>
                <input type="text" class="form-control" id="lienAvecEmploye" name="lienAvecEmploye" placeholder="Lien avec l'employé" required>
            </div>

            <div class="col-md-4 mb-4">
                <label for="telephoneContactUrgence" class="form-label">N° Téléphone de la personne</label>
                <input type="text" class="form-control" id="telephoneContactUrgence" name="telephoneContactUrgence" placeholder="Téléphone" required>
            </div>
        </div>

        <center>
            <button type="submit" class="btn btn-success btn-lg" name="envoi">Soumettre <i class="bi bi-send"></i></button>
        </center>
        <br>
        <center>
        <a class="btn btn-outline-primary" href="deconnexion.php">déconnexion</a>
        </center>
    </form>
</div>

<footer>
    <p>© 2024 BTC. Tous droits réservés.</p>
    <p>
        <a href="#">Politique de confidentialité</a> | 
        <a href="#">Conditions d'utilisation</a>
    </p>
    <nav>
        <a href="#">Aide</a>
        <a href="#">Contact</a>
        <a href="#">FAQ</a>
    </nav>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-7j2z3q3U9kPjv6zC0i3N1i5o5Z9W8Ee4mX1NnF8M3lRz4Dq1G6G4G8nAq3CQ9z3y" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



</body>
</html>
    