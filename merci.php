<?php
// Meta information
$meta_title = "Inscription réussie";
$meta_robot = "noindex, nofollow";

// Message de confirmation
if (isset($_GET['success']) && $_GET['success'] === "subcribed") {
  $page_title = "Merci ! 🙏";
  $page_content = "Vous êtes maintenant bien inscrit à notre newsletter.<br>Vous recevrez bientôt de nous nouvelle.";
  $message_type= "success";
} else {
  header("Location: /");
  exit(); 
}

include "partials/header.php"; ?> 

<main class="container">
  
  <section class="text-center">
    <h1><?php echo $page_title ?></h1>
    <p><?php echo $page_content ?></p>
    <br>
    <p><a href="/#explications" role="button">Revenir à l'accueil</a></p>
  </section>

</main>

<?php
include "partials/footer.php"; 