<?php
/**
 * CONNEXION À LA BASE DE DONNÉE
 * ------------------------------
 * Nous devons donc, avant tout, nous connecter à la base de donnée puis que nous allons avoir besoin de récupérer les abonnés.
 * Pour cela, on va inclure le fichier d'initialisation qui contient la connexion à la base de donnée.
 * 
 * On utilise la "require_once" pour inclure le fichier "db.php" qui contient la connexion à la base de donnée.
 * Notez que le chemin du fichier est relatif à la position du fichier "action-newsletter-subscribe.php".
 * 
 * Voir : https://www.php.net/manual/fr/function.require-once.php
 */ 
require_once "../includes/db.php";

/**
 * PAGE VARIABLES
 * ------------------------------
 * Les variables PHP permettent de stocker des informations qui peuvent être utilisées dans tout le code PHP de la page.
 * 
 * Elles sont définies ici, au début du fichier, pour faciliter la maintenance du code.
 * Ici, nous avons deux variables :
 * - $meta_title : le titre de la page
 * - $meta_description : la description de la page
 * Ces variables sont récupérées dans le fichier "partials/header.php" pour personnaliser le titre et la description de la page.
 */
$meta_title = "Subscribers";
$meta_description = "Liste des abonnés à la newsletter";

/**
 * Si la variable $_GET['delete'] existe, cela signifie que l'abonné a été supprimé avec succès.
 * Alors on defini le type de message dans la variable $message_type pour afficher un message de succès
 * et on defini le message de confirmation dans la variable $message.
 * 
 * Cette variable est affichée dans le code HTML pour informer l'utilisateur que l'abonné a bien été supprimé.
 * (voir plus bas dans le code)
 */
if (isset($_GET['delete'])) {
  $message_type = "success";
  $message = "L'abonné a été supprimé avec succès.";
}

/**
 * PRÉPARATION DE LA REQUÊTE SQL
 * ------------------------------
 * Nous utilisons la fonction SQL SELECT pour récupérer toutes les données de la table "subscribers"
 * - On utilise la méthode query() de la variable $bdd pour exécuter la requête
 * - SELECT * FROM subscribers : on "sélectionne" "toutes" les données "depuis" la table "subscribers"
 * - Enfin, on stocke la requête dans une variable $query
 * 
 * Voir : https://www.php.net/manual/fr/pdo.query.php
 * Voir : https://sql.sh/cours/select
 */
$query = $bdd->query("SELECT * FROM subscribers");

/**
 * Enfin, on utilise la méthode fetchAll() de la variable $query pour récupérer les résultats de la requête
 * On stocke les résultats dans une variable $subscribers
 * 
 * Nous utilisons la constante PDO::FETCH_OBJ pour récupérer les résultats sous forme d'objets
 * Cela nous permet d'accéder aux données avec la notation fléchée $subscriber->email
 * ce qui est plus lisible que $subscriber['email'].
 * 
 * Note : fetchAll() renvoie un tableau d'objets, même s'il n'y a qu'un seul résultat.
 * C'est pour cela que nous utilisons $subscribers pour stocker les résultats.
 * 
 * Voir : https://www.php.net/manual/fr/pdostatement.fetchall.php
 */
$subscribers = $query->fetchAll(PDO::FETCH_OBJ);

/**
 * Puis, nous incluons également le fichier "header.php" qui contient tout le code HTML de l'entête de notre site avec
 * les balises <html>, <head>, <meta>, <title>, <link>, <script> ainsi que la balise d'ouverture <body>.
 */
include_once "../partials/header.php"; 
?> <!-- On ferme ici la balise PHP pour commencer à écrire du HTML -->


