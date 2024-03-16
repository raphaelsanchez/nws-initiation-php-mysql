<?php
/**
 * INTRUCTIONS
 * ------------------------------
 * 
 * Cette page "index.php" est la page d'accueil de notre site.
 * 
 * NB: Tout le code est commenté pour vous aider à comprendre le fonctionnement. 
 * N'hésitez pas à vous en inspirer pour votre projet 😉.
 * 
 * Vous trouverez ici un exemple de code pour créer un formulaire d'inscription à une newsletter
 * qui stock l'adresse email en base de donnée avec la date de soumission.
 * 
 * Pour cela, nous allons utiliser :
 * - un formulaire HTML pour récupérer l'adresse email
 * - un fichier PHP pour traiter le formulaire et insérer l'adresse email dans la base de donnée
 * - une base de donnée MySQL pour stocker les adresses email
 *
 * Pour voir comment est gérée la base de donnée, consultez le fichier "includes/init.php"
 * Pour voir comment est géré le formulaire, consultez le fichier "routes/newsletter-subscribe.php"
 */

/**
 * PAGE VARIABLES
 * ------------------------------
 * on y retrouve la définition des variables PHP pour le titre, la description de la page, etc...
 * Ces variables sont utilisées dans le fichier partials/header.php pour afficher le titre de la page
 * 
 * NOTE :
 * Les variables PHP permettent de stocker des informations qui peuvent être utilisées dans tout le code PHP de la page.
 * Elles sont définies ici, au début du fichier, pour faciliter la maintenance du code.
 * Si on veut changer le titre de la page, on le fait ici et il sera automatiquement mis à jour dans le fichier "partials/header.php"
 */
$page_title = "Hello 👋, cette semaine on code pour de vrai !!!";
$page_description = "A simple page to say hello to the world";

/**  
 * HEADER
 * ------------------------------
 * En PHP, on peut séparer notre code en plusieurs fichiers pour le rendre plus lisible et plus facile à maintenir.
 * Ici, nous avons un fichier "header.php" qui contient tout le code HTML de l'entête de notre site avec
 * les balises <html>, <head>, <meta>, <title>, <link>, <script> ainsi que la balise d'ouverture <body>.
 */
include "partials/header.php"; 

/**
 * MAIN CONTENT
 * ------------------------------
 * Le contenu principal de la page est ici.
 */
?> <!-- On ferme ici la balise PHP pour commencer à écrire du HTML -->


