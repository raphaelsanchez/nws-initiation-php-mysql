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
 * VÉRIFICATION
 * ------------------------------
 * Avant d'insérer l'adresse email dans la base de donnée, nous devons vérifier que l'adresse email est valide.
 * Pour cela, nous allons utiliser la fonction PHP filter_var() avec le filtre FILTER_VALIDATE_EMAIL
 * 
 * On stocke le résultat de la fonction filter_var() dans une variable $sanitizedEmail
 * 
 * filter_var() va retourner l'adresse email si elle est valide, sinon false
 * 
 * Voir : https://www.php.net/manual/fr/function.filter-var.php
 */
$sanitizedEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);


/**
 * Donc, on teste si l'adresse email est invalide avec un "if".
 * Si l'adresse email n'est pas valide, on redirige l'utilisateur d'où il vient avec un message d'erreur.
 * et on arrête l'exécution du script avec "exit()".
 * 
 * Note : On utilise la fonction header() avec "Location" en argument pour indiquer l'URL de la page de destination
 * et on y passe un paramètre "error" pour indiquer le type d'erreur.
 * C'est en fonction de ce paramètre que l'on pourra afficher un message d'erreur personnalisé dans la page de destination.
 */
if (!$sanitizedEmail) {
  header("Location: /?error=invalid_email");
  exit(); // On arrête l'exécution du script après la redirection
}

/**
 * Si l'adresse email est valide, on peut continuer le traitement.
 * On vérifie, en suite, si l'email est déjà enregistré dans la base de donnée.
 * Pour cela, on utilise la méthode prepare() de la variable $bdd pour préparer la requête
 * - SELECT * FROM subscribers WHERE email = :email : on "sélectionne" "toutes" les données "depuis" la table "subscribers" "où" l'email est égal à :email
 * - Enfin, on stocke la requête dans une variable $emailExistenceCheckQuery
 */
$emailExistenceCheckQuery = $bdd->prepare("SELECT * FROM subscribers WHERE email = :email");

/**
 * Ensuite, on utilise la méthode execute() de la variable $emailExistenceCheckQuery pour exécuter la requête
 * On passe un tableau associatif en argument de la méthode execute()
 * Ce tableau contient les valeurs à insérer dans la requête
 * Ici, on insère la valeur de $_POST['email'] dans le marqueur :email
 * 
 * Voir : https://www.php.net/manual/fr/pdostatement.execute.php
 */
$emailExistenceCheckQuery->execute([
  "email" => $_POST['email']
]);

/**
 * Enfin, on utilise la méthode fetch() de la variable $emailExistenceCheckQuery pour récupérer le résultat de la requête
 * On stocke le résultat dans une variable $subscribed
 * 
 * Voir : https://www.php.net/manual/fr/pdostatement.fetch.php
 */
$subscribed = $emailExistenceCheckQuery->fetch();

/**
 * Ensuite, on vérifie si l'adresse email est déjà enregistrée dans la base de donnée avec un "if".
 * Si l'adresse email est déjà enregistrée, on redirige l'utilisateur d'où il vient avec un message d'erreur.
 */
if ($subscribed) {
  header("Location: /?error=already_subscribed");
  exit();
}

/**
 * EXECUTION DE LA REQUÊTE PRINCIPALE
 * ------------------------------
 * Enfin, si l'adresse email est valide et n'est pas déjà enregistrée, on peut insérer l'adresse email dans la base de donnée.
 * 
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
*
* Voir : https://www.php.net/manual/fr/function.header.php
*/
header("Location: /merci.php?success=subscribed");
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