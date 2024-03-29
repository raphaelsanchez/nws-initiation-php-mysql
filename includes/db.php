<?php
/**
 * CONNEXION À LA BASE DE DONNÉE
 * ------------------------------
 * Ici, on stocke les informations de connexion à la base de donnée (hôte, nom de la base, utilisateur, mot de passe).
 *
 * On crée des constante pour stocker les informations de connexion à la base de donnée.
 * Les constantes sont des variables qui ne peuvent pas être modifiées une fois qu'elles ont été définies.
 * Elles sont utiles pour stocker des informations qui ne doivent pas être modifiées dans le code.
 * 
 * Ces informations sont propres à chaque projet et doivent être modifiées en fonction de la configuration de votre serveur.
 * 
 * Voir : https://www.php.net/manual/fr/language.constants.php
 */
define("DB_HOST", "localhost");
define("DB_NAME", "local");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_PORT", "10017");

/**
 * Puis utilise la fonction PHP PDO pour se connecter à la base de donnée.
 * On utilise un bloc "try...catch" pour gérer les erreurs de connexion.
 * Si une erreur se produit, on affiche un message d'erreur et on arrête l'exécution du script avec la fonction die().
 * Sinon, on stocke la connexion dans une variable $bdd pour l'utiliser plus tard.
 * exemple : $bdd->query("SELECT * FROM table");
 * 
 * Voir : https://www.php.net/manual/fr/pdo.construct.php
 */
try {
  $bdd = new PDO("mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME, DB_USER, DB_PASS);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
  die();
}