<!-- Oui, bien que ce soit une page PHP, on peut aussi écrire du HTML qui peut aussi contenir du PHP -->
<main class="container">
  <header>

    <h1><?php echo $page_title ?></h1> 
    <!-- 👆 
      Notez qu'ici notre <h1> contient du code PHP pour "echo" (afficher) notre variable "$page_title".
      Comme nous dans du code HTML, nous devons ouvrir et fermer les balises PHP pour insérer du code PHP.
    -->
    <p>Le but de l'exercice est de vous faire manipuler un peu de HTML, un peu de JS, de PHP et faire la liaison avec la base de donnée.
    </p>
    <p>Je vois déjà des visages se crisper... pas de panique ! L'intégralité du code est commenté afin de vous guider dans cette tâche. Et puis, vous verrez, ce n'est pas si compliqué que ça au final. Vous pourriez même y prendre goût par accident 😁</p>
  </header>

  <section id="example">
    <h2>Exemple</h2>
    <p>
      Dans cet exemple, nous imaginons proposer l'incription à une liste de diffusion. Il s'agit un simple formulaire où chaque soumission est stockée en base de donnée dans la table <code>subscribers</code>.
      Nous utilisons aussi du Javascript pour valider le formulaire
    </p>
    <p>Malgré sa simplicité ce dernier constitue une bonne base pour commencer.</p>
    <!--
      Voici un exemple de formulaire d'inscription à une newsletter qui stock l'adresse email en base de donnée avec la date de soumission. 
      Il est simple et ne fait pas de vérification de l'adresse email.
      
      Ci-dessous le formulaire 👇 dont voici l'anatomie :
      - Le <form> est la balise qui contient tout le formulaire. Il a plusieurs attributs :
        - un attribut "action" indique le fichier PHP qui va traiter les données du formulaire
        - un attribut "method" indique la méthode HTTP à utiliser pour envoyer les données. Ici, "POST"

      - Le <label> sert à indiquer à l'utilisateur ce qu'il doit saisir dans le champ. Il prend un attribut :
        - un attribut "for" qui doit correspondre à l'attribut "id" du champ à lier

      - Le <input> permet de capturer la saisie de l'utilisateur et possède plusieurs attributs :
        - un attribut "type" avec la valeur "email" pour que le navigateur vérifie que l'adresse est bien une adresse email
        - un attribut "name" pour donner un nom à la donnée qui sera envoyée au serveur
        - un attribut "id" pour le lier a son label qui a un attribut "for" du même nom
        - un attribut "autocomplete" avec la valeur "off" pour ne pas afficher les suggestions de l'ordinateur
        - un attibut "placeholder" pour indiquer à l'utilisateur ce qu'il doit saisir
        - un attribut "required" pour que le navigateur sache que ce champ est obligatoire

      - Le <bouton> permet de soumettre le formulaire. Il a un attribut :
        - un attribut "type" avec la valeur "submit" pour envoyer les données.
    -->
    <article>
      <h3>Inscription à la newsletter</h3>
      <form id="newsletter-form" action="includes/action-newsletter-subscribe.php" method="POST">
      <fieldset role="group">
        <label class="sr-only" for="email">Entrez votre adresse email</label>
        <input type="email" name="email" id="email" autocomplete="off" placeholder="ex: john@doe.com" required>
        <button type="submit" disabled>S'inscrire</button>
      </fieldset>
      </form>
    </article>
  </section>

  <section>
    <h2>À vous de jouer !</h2>
    <p>Votre mission si vous l'acceptez (même si en vrai vous n'avez pas le choix 😁) c'est de créer votre projet que vous avez tirer au chapeau.</p>
    <p>Pour vous aider, voici les étapes à suivre :</p>
    <ol>
      <li><strong>Créez votre nouvelle Tables</strong> (ex: recettes) et ajoutez y les champs dont vous avez besoin</li>
      <li><strong>Créez une nouvelle page</strong> (ex. recettes.php) à la racine du dossier <code>public</code></li>
      <li><strong>Ajoutez un formulaire</strong> à cette page avec les champs dont vous avez besoin pour correspondre à votre base de donnée</li>
      <li><strong>Créez un fichier PHP</strong> dans le dossier <code>includes</code> (ex. action-recettes-create.php) pour traiter les données du formulaire et les insérer dans la base de donnée. Faites bien attention aux attributs <code>name</code>.</li>
      <li><strong>Redirigez vers page de remerciement</strong> après l'enregistrement en base de donnée et ajuster le message en fonction du context</li>
      <li><strong>Gérer le Dark Mode</strong> en complétant la fonction <code>toggleTheme()</code> dans <code>assets/scripts/app.js</code></li>
    </ol>
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
    <p>Voici des réponses aux questions que vous serez suceptible de poser.</p>
    <details>
      <summary>Pourquoi mon site ne marche pas ?</summary>
      <p>Si vous avez des problèmes pour faire fonctionner votre site, vérifiez que vous avez bien suivi les instructions et que votre serveur LocalWP est bien lancé. Si vous êtes bloqué, n'hésitez pas à demander de l'aide à votre mentor ou à vos camarades.</p>
    </details>
    <details>
      <summary>Comment sont géré les styles ?</summary>
      <p>Comme vous pouvez le constater le site est déjà mis en form (typo, couleur, espacement, responsive, etc...) alors qu'il n'y presque rien dans la feuille de style. Comment ? <strong>Grace à un framework CSS</strong> 😉.</p>
      <p>Ici nous utilisons <strong>Pico.css</strong> qui est à la fois légé et minimaliste conçue pour simplifier le processus de développement web. Il offre une approche simple et efficace pour styliser rapidement les pages web sans ajouter de poids inutile au chargement.</p> 
      <p>Sa simplicité d'utilisation en fait un bon framework pour prototyper des petits projets ou publier de la documentation.</p>
      <p><a href="https://picocss.com/" target="_blank" rel="noopener noreferrer">Découvrir Pico.css</a></p>
    </details>
    <details>
      <summary>Puis-je personnaliser le style ?</summary>
      <p>
        Ce n'est a proporement parlé par le but de l'exercice. Mais, nous vous empêcherons jamais de faire du CSS. Bien au contraire 😊
        <br>
        Si vous souhaitez modifier certains éléments, vous pouvez le faire de puis le fichier <code>assets/styles/app.css</code></p>
      <p>Nous vous recommandons toutefois à <a href="https://picocss.com/docs" target="_blank" rel="noopener noreferrer">vous référer à la documentation</a></p> </a>
    </details>
    <details>
      <summary>La couleur "Orange" ne correspond pas à ma charte ! Comment la changer ?</summary>
      <p>La couleur "Purple" vient avec le theme chargé pour ce projet. Regardons ça de plus près :</p>
      <p>
        Dans la balide <code>head</code> du fichier <code>partials/header.php</code>, vous trouverez un <code>link</code> qui charge la ressource suivante :
        <code>https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.purple.min.css"</code><br>
        Regardez bien le nom du fichier. Vous pouvez le remplacer par <code>pico.blue.min.css</code> pour avoir un thème bleu par exemple. Simple non ? 😉
      </p>
      <p>Pour plus de themes, aller <a href="https://picocss.com/docs/version-picker" target="_blank" rel="noopener noreferrer">jetter un oeil au version picker</a></p>
    </details>
  </section>
</main>

<!-- On ré-ouvre la balise PHP pour à nouveau écrire du code PHP -->
<?php
// FOOTER
// ------------------------------
// On inclut le fichier "footer.php" qui contient la balise de fermeture </body></html>
include "partials/footer.php"; 
