<?php
/**
 * Dans ce fichier, on affiche la liste des articles du blog.
 * Ces articles sont récupérés depuis une base de données Airtable.
 * 
 * On utilise la classe AirTable que nous avons créer pour récupérer les données.
 * 
 * On commence par inclure le fichier de la classe AirTable.
 */
require_once '../class/AirTable.php';

/**
 * On définit les clés des bases de données et des tables dans Airtable pour récupérer les données.
 * Nous avons besoin de l'ID de la base de données et de l'ID de la table.
 *
 * Ces clés sont disponibles dans l'interface d'Airtable.
 * Pour les trouver, il faut se rendre sur la page de la table et cliquer sur "Help" en haut à droite.
 */
$baseId = 'appmRdwIxfQBNXWT3';
$tableId = 'tblCHnRN0sH10QpyY';

/**
 * On instancie la classe AirTable avec les clés de la base de données et de la table.
 * On récupère tous les enregistrements de la table grâce à la méthode `getAllRecords()`.
 */
$airtable = new AirTable($baseId, $tableId);
$result = $airtable->getAllRecords();

/**
 * On inclut le fichier du header qui contient le début de notre page HTML.
 */
require_once '../partials/header.php'; ?>

<main class="container">
  <h1>Blog</h1>
  <?php 
  /**
   * On affiche un message de notification si une variable `$message` est définie.
   * Cette variable est définie dans le fichier show.php lorsqu'on supprime un article.
   */
  if (isset($message)): ?>
    <p data-notice="<?= $message_type ?>" role="alert">
      <?php echo $message; ?>
    </p>
  <?php endif; ?>

  <?php 
  /**
   * On affiche les articles du blog qui proviennent de la base de données Airtable.
   * 
   * Si la variable `$result` est définie et que c'est un objet, on affiche les articles.
   */
  if (isset($result) && is_object($result)): ?>
    <p>Devinez quoi ? Ici les articles qui proviennent d'une base AirTable 😉</p>
    <?php 
    /**
     * On parcourt les enregistrements de la base de données et on affiche les articles.
     * On renverse l'ordre des articles pour afficher les plus récents en premier grâce à `array_reverse()`.
     */
    foreach (array_reverse($result->records) as $record): ?>
      <article>
        <h2><?= $record->fields->title ?></h2>
        <div>
          <?= strlen($record->fields->content) > 100 ? substr($record->fields->content, 0, 200) . '...' : $record->fields->content ?>
        </div>
        <a href="show.php?id=<?= $record->id ?>" aria-label="Lire la suite de <?= $record->fields->title ?>">
          Lire la suite
        </a>
        <footer>
        <small>Posté le <?= $airtable->formatDate($record->fields->created_at, "d/m/Y à H:i") ?></small>
        </footer>
      </article>
    <?php endforeach; // fin de la boucle ?>
  <?php endif; // fin de la condition ?>
</main>

<?php
require_once '../partials/footer.php';


