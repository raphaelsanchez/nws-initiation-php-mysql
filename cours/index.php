<?php
require_once "../includes/db.php";

$query = $bdd->query("SELECT * FROM reservations ORDER BY id DESC");
$reservations= $query->fetchAll(PDO::FETCH_OBJ);

include '../partials/header.php';

if (isset($_GET['success'])) 
{
    $message_type = "success";
    if ($_GET['success'] === "created") {
        $message = "La réservation à été ajoutée avec succès.";
    }
    if ($_GET ['success'] === "deleted"){
        $message = "La réservation à été supprimée avec succès.";
    }
    if ($_GET['success'] === "updated"){
        $message = "La réservation à été modifié avec succès.";
    }
}

$description = "Envie de réserver votre cours personnalisé ? Remplissez notre formulaire pour réserver selon vos préférences.";
$titre = "Réserver votre cours personnalisé";


?>



<main class="container">

   <?php

if (isset($message)) : ?>
  <p data-notice="<?= $message_type ?>">
  <span><?= $message ?></span>
  <i data-feather="x" data-close></i>
  
</p> 
<?php endif; ?>


    <h1><?php echo $titre ?></h1>

    <h6><?php echo "$description"?></h6>

    <form action="create.php" method="POST">
        <label for="lastname">Nom</label>
        <input type="text" id="lastname" name="nom" placeholder="Indiquez votre nom">

        <label for="firstname">Prénom</label>
        <input type="text" id="fisrtname" name="prenom" placeholder="Indiquez votre prénom">

        <label for="years_old">🧒Âge</label>
        <input type="number" id="years_old" name="age" placeholder="Indiquez votre âge">

        <label for="phone_number">📞Numéro de Téléphone</label>
        <input type="number" id="phone_number" name="telephone" placeholder="Saisissez votre numéro de téléphone">

        <label for="email">✉️Adresse Email</label>
        <input type="email" id="email" name="email" placeholder="Saisissez votre adresse email">

        <label for="date">📆Date de réservation</label>
        <input type="date" id="date" name="date" placeholder="Choisissez votre jour de réservation">

        <label for="hour">⏰Heure de réservation</label>
        <input type="time" id="hour" name="heure" placeholder="Choisissez votre heure de réservation">

        <label for="cours">🏋️‍♂️Choisissez votre cours</label>
        <select id="cours" name="cours" placeholder="Choisissez votre cours">
            <option value="Renforcement musculaire">Renforcement musculaire</option>
            <option value="Développement force">Développement force</option>
            <option value="Cardio Training">Cardio Training</option>
            <option value="Cross Training">Cross Training</option>
        </select>

        <label for="coach">🥇Choisissez votre coach</label>
        <input type="num" name="coach" id="coach" placeholder="Choisissez votre coach">

        <label for="genre">♀️♂️Choisissez votre genre</label>
        <select id="genre" name="genre" placeholder="Indiquez votre genre">
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            <option value="Autre">Autre</option>
        </select>

        <button>Envoyer</button>

        

    </form>

</main>



<?php
require '../partials/footer.php'; ?>