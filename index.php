<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de contact</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <h1>Hackers Poulette</h1>
    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier les valeurs
        $errors = array();

        function clean_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $nom = clean_input($_POST["nom"]);
        if (strlen($nom) < 2 || strlen($nom) > 255) {
            $errors[] = "Le nom doit contenir entre 2 et 255 caractères.";
        }

        $prenom = clean_input($_POST["prenom"]);
        if (strlen($prenom) < 2 || strlen($prenom) > 255) {
            $errors[] = "Le prénom doit contenir entre 2 et 255 caractères.";
        }

        $email = clean_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse e-mail n'est pas valide.";
        }

        $description = clean_input($_POST["description"]);
        if (strlen($description) < 2 || strlen($description) > 1000) {
            $errors[] = "La description doit contenir entre 2 et 1000 caractères.";
        }

        // Vérifier si le fichier a été téléchargé avec succès
        $fichier = $_FILES["fichier"];
        if ($fichier["error"] == 0) {
            $extensions_valides = array("jpg", "jpeg", "png", "gif");
            $extension_upload = strtolower(pathinfo($fichier["name"], PATHINFO_EXTENSION));
            if (!in_array($extension_upload, $extensions_valides) || $fichier["size"] > 2 * 1024 * 1024) {
                $errors[] = "Le fichier doit être au format jpg, png, gif et ne doit pas dépasser 2 Mo.";
            }
        }
    }
    ?>

    <?php if (!empty($errors)) : ?>
        <h2>Erreurs :</h2>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        <br><br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
        <br><br>
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="fichier">Déposer un fichier :</label>
        <input type="file" id="fichier" name="fichier">
        <br><br>
        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>
        <br><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
