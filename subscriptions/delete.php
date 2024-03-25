<?php
// Avoid direct access to this file
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: /");
  exit(); 
}

// Include the database connection
require_once "../includes/db.php";

// Prepare the delete query
$query = $bdd->prepare("DELETE FROM subscribers WHERE id = :id");
$query->execute([
  "id" => $_POST['id']
]);

// Redirect to the subscriptions page
header("Location: /subscriptions/?delete=1");
exit();
