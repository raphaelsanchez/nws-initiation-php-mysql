<?php
// Définit les constantes pour la connexion à la base de donnée
define("DB_HOST", "localhost");
define("DB_NAME", "local");
define("DB_USER", "root");
define("DB_PASS", "root");

// Connexion à la base de donnée
try {
  $bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
  die();
}
