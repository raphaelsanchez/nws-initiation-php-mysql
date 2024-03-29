<?php
/**
 * INTRODUCTION
 * ------------------------------
 * Bienvenue dans votre premier projet PHP !
 * 
 * Ce projet est une initiation à la programmation web avec PHP et MySQL.
 * Il vous permettra de comprendre les bases de la programmation web et de mettre en pratique vos connaissances.
 * 
 * Il est construit comme un parcours guidé à travers un code complètement documenté et détaillé pas à pas pour vous aider à comprendre 
 * la logique de programmation laissant place à l'expérimentation et à la découverte. Car c'est en pratiquant que l'on apprend le mieux.
 * 
 * Ce projet est divisé en plusieurs parties :
 * - Un formulaire d'inscription à une newsletter
 * - Un système de validation de formulaire en JavaScript
 * - Un traitement de formulaire en PHP
 * - Une connexion à une base de données MySQL
 * - Une redirection après soumission du formulaire
 * 
 * À la fin de ce projet, vous aurez appris à manipuler du PHP, à mettre en place un CRUD (Create, Read, Update, Delete)
 * et à interagir avec une base de données MySQL.
 * 
 * Alors, prêt à coder ? C'est parti ! 🚀
 */

/**
 * PAGE VARIABLES
 * ------------------------------
 * Les variables PHP permettent de stocker des informations qui peuvent être utilisées dans tout le code PHP de la page.
 * 
 * Elles sont définies ici, au début du fichier, pour faciliter la maintenance du code.
 * Ici, nous avons deux variables :
 * - $meta_title : le titre de la page
 * - $meta_description : la description de la page
 * Ces variables sont récupérées dans le fichier "partials/header.php" pour personnaliser le <title> et la  <meta name="description"> de la page.
 */
$meta_title = "Initiation à la programmation web";
$meta_description = "Premier projet en PHP et MySQL";

/**
 * MESSAGE DE CONFIRMATION OU D'ERREUR
 * ------------------------------
 * Notre page d'accueil est un formulaire d'inscription à une newsletter.
 * Lorsque l'utilisateur soumet le formulaire, un message est affiché en cas d'erreur.
 * Nous allons donc commencer par gérer la condition de ce message en function des paramètres GET de l'URL.
 * 
 * exemple : /?error=already_subscribed
 * 
 * Si la variable $_GET['error'] existe, cela signifie que la page de traitement nous à redirigé vers cette page
 * avec un paramètre "error" dans l'URL pour nous informer d'une erreur lors de l'inscription.
 * 
 * Nous récupérons la valeur de ce paramètre et affichons un message en fonction de la valeur.
 */
if (isset($_GET['error']) && $_GET['error'] === "already_subscribed") {
  $message = "Désolé, vous êtes déjà inscrit avec cette adresse.";
  $message_type = "warning";
} elseif (isset($_GET['error']) && $_GET['error'] === "invalid_email") {
  $message = "Arf ! L'adresse email n'est pas valide. Veuillez réessayer.";
  $message_type = "error";
} elseif (isset($_GET['success']) && $_GET['success'] === "subscribed"){
  $message = "Merci ! Votre inscription a bien été prise en compte.";
  $message_type = "success";
} else {
  $message = null;
  $message_type = null;
}

/**  
 * INCLUDES
 * ------------------------------
 * En PHP, on sépare notre code en plusieurs fichiers pour le rendre plus lisible et plus facile à maintenir.
 * 
 * Ici, nous incluons le fichier "header.php" qui contient tout le code HTML de l'entête de notre site avec
 * les balises <html>, <head>, <meta>, <title>, <link>, <script> ainsi que la balise d'ouverture <body>.
 * 
 * On utilise la fonction include_once pour inclure le fichier une seule fois.
 * Cela permet d'éviter d'inclure plusieurs fois le même fichier et de générer des erreurs.
 */
include_once "partials/header.php"; 
?> <!-- On ferme ici la balise PHP pour commencer à écrire du HTML -->


