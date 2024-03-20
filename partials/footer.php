<?php
/**
 *  FOOTER
 * ------------------------------
 * Ce partial "footer.php" contient tout le code HTML du pied de page de notre site avec
 * les balises <footer> et <script> ainsi que la balise de fermeture </body></html> qui ont été ouvert dans header.php.
 * 
 * Il est inclus dans les pages de notre application comme "index.php" pour afficher le pied de page de la page.
 * 
 * REMARQUES :
 * Regardez ce que contient le <p> du footer...
 * On utilise la fonction date() pour afficher l'année actuelle.
 * On affiche le nom du site et le nom de l'auteur avec les variables $meta_site_name et $meta_author définies dans header.php
 * 
 * Nous utilisons la syntaxe <?= pour insérer directement les variables PHP dans le code HTML.
 * Cette syntaxe est une version abrégée de <?php echo $variable ?>, qui est utilisée pour afficher le contenu d'une variable.
 * Pour combiner des variables avec du texte, nous utilisons le point (.) comme opérateur de concaténation.
 * Nous utilisons également des guillemets simples ('') pour définir des chaînes de caractères, comme vous pouvez le voir dans l'exemple ci-dessous.
 */
?> <!-- On ferme ici la balise PHP pour commencer à écrire du HTML -->

<footer>
  <p>
    &copy; <!-- Symbole © avec le code HTML &copy; -->
    <?= date('Y') ?> <!-- On utilise la fonction date() pour retourner l'année actuelle -->
    <?= ' - ' . $meta_site_name ?> <!-- On affiche le nom du site avec la variable $meta_site_name défini dans init.php -->
    <?= ' - Créé avec ❤️ par ' . $meta_author ?> <!-- On affiche le nom du site avec la variable $meta_site_name défini dans init.php -->
  </p>
</footer>

<script>
  // Chargement des icônes Feather
  // On utilise la fonction feather.replace() pour remplacer les balises <i> avec l'attribut data-feather par les icônes correspondantes
  // Voir la documentation : https://github.com/feathericons/feather#feather
  feather.replace();
</script>
</main><!-- end of main -->
</body><!-- end of body -->
</html><!-- end of html -->