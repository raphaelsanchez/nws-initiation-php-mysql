<?php
// Require the database connection
require_once "../includes/db.php";

// Set meta information
$meta_title = "Subscribers";
$meta_description = "Liste des abonnés à la newsletter";

// Message de confirmation
if (isset($_GET['delete'])) {
  $message_type = "success";
  $message = "L'abonné a été supprimé avec succès.";
}

// Query to get all subscribers
$query = $bdd->query("SELECT * FROM subscribers");
$subscribers = $query->fetchAll(PDO::FETCH_OBJ);

// Include the header
include_once "../partials/header.php"; 
?>


<main class="container">
  <header>
    <h1>Souscriptions</h1> 
  </header>
  <p>Il y a actuellement <strong><?= count($subscribers) ?> <?= count($subscribers) > 1 ? 'abonnés' : 'abonné' ?></strong> à la newsletter.</p>

  <?php if (isset($message)) : ?>
    <p data-notice="<?= $message_type ?>">
      <span><?= $message ?></span>
      <i data-feather="x" data-close></i>
    </p>
  <?php endif; ?>
  
  <article>
    <?php if (!empty($subscribers)) : ?>
    <table>
      <thead>
        <tr>
          <th>Email</th>
          <th>Date d'inscription</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($subscribers as $subscriber) : ?>
          <tr>
            <td>
              <?php echo $subscriber->email ?>
            </td>
            <td>
              <?php echo (new DateTime($subscriber->subscribed_at))->format('d/m/Y à H:i') ?>
            </td>
            <td>
              <?php
              echo '<form action="delete.php" method="POST">';
              echo '  <input type="hidden" name="id" value="' . $subscriber->id . '">';
              echo '  <button aria-label="Supprimer"><i data-feather="trash-2"></i></button>';
              echo '</form>';
              ?>
            </td>
          </tr>
          <?php endforeach; ?>
      </tbody>
    </table>

    <?php else : ?>
      <p data-notice="info">Aucun abonné pour le moment.</p>
    <?php endif; ?>
  </article>
  
</main>

<?php
// Include the footer
include_once "../partials/footer.php"; 