<!-- Oui, bien que ce soit une page PHP, on peut aussi écrire du HTML qui peut aussi contenir du PHP -->
<main class="container">
  <header>
    <h1>Souscriptions</h1> 
  </header>

  <!-- 
    On affiche le nombre d'abonnés à la newsletter .
    On utilise la fonction PHP count() pour compter le nombre d'éléments dans le tableau $subscribers.
    On affiche le nombre d'abonnés avec un message personnalisé.
    Voir : https://www.php.net/manual/fr/function.count.php

    Notez que nous utilisons un opérateur ternaire pour afficher "abonné" ou "abonnés" en fonction du nombre d'abonnés.
    `count($subscribers) > 1 ? 'abonnés' : 'abonné'` signifie : si le nombre d'abonnés est supérieur à 1, on affiche "abonnés", sinon "abonné".
    voir : https://www.php.net/manual/fr/language.operators.comparison.php#language.operators.comparison.ternary
  -->
  <p>Il y a actuellement <strong><?= count($subscribers) ?> <?= count($subscribers) > 1 ? 'abonnés' : 'abonné' ?></strong> à la newsletter.</p>

  <?php
  /**
   * MESSAGE DE CONFIRMATION
   * ------------------------------
   * Si la variable $message existe, on affiche un message de confirmation.
   * 
   * On utilise la balise <p> avec un attribut "data-notice" pour afficher un message stylisé.
   * On utilise la variable $message_type pour définir le type de message (info, success, error).
   * On affiche le message de confirmation contenu dans la variable $message.
   */
  if (isset($message)) : ?>
    <p data-notice="<?= $message_type ?>">
      <span><?= $message ?></span>
      <i data-feather="x" data-close></i>
    </p>
  <?php endif; ?>
  
  <article>
    <?php
    /**
     * CONDITION IF / ELSE
     * ------------------------------
     * SI, (la liste des abonnés n'est PAS vide),
     * on affiche les abonnés
     * 
     * Ca ne vous rappelle rien ? Vous avez déjà vu ça dans Scratch !
     * les blocs orange "si... alors... sinon..." 😉
     * 
     * Pour vérifier si la liste est vide, nous utilisons la fonction PHP 'empty()'.
     * Cette fonction renvoie 'true' si la liste est vide et 'false' si elle ne l'est pas.
     * Cependant, nous voulons faire quelque chose si la liste n'est PAS vide.
     * Pour cela, nous utilisons le signe '!' avant 'empty()'. 
     * Le signe '!' inverse le résultat de 'empty()'. 
     * Donc, '!empty($subscribers)' sera 'true' si la liste n'est pas vide et 'false' si elle est vide.
     * 
     * Voir : https://www.php.net/manual/fr/function.empty.php
     */
    if (!empty($subscribers)) : ?>
    <table>
      <thead>
        <tr>
          <th>Email</th>
          <th>Date d'inscription</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
          <?php 
          /**
           * BOUCLE FOREACH
           * ------------------------------
           * La boucle foreach permet de parcourir un tableau (ou un objet) et d'exécuter un bloc de code pour chaque élément.
           * 
           * Ça vous rappelle les blocs "répéter pour chaque élément" dans Scratch ?
           * 
           * POUR CHAQUE (abonnés EN TANT QUE abonné),
           * On affiche l'email et la date d'inscription de l'abonné
           * 
           * Nous utilisons la notation fléchée "$subscriber->email" pour accéder à la propriété "email" de l'objet $subscriber
           * ainsi que "$subscriber->subscribed_at" pour accéder à sa propriété "subscribed_at".
           * On peut le faire car PDO::FETCH_OBJ nous permet de récupérer les résultats sous forme d'objets.
           * 
           * Voir : https://www.php.net/manual/fr/language.types.object.php
           */
          foreach ($subscribers as $subscriber) : ?>
          <tr>
            <td>
              <?php
              /**
               * On affiche l'email de l'abonné
               * On utilise la notation fléchée "$subscriber->email" pour accéder à la propriété "email" de l'objet $subscriber
               */
              echo $subscriber->email ?>
            </td>
            <td>
              <?php
              /**
               * On utilise la classe PHP DateTime pour formater la date d'inscription
               * On crée un nouvel objet DateTime à partir de la date d'inscription de l'abonné
               * Puis, on utilise la méthode format() pour afficher la date au format 'd/m/Y à H:i' (ex: 31/12/2021 à 23:59)
               * 
               * Voir : https://www.php.net/manual/fr/class.datetime.php
               */
              echo (new DateTime($subscriber->subscribed_at))->format('d/m/Y à H:i') ?>
            </td>
            <td>
              <?php
              /**
               * On ajoute un bouton pour supprimer l'abonné
               * On utilise la propriété "id" de l'objet $subscriber pour passer l'identifiant de l'abonné à la page "delete.php"
               * On utilise la méthode POST pour envoyer l'identifiant de l'abonné dans l'URL.
               * Vous noterez que nous utilisons un formulaire pour envoyer la requête de suppression qui contient un champ caché "id" pour envoyer l'identifiant de l'abonné.
               * Cela est plus sécurisé que d'utiliser un lien direct avec une balise <a href="delete.php?id=1">Supprimer</a>.
               * D'autant plus que la page "delete.php" n'est pas accessible directement pour des raisons de sécurité.
               * Sans cela, n'importe qui pourrait supprimer un abonné en tapant l'URL directement dans le navigateur.
               * ex: delete.php?id=1
               */
              echo '<form action="delete.php" method="POST">';
              echo '  <input type="hidden" name="id" value="' . $subscriber->id . '">';
              echo '  <button aria-label="Supprimer"><i data-feather="trash-2"></i></button>';
              echo '</form>';
              /**
               * Pour la suite, rendez-vous dans le fichier "subscriptions/delete.php" pour voir comment supprimer un abonné.
               */ ?>
            </td>
          </tr>
          <?php 
          /* FIN de la boucle FOREACH */
          endforeach; ?>
      </tbody>
    </table>

    <?php 
    /**
     * SINON, 
     * on affiche un message pour indiquer qu'il n'y a pas d'abonnés
     */
    else : ?>
      <p data-notice="info">Aucun abonné pour le moment.</p>
    <?php 
    /**
     * FIN de la condition IF / ELSE
     * On peut maintenant fermer la balise PHP pour continuer à écrire du HTML
     */
    endif; 
    /**
     * Super !! Nous venons de voir le "R" (Read) de CRUD, passons maintenant à la suppression des données.
     * Vous pouvez aller dans le fichier "subscriptions/delete.php" pour la suite.
     */ ?>
  </article>
  
</main>

<!-- On ré-ouvre la balise PHP pour à nouveau écrire du code PHP -->
<?php
/** 
 * INCLUDES (encore !)
 * ------------------------------
 * Tout comme le header, on inclus le footer.php 
 * qui contient tout le code HTML du pied de page de notre site avec
 * la balises <footer> ainsi que la balise de fermeture </body></html> qui ont été ouvert dans header.php.
 */
include_once "../partials/footer.php"; 
