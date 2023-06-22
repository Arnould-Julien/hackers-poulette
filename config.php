<?php
// config.php
 

define('DB_HOST', 'files.000webhost.com');
define('DB_NAME', 'formulaire');
define('DB_USER', 'trucmachinchouette');
define('DB_PASSWORD', 'Rc*L24swiKgVitEI5C2J ');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configuration des options PDO si nécessaire
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

$sql = "SELECT * FROM ma_table WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = null; // Fermeture de la connexion
