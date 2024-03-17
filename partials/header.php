<?php
/**
 * VARIABLES GLOBALS
 * ------------------------------
 * 
 * Ces variables sont utilisées dans tout le site.
 * Elles sont définies ici, au début du fichier, pour faciliter la maintenance du code.
 * Si on veut changer le titre du site, on le fait ici et il sera automatiquement mis à jour dans le fichier "partials/header.php"
 */
$meta_site_name = "Mon site";
$meta_site_author = "Raphael Sanchez";
?> <!-- On oublie pas de fermer ici la balise PHP pour commencer à écrire du HTML -->

<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo $meta_title ?></title>
  <meta name="description" content="<?php echo $meta_description ?>">
  <meta name="author" content="<?php echo $meta_site_author ?>">

  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo $meta_title ?>">
  <meta property="og:description" content="<?php echo $meta_description ?>">
  <meta property="og:url" content="<?php echo $_SERVER['REQUEST_URI'] ?>">

  <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.orange.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css"/>
  <link rel="stylesheet" href="assets/styles/app.css">

  <script src="assets/scripts/app.js" defer></script>
</head>
<body>

<header>
  <nav class="container">
    <a href="/">
      <img src="/assets/images/logo.svg" width="180" height="70" alt="Logo NWS">
    </a>
    <button class="contrast outline" data-toggle="theme" aria-label="toggle theme mode">
      <svg class="sun" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m6.76 4.84l-1.8-1.79l-1.41 1.41l1.79 1.79zM4 10.5H1v2h3zm9-9.95h-2V3.5h2zm7.45 3.91l-1.41-1.41l-1.79 1.79l1.41 1.41zm-3.21 13.7l1.79 1.8l1.41-1.41l-1.8-1.79zM20 10.5v2h3v-2zm-8-5c-3.31 0-6 2.69-6 6s2.69 6 6 6s6-2.69 6-6s-2.69-6-6-6m-1 16.95h2V19.5h-2zm-7.45-3.91l1.41 1.41l1.79-1.8l-1.41-1.41z"/></svg>
      <svg class="moon" hidden xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M14 2c1.82 0 3.53.5 5 1.35c-2.99 1.73-5 4.95-5 8.65s2.01 6.92 5 8.65A9.973 9.973 0 0 1 14 22C8.48 22 4 17.52 4 12S8.48 2 14 2"/></svg>
    </button>
  </nav>
</header>

<!-- 
  Fin du partials/header.php
  Le reste de notre code se trouve dans la page (ex. index.php) 
-->