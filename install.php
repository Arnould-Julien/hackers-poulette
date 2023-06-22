<?php
require 'install.php' 

$host = 'files.000webhost.com';
$dbname = 'formulaire';
$username = 'trucmachinchouette';
$password = 'Rc*L24swiKgVitEI5C2J ';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configuration des options PDO si nécessaire
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

