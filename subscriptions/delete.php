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
 * On va supprimer un abonné de la base de donnée
 * Pour cela, on va utiliser la fonction SQL DELETE FROM pour supprimer un abonné de la table "subscribers"
 * - On utilise la méthode prepare() de la variable $bdd pour préparer la requête
 * - DELETE FROM subscribers WHERE id = :id : on "supprime" un abonné "depuis" la table "subscribers" "où" l'id est égal à :id
 * - Enfin, on stocke la requête dans une variable $query
 * 
 * Note : On aurait pu aussi utiliser $bdd->query() pour exécuter une requête SQL directement
 * mais c'est une mauvaise pratique car cela expose le site à des failles de sécurité (injection SQL)
 * Il est préférable d'utiliser $bdd->prepare() pour préparer la requête et échapper les données utilisateurs
 * 
 * Voir : https://www.php.net/manual/fr/pdo.prepare.php
 * Voir : https://sql.sh/cours/delete
 */
$query = $bdd->prepare("DELETE FROM subscribers WHERE id = :id");

/**
 * Enfin, on utilise la méthode execute() de la variable $query pour exécuter la requête
 * On passe un tableau associatif en argument de la méthode execute()
 * Ce tableau contient les valeurs à insérer dans la requête
 * Ici, on insère la valeur de $_GET['id'] dans le marqueur :id
 * 
 * Note : on utilise $_GET pour récupérer l'id de l'abonné à supprimer depuis l'URL
 * ex: /subscriptions/delete.php?id=1
 * 
 * Voir : https://www.php.net/manual/fr/reserved.variables.get.php
 */
$query->execute([
  "id" => $_GET['id']
]);

/**
 * REDIRECTION
 * ------------------------------
 * Nous allons rediriger l'utilisateur vers la page subscriptions/index.php après la suppression de l'abonné
 * pour qu'il puisse voir la liste des abonnés mise à jour.
 * 
 * Nous utilisons la fonction header() avec "Location" en argument pour indiquer l'URL de la page de destination
 * en lui passant un paramètre "delete=subscribers" pour afficher un message de confirmation.
 * 
 * ex: header("Location: /index.php?delete=1");
 * 
 * Voir : https://www.php.net/manual/fr/function.header.php
 */
header("Location: /subscriptions/index.php?delete=1");
exit(); // On arrête l'exécution du script après la redirection

/**
 * Génial !! Nous venons de voir le "D" (Delete) de CRUD !.
 * Mais, nous n'avons pas vue le "U" (Update) ?
 * 
 * C'est vrai, nous n'avons pas encore vu comment mettre à jour un abonné dans la base de donnée.
 * Vous en avez déjà une idée ?
 * 
 * Petit challenge : comment pourrions-nous mettre à jour un abonné dans la base de donnée ?
 * 
 * INDICES : 
 * nous aurons besoin de plusieurs éléments : 
 * - une action PHP pour afficher le formulaire de mise à jour.
 * - une nouvelle page PHP pour traiter le formulaire de mise à jour.
 * - une requête SQL UPDATE pour mettre à jour les données de l'abonné.
 * Voir : https://sql.sh/cours/update
 * 
 * À vous de jouer ! 🚀
 */
