<?php
/**
 * CONNEXION À LA BASE DE DONNÉE
 * ------------------------------
 * Nous devons donc, avant tout, nous connecter à la base de donnée.
 * Pour cela, on va inclure le fichier d'initialisation qui contient la connexion à la base de donnée.
 * 
 * On utilise la "require_once" pour inclure le fichier "db.php" qui contient la connexion à la base de donnée.
 * Notez que le chemin du fichier est relatif à la position du fichier "action-newsletter-subscribe.php".
 * 
 * Voir : https://www.php.net/manual/fr/function.require-once.php
 */ 
require_once "../includes/db.php";

/**
 * PRÉPARATION DE LA REQUÊTE SQL
 * ------------------------------
 * Nous utilisons la fonction SQL INSERT INTO pour insérer l'adresse email dans la table "subscribers"
 * - On va aussi insérer la date de soumission dans la colonne "subscribed_at"
 *   grace la fonction SQL NOW() qui retourne la date actuelle
 * - On utilise la méthode prepare() de la variable $bdd pour préparer la requête
 * - INSERT INTO subscribers : on "insère" des données dans la table "subscribers"
 * - (email, subscribed_at) : dans les colonnes "email" et "subscribed_at"
 * - VALUES (:email, NOW()) : on insère les valeurs :email et la date actuelle
 * - Enfin, on stocke la requête dans une variable $query
 * 
 * Note : On aurait pu aussi utiliser $bdd->query() pour exécuter une requête SQL directement
 * mais c'est une mauvaise pratique car cela expose le site à des failles de sécurité (injection SQL)
 * Il est préférable d'utiliser $bdd->prepare() pour préparer la requête et échapper les données utilisateurs
 * 
 * Voir : https://www.php.net/manual/fr/pdo.prepare.php
 * Voir : https://sql.sh/cours/insert-into
 */
$query = $bdd->prepare("INSERT INTO subscribers (email, subscribed_at) VALUES (:email, NOW())");

/**
 * Enfin, on utilise la méthode execute() de la variable $query pour exécuter la requête
 * On passe un tableau associatif en argument de la méthode execute()
 * Ce tableau contient les valeurs à insérer dans la requête
 * Ici, on insère la valeur de $sanitizedEmail dans le marqueur :email
 * 
 * Voir : https://www.php.net/manual/fr/pdostatement.execute.php
 */
$query->execute([
  "email" => $_POST['email']
]);

/**
* REDIRECTION
* ------------------------------
* La fonction header() prend en paramètre "Location" en argument pour indiquer l'URL de la page de destination
* ex: header("Location: /merci.php");
*
* On peut aussi passer des paramètres dans l'URL que l'on pourra récupérer avec $_GET dans la page de destination.
* Cela peut être utile pour afficher un message de confirmation par exemple
* ex: header("Location: /merci.php?register=subscribers");
*
* Voir : https://www.php.net/manual/fr/function.header.php
*/
header("Location: /merci.php?register=subscribers");

/**
 * Très important : on arrête l'exécution du script avec la fonction exit() après une redirection
 */
exit();

/**
* REMARQUES :
* ------------------------------
* Il s'agit ici d'un exemple très simple pour illustrer le principe de base de l'inscription à une newsletter.
* Dans un vrai projet, on pourrait ajouter des fonctionnalités supplémentaires :
* - vérifier que l'adresse email n'est pas déjà enregistrée dans la base de donnée
* - envoyer un email de confirmation à l'utilisateur
* - envoyer un email à l'administrateur pour l'informer de la nouvelle inscription
* - etc...
* 
* ... mais pour l'instant, nous nous concentrons sur les bases.
*/

/**
 * Super !! Nous venons de voir le "C" (Create) de CRUD, passons maintenant à la lecture des données.
 * Rendez-vous dans le fichier "subscriptions/index.php" pour la suite.
 */