<?php
/**
 *  FOOTER
 * ------------------------------
 * Ce partial "footer.php" contient tout le code HTML du pied de page de notre site avec
 * les balises <footer> et <script> ainsi que la balise de fermeture </body></html> qui ont été ouvert dans header.php.
 * 
 * Il est inclus dans les pages de notre application comme "index.php" pour afficher le pied de page de la page.
 */
?> <!-- On ferme ici la balise PHP pour commencer à écrire du HTML -->

<footer>
  <p>
    &copy; <!-- Symbole © avec le code HTML &copy; -->
    <?php echo date('Y') ?> <!-- On utilise la fonction date() pour retourner l'année actuelle -->
    - 
    <?php echo $meta_site_name ?> <!-- On affiche le nom du site avec la variable $meta_site_name défini dans init.php -->
  </p>
</footer>

</main><!-- end of main -->
<script>
  feather.replace();
</script>
</body><!-- end of body -->
</html><!-- end of html -->