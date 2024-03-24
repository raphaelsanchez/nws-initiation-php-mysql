<?php
/**
 * Dans ce fichier, on affiche un article du blog qui provient de la base de données Airtable.
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
 * Si on defini les clés ici c'est parce l'on pourrait avoir plusieurs bases de données et tables dans Airtable.
 * Pour chaque page qui a besoin de données, on doit définir ces clés.
 */
$baseId = 'appmRdwIxfQBNXWT3';
$tableId = 'tblCHnRN0sH10QpyY';

/**
 * On récupère l'ID de l'article à afficher depuis l'URL.
 * On utilise la superglobale `$_GET` pour récupérer les paramètres de l'URL.
 * Si l'ID n'est pas défini dans l'URL, on le définit à `null`.
 */
$recordId = $_GET['id'] ?? null;

/**
 * On instancie la classe AirTable avec les clés de la base de données et de la table.
 * On récupère l'enregistrement de la table grâce à la méthode `getRecords()`.
 */
$airtable = new AirTable($baseId, $tableId);
$result = $airtable->getRecords($recordId);

/**
 * On inclut le fichier du header qui contient le début de notre page HTML.
 */
require_once '../partials/header.php'; ?>

<main class="container">
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
   * On affiche l'article du blog qui provient de la base de données Airtable.
   * 
   * Si la variable `$result` est définie et que c'est un objet, on affiche l'article.
   */
  if (isset($result) && is_object($result)): ?>
    <article>
      <header>
        <h1><?= $result->fields->title ?></h1>
      </header>
      <?php
        /**
         * On affiche le contenu de l'article en le séparant par des paragraphes.
         * 
         * Pour cela, nous allons diviser le contenu de l'article en lignes en utilisant la fonction `explode()`.
         * explode() divise une chaîne de caractères en un tableau en utilisant un délimiteur. Ici, le délimiteur est "\n" qui représente un saut de ligne.
         * Donc, chaque ligne de l'article sera un élément du tableau `$lines`.
         */
        $lines = explode("\n", $result->fields->content);

        /**
         * Ensuite, on parcourt les lignes du tableau `$lines` et on affiche chaque ligne dans un paragraphe.
         * On utilise la fonction `trim()` pour supprimer les espaces en début et en fin de ligne.
         * Si la ligne n'est pas vide, on l'affiche dans un paragraphe. Cela évite d'afficher des paragraphes vides.
         */
        foreach ($lines as $line) {
            if (trim($line) !== '') {
                echo "<p>$line</p>";
            }
        }
      ?>
      <footer>
        <small>Posté le <?= $airtable->formatDate($result->fields->created_at, "d/m/Y à H:i") ?></small>
        <!-- Ici nous utilisons la methode `formatDate()`que nous avons créé dans la class AirTable() pour formater la date -->
      </footer>
    </article>
  <?php endif; ?>
</main>

<?php
// Require the footer
require_once '../partials/footer.php';