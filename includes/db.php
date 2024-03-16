<?php
/**
 * CONNEXION À LA BASE DE DONNÉE
 * ------------------------------
 * On crée des constante pour stocker les informations de connexion à la base de donnée
 */
define("DB_HOST", "localhost");
define("DB_NAME", "local");
define("DB_USER", "root");
define("DB_PASS", "root");

/**
 * puis utilise la fonction PHP PDO pour se connecter à la base de donnée
 * que l'on stocke dans une variable $bdd. Cette variable sera utilisée pour faire des requêtes SQL.
 * Enfin, on utilise la fonction try/catch pour gérer les erreurs éventuelles de connexion.
 */
try {
  $bdd = new PDO("mysql:host=localhost;dbname=".DB_NAME, DB_USER, DB_PASS);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
  die();
}

/**
 * Nous pouvons maintenant utiliser la variable $bdd pour faire des requêtes SQL
 * exemple : $bdd->query("SELECT * FROM table");
 */