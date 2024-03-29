<?php
require_once "../includes/db.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST['reservation_id']);
    // Récupération des données du formulaire

    

    // Préparation et exécution de la requête de mise à jour
    $update_query = $bdd->prepare("UPDATE reservations SET 
            nom = :nom, 
            prenom = :prenom, 
            age = :age, 
            telephone = :telephone, 
            email = :email, 
            date = :date, 
            heure = :heure, 
            cours = :cours,
            coach = :coach,
            genre = :genre
        WHERE 
            id = :reservation_id");

    $update_query->execute([
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'age' => $_POST['age'],
        'telephone' => $_POST['telephone'],
        'email' => $_POST['email'],
        'date' => $_POST['date'],
        'heure' => $_POST['heure'],
        'cours' => $_POST['cours'],
        'coach' => $_POST['coach'],
        'genre' => $_POST['genre'],
        'reservation_id' => $_POST['reservation_id']
    ]);
    
    header("Location: index.php?success=updated");
    exit;
} else {
    echo "Méthode non autorisée.";
    exit;
}
    ?>

<?php
require_once "../includes/db.php";
    
