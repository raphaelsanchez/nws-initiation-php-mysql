<?php
// Avoid direct access to this file
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header("Location: /");
  exit(); // On arrête l'exécution du script après la redirection
}

// Include the database connection
require_once "../includes/db.php";

// Prepare the delete query
$query = $bdd->prepare("INSERT INTO subscribers (email, subscribed_at) VALUES (:email, NOW())");

// Sanitize the email
$sanitizedEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

if (!$sanitizedEmail) {
  $previousPage = $_SERVER['HTTP_REFERER'] ?? '/';
  header("Location: $previousPage?error=invalid_email");
  exit();
}

// Check if the email is already subscribed
$emailExistenceCheckQuery = $bdd->prepare("SELECT * FROM subscribers WHERE email = :email");
$emailExistenceCheckQuery->execute([
  "email" => $_POST['email']
]);

// Fetch the result
$subscribed = $emailExistenceCheckQuery->fetch();

// IF the email is already subscribed
if ($subscribed) {
  $previousPage = $_SERVER['HTTP_REFERER'] ?? '/';
  header("Location: $previousPage?error=already_subscribed");
  exit();
}

// Execute the query
$query->execute([
  "email" => strtolower($_POST['email'])
]);

// Redirect to the subscriptions page
header("Location: /merci.php?success=subcribed");
exit();
