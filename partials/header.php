<?php
/**
 * VARIABLES GLOBALS
 * ------------------------------
 * 
 * Ces variables sont utilisées dans tout le site.
 * Elles sont définies ici, au début du fichier, pour faciliter la maintenance du code.
 * Si on veut changer le titre du site, on le fait ici et il sera automatiquement mis à jour dans le fichier "partials/header.php"
 */
$meta_site_name = "NWS";
$meta_site_description = "Initiation au développement web avec PHP et MySQL";
$meta_author = "Raphael Sanchez";
$meta_robot = "index, follow";
?> <!-- On oublie pas de fermer ici la balise PHP pour commencer à écrire du HTML -->

<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="color-scheme" content="light dark" />

  <title><?= (isset($meta_title)) ? ($meta_title . ' | ') : null ?><?= $meta_site_name ?></title>
  <meta name="description" content="<?= (isset($meta_description)) ? $meta_description : $meta_site_description ?>">
  <meta name="author" content="<?= $meta_author ?>">
  <meta name="robots" content="<?= $meta_robot ?>">

  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= (isset($meta_title)) ? $meta_title : $meta_site_name ?>">
  <meta property="og:description" content="<?= (isset($meta_description)) ? $meta_description : $meta_site_description ?>">
  <meta property="og:url" content="<?php echo $_SERVER['REQUEST_URI'] ?>">

  <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.orange.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css"/>
  <link rel="stylesheet" href="/assets/styles/app.css">

  <script src="https://unpkg.com/feather-icons"></script>
  <script src="/assets/scripts/app.js" defer></script>
</head>
<body>

<header>
  <nav class="container">
    <a href="/">
      <img src="/assets/images/logo.svg" width="180" height="70" alt="Logo NWS">
    </a>
    <button class="contrast outline" data-toggle="theme" aria-label="toggle theme mode">
      <i data-feather="sun"></i>
      <i data-feather="moon" hidden></i>
    </button>
  </nav>
</header>

<!-- 
  Fin du partials/header.php
  Le reste de notre code se trouve dans la page (ex. index.php) 
-->