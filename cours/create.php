<h1>Les réservations</h1>

<?php
require_once "../includes/db.php";

 echo "<pre>";
 print_r($_POST);
 echo "</pre>";

// echo $_POST ['nom']. "<br>" ;
// echo $_POST ['prenom']. "<br>" ;
// echo $_POST ['age']. "<br>" ;
// echo $_POST ['telephone']. "<br>" ;
// echo $_POST ['email']. "<br>" ;
// echo $_POST ['date']. "<br>" ;
// echo $_POST ['heure']. "<br>" ;
// echo $_POST ['cours']. "<br>" ;
// echo $_POST ['coach']. "<br>" ;
// echo $_POST ['genre']. "<br>" ;


require_once "../includes/db.php";

$query = $bdd->prepare("
INSERT INTO reservations
SET 
nom=:nom, 
prenom=:prenom, 
age=:age, 
telephone=:telephone, 
email=:email, 
date=:date, 
heure=:heure, 
cours=:cours, 
coach=:coach, 
genre=:genre
");

$query->execute([
    "nom" => $_POST['nom'],
    "prenom" => $_POST['prenom'],
    "age" => $_POST['age'],
    "telephone" => $_POST['telephone'],
    "email" => $_POST['email'],
    "date" => $_POST['date'],
    "heure" => $_POST['heure'],
    "cours" => $_POST['cours'],
    "coach" => $_POST['coach'],
    "genre" => $_POST['genre']
]);

header("Location: index.php?success=created");
exit();

?>