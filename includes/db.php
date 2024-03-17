<?php
/**
 * CONNEXION À LA BASE DE DONNÉE
 * ------------------------------
 * On crée des constante pour stocker les informations de connexion à la base de donnée.
 * Les constantes sont des variables qui ne peuvent pas être modifiées une fois qu'elles ont été définies.
 * Elles sont utiles pour stocker des informations qui ne doivent pas être modifiées dans le code.
 */
define("DB_HOST", "localhost");
define("DB_NAME", "local");
define("DB_USER", "root");
define("DB_PASS", "root");

/**
 * Puis utilise la fonction PHP PDO pour se connecter à la base de donnée.
 * On utilise un bloc "try...catch" pour gérer les erreurs de connexion.
 * Si une erreur se produit, on affiche un message d'erreur et on arrête l'exécution du script avec la fonction die().
 * Sinon, on stocke la connexion dans une variable $bdd pour l'utiliser plus tard.
 * exemple : $bdd->query("SELECT * FROM table");
 */
try {
  $bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
  die();
}
