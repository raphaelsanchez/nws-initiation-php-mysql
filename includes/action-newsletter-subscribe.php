<?php
/**
 * CONNEXION À LA BASE DE DONNÉE
 * ------------------------------
 * Nous devons donc, avant tout, nous connecter à la base de donnée.
 * Pour cela, on va inclure le fichier d'initialisation qui contient la connexion à la base de donnée.
 */ 
include "../includes/db.php";
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
 */
$query = $bdd->prepare("INSERT INTO subscribers (email, subscribed_at) VALUES (:email, NOW())");

/**
 * EXÉCUTION DE LA REQUÊTE SQL
 * ------------------------------
 * ATTENTION : Ne JAMAIS faire confiance aux données utilisateurs ! J-A-M-A-I-S !!!!
 *
 * On commence donc par échapper les données utilisateurs avant de les insérer dans la base de donnée
 * grâce à la fonction htmlspecialchars() qui transforme les caractères spéciaux en entités HTML
 * afin d'éviter les failles XSS (Cross-Site Scripting).
 */ 
$sanitizedEmail = htmlspecialchars($_POST['email']);

/**
 * Enfin, on utilise la méthode execute() de la variable $query pour exécuter la requête
 * On passe un tableau associatif en argument de la méthode execute()
 * Ce tableau contient les valeurs à insérer dans la requête
 * Ici, on insère la valeur de $sanitizedEmail dans le marqueur :email
 */
$query->execute([
  "email" => $sanitizedEmail
]);

/** On ferme la requête */
$query->closeCursor();

/**
 * Pour les besoins de l'exercice, on va afficher un message de confirmation
 * pour indiquer à l'utilisateur que son adresse email a bien été enregistrée
 * dans la base de donnée.
 *
 * NOTE : dans un vrai projet, on redirigerai l'utilisateur vers une autre page...
 */
echo "Votre adresse <strong>" . $sanitizedEmail . "</strong> a bien été enregistrée dans la base de donnée ! 🚀";
echo "<br>";
echo "<a href='/merci.php?register=subscribers'>Aller à la page de remerciement</a>";

/**
 * Super ! on a réussi à enregistrer l'adresse email dans la base de donnée.
 * maintenant, on pourrait rediriger l'utilisateur vers une autre page pour lui afficher un message de remerciement.
 */

/**
* REDIRECTION
* ------------------------------
* Cette fonction prend en paramettre "Location" en argument pour indiquer l'URL de la page de destination
* ex: header("Location: /merci.php");
* on peut aussi passer des paramètres dans l'URL que l'on pourra récupérer avec $_GET
* cela peut être utile pour afficher un message de confirmation par exemple
* ex: header("Location: /merci.php?register=subscribers");
*
* Décommenter la ligne ci-dessous commencant par // pour rediriger l'utilisateur vers la page de remerciement
*/
// header("Location: /merci.php?register=subscribers");

/**
* REMARQUES :
* Il s'agit ici d'un exemple très simple pour illustrer le principe de base de l'inscription à une newsletter.
* Dans un vrai projet, on pourrait ajouter des fonctionnalités supplémentaires :
* - vérifier que l'adresse email n'est pas déjà enregistrée dans la base de donnée
* - envoyer un email de confirmation à l'utilisateur
* - envoyer un email à l'administrateur pour l'informer de la nouvelle inscription
* - etc...
*/
