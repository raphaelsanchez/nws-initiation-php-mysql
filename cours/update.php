<?php
require_once "../includes/db.php";

// Vérifiez si un identifiant de réservation est fourni dans l'URL
if(isset($_GET['id'])) {
    $reservation_id = $_GET['id'];
    
    // Requête pour récupérer les détails de la réservation à modifier
    $query = $bdd->prepare("SELECT * FROM reservations WHERE id = :id");
    $query->execute(array('id' => $reservation_id));
    $reservation = $query->fetch(PDO::FETCH_OBJ);

    // Vérifiez si la réservation existe
    if(!$reservation) {
        echo "Réservation non trouvée.";
        exit;
    }
} else {
    echo "ID de réservation non spécifié.";
    exit;
}

include '../partials/header.php';

$description = "Modifiez vos informations de réservations ci dessous.";
$titre = "Modifier votre réservation";

?>

<main class="container">
    <h1><?php echo $titre ?></h1>
    <h6><?php echo "$description" ?></h6>

    <form action="save.php" method="POST">

        <label for="lastname">Nom</label>
        <input type="text" id="lastname" name="nom" placeholder="Indiquez votre nom" value="<?php echo $reservation->nom ?>">

        <label for="firstname">Prénom</label>
        <input type="text" id="fisrtname" name="prenom" placeholder="Indiquez votre prénom" value="<?php echo $reservation->prenom ?>">

        <label for="years_old">🧒Âge</label>
        <input type="number" id="years_old" name="age" placeholder="Indiquez votre âge" value="<?php echo $reservation->age ?>">

        <label for="phone_number">📞Numéro de Téléphone</label>
        <input type="number" id="phone_number" name="telephone" placeholder="Saisissez votre numéro de téléphone" value="<?php echo $reservation->telephone ?>">

        <label for="email">✉️Adresse Email</label>
        <input type="email" id="email" name="email" placeholder="Saisissez votre adresse email" value="<?php echo $reservation->email ?>">

        <label for="date">📆Date de réservation</label>
        <input type="date" id="date" name="date" placeholder="Choisissez votre jour de réservation" value="<?php echo $reservation->date ?>">

        <label for="hour">⏰Heure de réservation</label>
        <input type="time" id="hour" name="heure" placeholder="Choisissez votre heure de réservation" value="<?php echo $reservation->heure ?>">

        <label for="cours">🏋️‍♂️Choisissez votre cours</label>
        <select id="cours" name="cours" placeholder="Choisissez votre cours" value="<?php echo $reservation->cours ?>">
            <option value="Renforcement musculaire">Renforcement musculaire</option>
            <option value="Développement force">Développement force</option>
            <option value="Cardio Training">Cardio Training</option>
            <option value="Cross Training">Cross Training</option>
        </select>

        <label for="coach">🥇Choisissez votre coach</label>
        <input type="num" name="coach" id="coach" placeholder="Choisissez votre coach" value="<?php echo $reservation->coach ?>">

        <label for="genre">♀️♂️Choisissez votre genre</label>
        <select id="genre" name="genre" placeholder="Indiquez votre genre" value="<?php echo $reservation->genre ?>">
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            <option value="Autre">Autre</option>
        </select>

        <!-- Autres champs à pré-remplir avec les valeurs existantes -->

        <button type="submit">Sauvegarder mes modifications</button>
        <input type="hidden" name="reservation_id" value="<?php echo $reservation_id ?>">
    </form>
</main>

<?php require '../partials/footer.php'; ?>