<!-- Oui, bien que ce soit une page PHP, on peut aussi écrire du HTML qui peut aussi contenir du PHP -->
<main class="container">
  <header>
    <h1>Coucou Raphael et Olivier !! :)</h1> 
    <p>Le but de l'exercice est de vous faire manipuler un peu de <strong>HTML</strong> de <strong>JS</strong>, de <strong>PHP</strong> et de faire la liaison avec la base de données <strong>MySQL</strong>.</p>
    <p>Je vois déjà des visages se crisper... 😁 ... pas de panique ! L'intégralité du code est commenté, comme une visite guidée à travers le code, pour vous aider dans cette tâche. Et puis vous verrez, que finalement, ce n'est pas si compliqué que ça. Vous pourriez même y prendre goût par accident 😁</p>
  </header>
  
  <section id="exemple">
    <h2>Merci pour ces deux semaines intenses et riche en émotion ! #oncodepourdevrai</h2>
    <p>
      Dans cet exemple, nous imaginons proposer l'inscription à une liste de diffusion. À la soumission du formulaire, la donnée est stocké en <code>BDD</code> dans la table <code>subscribers</code> puis l'utilisateur est <code>redirigé</code> pour revenir sur cette page.
    </p>
    <p>Nous utilisons aussi un peu de Javascript pour <strong>valider le formulaire</strong>. En effet, si vous regardez bien, le bouton <code>S'inscrire</code> n'est pas cliquable tant qu'une adresse email valide n'est pas renseignée.</p>

    <article>
      <h3>Inscrivez-vous à notre Newsletter !</h3>
      <?php 
        /**
         * MESSAGE DE CONFIRMATION
         * ------------------------------
         * Nous avons défini plus haut un message de confirmation ou d'erreur en fonction des paramètres GET de l'URL.
         * Donc, si la variable $message existe, cela signifie qu'un message doit être affiché à l'utilisateur.
         * 
         * Nous connditionnons donc un message SI la variable $message existe.
         * On passe la variable $message_type dans data-notice (error, warning, success, info) pour afficher le bon style de message.
         * (voir assets/styles/app.css pour les styles des messages)
         * Et on affiche le message dans une balise <p> avec un attribut data-notice pour le style et un attribut data-close pour fermer le message.
         * 
         * Vous voyez, c'est simple non ? 😉
         */
        if (isset($message)) : ?>
        <p data-notice="<?= $message_type ?>">
          <span><?= $message ?></span>
          <i data-feather="x" data-close></i>
        </p>
      <?php endif; ?>
      <!--
        EXEMPLE DE FORMULAIRE:
        Voici un exemple de formulaire d'inscription à une newsletter qui stock l'adresse email en base de donnée avec la date de soumission. 
        Il est simple et ne fait pas de vérification de l'adresse email.
        
        Voici ce dont il est composé :
        -> <form> est la balise qui contient tout le formulaire. Il a plusieurs attributs :
          - un attribut "action" indique le fichier PHP qui va traiter les données du formulaire
          - un attribut "method" indique la méthode HTTP à utiliser pour envoyer les données. Ici, "POST"

        -> <label> sert à indiquer à l'utilisateur ce qu'il doit saisir dans le champ. Il prend un attribut :
          - un attribut "for" qui doit correspondre à l'attribut "id" du champ à lier

        -> <input> permet de capturer la saisie de l'utilisateur et possède plusieurs attributs :
          - un attribut "type" avec la valeur "email" pour que le navigateur vérifie que l'adresse est bien une adresse email
          - un attribut "name" pour donner un nom à la donnée qui sera envoyée au serveur
          - un attribut "id" pour le lier a son label qui a un attribut "for" du même nom
          - un attribut "autocomplete" avec la valeur "off" pour ne pas afficher les suggestions de l'ordinateur
          - un attribut "placeholder" pour indiquer à l'utilisateur ce qu'il doit saisir
          - un attribut "required" pour que le navigateur sache que ce champ est obligatoire

        -> <bouton> permet de soumettre le formulaire. Il a un attribut :
          - un attribut "type" avec la valeur "submit" pour envoyer les données.
      -->
      <form id="newsletter-form" action="subscriptions/create.php" method="POST">
        <fieldset role="group">
          <label class="sr-only" for="email">Entrez votre adresse email</label>
          <input type="email" name="email" id="email" autocomplete="off" placeholder="Votre adresse email" required>
          <button type="submit">S'inscrire</button>
        </fieldset>
      </form>
      <!-- 
        FIN DE L'EXEMPLE 
        pour la suite, voir le fichier "subscription/new.php" pour le traitement du formulaire
      -->

    </article>
  </section>

  <section id="explications">
    <h2>Bien, maintenant un peu d'explications</h2>
    <ol>
      <li>Lorsque qu'un utilisateur commence à saisir des informations dans le champ email, une fonction JS vérifie que ce qui est tapé dans le champs correspond bien à une adresse email grace à une <a href="https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Global_Objects/RegExp" target="_blank" rel="noopener noreferrer">expression régulière (ou RegExp)</a>. <br>
        Si l'adresse est valide, le bouton <em>S'inscrire</em> devient cliquable.</li>
      <li>L'utilisateur clique alors sur le bouton et le formulaire est envoyé au script PHP <code>subscriptions/create.php</code> qui se charge de valider le champ. <br>
      Si il est correcte, alors un appel à la <code>BDD</code> est fait pour y inscrire la donnée récupérée.</li>
      <li>Enfin, si tout c'est bien passé, l'utilisateur est redirigé vers la page <code>merci.php</code> avec un paramètre dans l'url <code>success=subcribed</code> pour lui indiquer que l'inscription c'est bien passé. Dans le cas contraire, si il y a une erreur, on redirige l'utilisateur d'où il vient avec un code d'erreur pour afficher le message correspondant.</li>
      <li>Maintenant vous pouvez aller voir l'enregistrement en allant sur la <a href="/subscriptions">page des souscriptions</a></li>
    </ol>
    <p data-notice="info">Malgré la simplicité de ce formulaire, il constitue une bonne base pour commencer et comprendre la logique de programmation.</p>
  </section>

  <section>
    <h2>Et maintenant ?</h2>
    <p>La suite se passe dans le code. Ouvrez le projet votre éditeur de code (VS Code), commencez par allez sur la page <code>index.php</code> à la racine et laissez vous guider.</p>
    <p>L'ensemble de se cours est un parcours guidé à travers un code complètement documenté et détaillé pas à pas. Lisez bien les commentaires, analysez ce qui se passe, expérimentez et laissez vous guider. Vous y apprendrez à manipuler du PHP et mettre en place un CRUD.</p>
    <p>Et surtout, n'oubliez pas que vous n'êtes pas seul. Si vous avez des questions, référez vous aux documentation et n'hésitez pas à demander de l'aide à votre intervenant ou à vos camarades.</p>
  </section>

  <section id="exercices">
    <h2>À vous de jouer !</h2>
    <p>Votre mission si vous l'acceptez (même si vous n'avez vraiment pas le choix 😁) est de coder votre premier projet PHP.</p>
    <p>Voici les étapes à suivre :</p>
    <ol>
      <li>Dans "Adminer" <strong>Créez votre nouvelle Tables</strong> (ex: recettes) et ajoutez y les champs dont vous avez besoin.</li>
      <li><strong>Créez une nouvelle page</strong> (ex. <code>recettes.php</code>) dans le dossier public au même niveau que le fichier <code>index.php</code>. N'oublier pas d'y inclure les variables <code>$meta_title</code> et <code>$meta_description</code> ainsi que les fichiers <code>partials/header.php</code> et <code>partials/footer.php</code></li>
      <li>À cette page <strong>Ajoutez un formulaire</strong> avec les champs dont vous avez besoin pour correspondre à votre base de donnée (ex: firstname, lastname, email, etc...).</li>
      <li><strong>Créez un fichier PHP</strong> dans le dossier <code>includes</code> (ex. <code>action-recettes-create.php</code>) pour traiter les données du formulaire et les insérer dans la base de donnée.</li>
      <li><strong>Redirigez vers page de remerciement</strong> après l'enregistrement en base de donnée et ajuster le message en fonction du context.</li>
      <li><strong>Gérer le Dark Mode</strong> en complétant la fonction <code>toggleTheme()</code> dans <code>assets/scripts/app.js</code>.</li>
    </ol>
    <p data-notice="warning">Attention à la correspondance des attributs "name" de vos "input" avec les noms des colonnes de votre table</p>
    <h3>Remarques</h3>
    <ul>
      <li>Vous pouvez personnaliser cette page ou complètement la réécrire.</li>
      <li>Pensez à utiliser des noms de fichiers cohérents avec ce qu'ils représentent</li>
    </ul>
    <hr>
    <p>... bon courage à toutes et tous ! 💪</p>
  </section>

  <section id="faq">
    <h2>FAQ</h2>
    <p>Voici des réponses aux questions que vous serez susceptible de poser.</p>
    <details>
      <summary>Pourquoi mon site ne marche pas ?</summary>
      <p>Si vous avez des problèmes pour faire fonctionner votre site, vérifiez que vous avez bien suivi les instructions et que votre serveur LocalWP est bien lancé. Si vous êtes bloqué, n'hésitez pas à demander de l'aide à votre mentor ou à vos camarades.</p>
    </details>
    <details>
      <summary>Comment sont géré les styles ?</summary>
      <p>Comme vous pouvez le constater le site est déjà mis en form (typo, couleur, espacement, responsive, etc...) alors qu'il n'y presque rien dans la feuille de style. Comment ? <strong>Grace à un framework CSS</strong> 😉.</p>
      <p>Ici nous utilisons <strong>Pico.css</strong> qui est à la fois léger et minimaliste conçue pour simplifier le processus de développement web. Il offre une approche simple et efficace pour styliser rapidement les pages web sans ajouter de poids inutile au chargement.</p> 
      <p>Sa simplicité d'utilisation en fait un bon framework pour prototyper des petits projets ou publier de la documentation.</p>
      <p><a href="https://picocss.com/" target="_blank" rel="noopener noreferrer">Découvrir Pico.css</a></p>
    </details>
    <details>
      <summary>Puis-je personnaliser le style ?</summary>
      <p>
        Ce n'est a proprement parlé par le but de l'exercice. Mais, nous vous empêcherons jamais de faire du CSS. Bien au contraire 😊
        <br>
        Si vous souhaitez modifier certains éléments, vous pouvez le faire de puis le fichier <code>assets/styles/app.css</code></p>
      <p>Nous vous recommandons toutefois à <a href="https://picocss.com/docs" target="_blank" rel="noopener noreferrer">vous référer à la documentation</a></p> </a>
    </details>
    <details>
      <summary>La couleur "Orange" ne correspond pas à ma charte ! Comment la changer ?</summary>
      <p>La couleur "Purple" vient avec le theme chargé pour ce projet. Regardons ça de plus près :</p>
      <p>
        Dans la balise <code>head</code> du fichier <code>partials/header.php</code>, vous trouverez un <code>link</code> qui charge la ressource suivante :
        <code>https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.purple.min.css"</code><br>
        Regardez bien le nom du fichier. Vous pouvez le remplacer par <code>pico.blue.min.css</code> pour avoir un thème bleu par exemple. Simple non ? 😉
      </p>
      <p>Pour plus de themes, aller <a href="https://picocss.com/docs/version-picker" target="_blank" rel="noopener noreferrer">jeter un œil au version picker</a></p>
    </details>
  </section>
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
include_once "partials/footer.php"; 
