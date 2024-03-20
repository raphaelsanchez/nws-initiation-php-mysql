<?php
/**
 * TRAITEMENT DU RETOUR
 * ------------------------------
 * Ici nous allons conditionner un message en fonction d'un paramètre "register" passé en GET dans l'URL.
 * exemple : /merci.php?register=subscribers
 * 
 * Cela nous permettra d'afficher un message de confirmation personnalisé en fonction de l'action effectuée.
 */

/**
 * PAGE METAS
 */
$meta_title = "Inscription réussie";
$meta_robot = "noindex, nofollow";

/**
 * VALIDATION CONDITIONNELLE
 * ------------------------------
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

/* SI, "register" est égal à "subscribers" on affiche le message correspondant */
if (isset($_GET['success']) && $_GET['success'] === "subcribed") {
  $page_title = "Merci ! 🙏";
  $page_content = "Vous êtes maintenant bien inscrit à notre newsletter.<br>Vous recevrez bientôt de nous nouvelle.";
  $message_type= "success";
} 
/** 
 * SINON, si il n'y a pas de paramettre, c'est que nous n'avons rien à faire ici !
 * Alors on redirige l'utilisateur vers la page d'accueil.
 */
else {
  header("Location: /");
  exit(); // On arrête l'exécution du script après la redirection
}


/* Includes du header */
include "partials/header.php"; 
?> <!-- On ferme ici la balise PHP pour commencer à écrire du HTML -->

<main class="container">
  
  <section class="text-center">
    <h1><?php echo $page_title ?></h1>
    <p><?php echo $page_content ?></p>
    <br>
    <a href="/" role="button">Revenir à l'accueil</a>
  </section>

</main>

<!-- On ouvre à nouveau la balise PHP pour réécrire du code PHP -->
<?php
/* Includes du footer */
include "partials/footer.php"; 