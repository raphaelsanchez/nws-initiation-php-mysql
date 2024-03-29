
<?php
require_once "../includes/db.php";

$query = $bdd->query("SELECT * FROM reservations ORDER BY id DESC");
$reservations= $query->fetchAll(PDO::FETCH_OBJ);

include '../partials/header.php';
?>

<main class="container">
    
    <h1>Liste des réservations</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Age</th>
                    <th>Numéro de Telephone</th>
                    <th>Adresse Email</th>
                    <th>Date de Réservation</th>
                    <th>Heure de Réservation</th>
                    <th>Cours</th>
                    <th>Coach</th>
                    <th>Genre</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($reservations as $reservation) : ?>
                <tr>
                    <td><?php echo $reservation->nom; ?></td>
                    <td><?php echo $reservation->prenom; ?></td>
                    <td><?php echo $reservation->age; ?></td>
                    <td><?php echo $reservation->telephone; ?></td>
                    <td><?php echo $reservation->email; ?></td>
                    <td><?php echo $reservation->date; ?></td>
                    <td><?php echo $reservation->heure; ?></td>
                    <td><?php echo $reservation->cours; ?></td>
                    <td><?php echo $reservation->coach; ?></td>
                    <td><?php echo $reservation->genre; ?></td>
                    <td><a href="update.php?id=<?php echo $reservation->id ?>">Modifier</a></td>
                    <td><a href="delete.php?id=<?php echo $reservation->id ?>">🗑️</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>

<?php
require '../partials/footer.php'; ?>