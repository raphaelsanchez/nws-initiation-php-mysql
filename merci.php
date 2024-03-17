<?php
/* Page variables */
$meta_title = "Merci ! 🙏";
$meta_description = "Merci pour votre inscription à notre newsletter !";

/**
 * TRAITEMENT DU RETOUR
 * ------------------------------
 * Ici nous allons conditionner un message en fonction d'un paramètre "register" passé en GET dans l'URL.
 * exemple : /merci.php?register=subscribers
 * 
 * Cela nous permettra d'afficher un message de confirmation personnalisé en fonction de l'action effectuée.
 */

/* On commence par initialiser la variable $success_message pour éviter les erreur */
$page_title = "";
$success_message = "";


/**
 * VALIDATION CONDITIONNELLE
 * en fonction du paramètre "register" passé en GET dans l'URL
 * 
 * On utilise la fonction isset() pour vérifier si le paramètre "register" est bien présent dans l'URL
 * Si c'est le cas, on utilise la fonction $_GET['register'] pour récupérer la valeur du paramètre "register"
 * 
 * Ensuite, on utilise une série de conditions "if...elseif...else" pour afficher un message personnalisé en fonction de la valeur du paramètre "register"
 * 
 * Si le paramètre "register" n'est pas présent dans l'URL, on affiche un message par défaut.
 * 
 * NOTE : on aurait pu utiliser un switch() à la place des conditions if...elseif...else
 * mais dans ce cas, les conditions if...elseif...else sont plus adaptées car elles permettent de gérer des conditions plus complexes.
 * 
 * Voyons pas à pas comment cela fonctionne...
 */

/* SI, le paramètre "register" est bien présent dans l'URL */
if (isset($_GET['register'])) {

  /* SI, "register" est égal à "subscribers" on affiche le message correspondant */
  if ($_GET['register'] === "subscribers") {
    $page_title = "Merci ! 🙏";
    $success_message = "Vous êtes maintenant bien inscrit à notre newsletter.<br>Vous recevrez bientôt de nous nouvelle.";
  } 

  /* SINON SI, "register" est égale à "user" */
  else if ($_GET['register'] === "users") {
    $page_title = "Super ! 🚀";
    $success_message = "Votre compte a bien été créé.<br> Vous pouvez maintenant <a href='/login.php'>vous connecter</a>.";
  }

  /* SINON, on affiche un message par défaut */
  else {
    $page_title = "Bravo ! 👏";
    $success_message = "L'enregistrement en base de donnée c'est bien passé.";
  }
} 
/* SINON, (le paramètre "register" n'est pas présent dans l'URL) on renvoi un autre message et on change le titre */
else {  
  $page_title = "Oups ! 🙊";
  $success_message = "Une erreur est survenue, veuillez réessayer plus tard...";
}

/* Includes du header */
include "partials/header.php"; 
?> <!-- On ferme ici la balise PHP pour commencer à écrire du HTML -->

<main class="container">
  
  <section class="text-center">
    <h1><?php echo $page_title ?></h1>
    <p><?php echo $success_message ?></p>
    <br>
    <a href="/" role="button">Revenir à l'accueil</a>
  </section>

</main>

<!-- On ouvre à nouveau la balise PHP pour réécrire du code PHP -->
<?php
/* Includes du footer */
include "partials/footer.php"; 