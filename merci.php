<?php
/**
 * INTRUCTIONS
 * ------------------------------
 * 
 * Cette page "merci.php" est la page de confirmation après un enregistrement en base de donnée.
 */

/**
 * PAGE VARIABLES
 * ------------------------------
 */
$page_title = "Merci ! 🙏";
$page_description = "Merci pour votre inscription à notre newsletter !";

/**  
 * HEADER
 * ------------------------------
 * En PHP, on peut séparer notre code en plusieurs fichiers pour le rendre plus lisible et plus facile à maintenir.
 * Ici, nous avons un fichier "header.php" qui contient tout le code HTML de l'entête de notre site avec
 * les balises <html>, <head>, <meta>, <title>, <link>, <script> ainsi que la balise d'ouverture <body>.
 */
include "partials/header.php"; 

/**
 * TRAITEMENT DU RETOUR
 * ------------------------------
 * Ici nous allons conditionner un message en fonction d'un paramètre "register" passé en GET dans l'URL.
 * exemple : /merci.php?register=subscribers
 * Pour cela, nous allons utiliser une structure conditionnelle "if...else" pour vérifier si le paramètre "register" est présent dans l'URL.
 */

/* On commence par initialiser la variable $success_message pour éviter les erreur */
$success_message = "";

/* SI, le paramètre "register" est bien présent dans l'URL */
if (isset($_GET['register'])) {
  /* SI, "register" est égal à "newsletter" on affiche le message correspondant */
  if ($_GET['register'] === "subscribers") {
    $success_message = "Vous êtes bien inscrit à notre newsletter";
  } 
  /* SINON SI, "register" est égale à "user" */
  else if ($_GET['register'] === "user") {
    $success_message = "Votre compte a bien été créé";
  }
  /* SINON, on affiche un message par défaut */
  else {
    $success_message = "L'enregistrement c'est bien passé";
  }
} 
/* SINON, (le paramètre "register" n'est pas présent dans l'URL) on renvoi un autre message et on change le titre */
else {  
  $page_title = "Oups ! 😕";
  $success_message = "Une erreur est survenue, veuillez réessayer plus tard.";
}

/**
 * MAIN CONTENT
 * ------------------------------
 * Le contenu principal de la page est ici.
 */
?> <!-- On ferme ici la balise PHP pour commencer à écrire du HTML -->

<main class="container">
  
  <section class="text-center">
    <h1><?php echo $page_title ?></h1>
    <p><?php echo $success_message ?></p>
    <a href="/" role="button">Revenir à l'accueil</a>
  </section>

</main>

<!-- On ré-ouvre la balise PHP pour à nouveau écrire du code PHP -->
<?php
// FOOTER
// ------------------------------
// On inclut le fichier "footer.php" qui contient la balise de fermeture </body></html>
include "partials/footer.php"; 