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