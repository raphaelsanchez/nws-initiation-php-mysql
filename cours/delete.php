<?php

require_once "../includes/db.php";

$query = $bdd->prepare("DELETE FROM reservations WHERE id=:id");

$query->execute([
    "id" => $_GET['id']
]);

header("Location: index.php?success=deleted");
exit();

?>