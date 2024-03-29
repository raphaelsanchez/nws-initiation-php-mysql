# Initiation au développement web

## Table of Contents

- [Objectifs](#objectifs)
- [Prérequis](#prérequis)
- [Utilisation](#utilisation)
  - [Installation](#installation)
  - [Base de données](#base-de-données)
  - [Structure du projet](#structure-du-projet)
- [Outils](#outils)
  - [Framework CSS](#framework-css)
  - [Librairie de couleurs](#librairie-de-couleurs)
  - [Serveur web local](#serveur-web-local)
- [Resources](#resources)
- [Auteurs](#auteurs)
- [Report issues](#report-issues)

## Objectifs

L'objectif de ce cours est de vous initier au développement web.
Vous apprendrez à collecter des données, à les afficher et à les mettre à jour sur une page web grace à PHP et MySQL.

Nous verrons également comment sécuriser les données et comment les stocker dans une base de données.

Nous utiliserons un serveur web local pour héberger notre site et une base de données MySQL pour stocker nos données.

Vous aborderez les notions suivantes :

- HTML
- CSS (avec le framework Pico.css)
- JavaScript (... un peu)
- PHP (version 8.x)
- MySQL
- CRUD (Create, Read, Update, Delete)
- et un peu de sécurité

L'ensemble du code est commenté pour vous aider à comprendre chaque étape.
Il vous suffit de vous laisser guider par les commentaires pour comprendre ce que fait chaque ligne de code.

## Prérequis

✅ Avoir des notions de base en HTML et CSS  
✅ Avoir un IDE (éditeur de texte) pour écrire du code  
✅ Avoir un serveur web local. Ici nous utilisons [LocalWP](https://localwp.com/) pour plus de simplicité

💡 Il est également recommandé d'avoir le formateur **Prettier** installé dans votre IDE pour formater votre code. Vos correcteurs vous en remercieront 🙏

## Utilisation

### Installation sur LocalWP

1. Ouvrez votre serveur local
2. Téléchargez le dossier `nws-initiation-php-mysql--starter.zip`
3. Cliquez sur le bouton `+` en bas à gauche de LocalWP et cliquez sur `Select an existing ZIP`
4. Choisissez le fichier `nws-initiation-php-mysql--starter.zip` précédemment téléchargé et cliquez sur `Continue`
5. Choisissez un nom pour votre site et cliquez sur `Continue`
6. Sélectionnez l'option `Preferred` et cliquez sur `Import site`
7. Cliquez sur `View Site` pour voir votre site
8. Dans le menu de gauche, cliquez sur `Database` et cliquez sur `Open AdminerEvo`

... et voilà, votre site est prêt à être utilisé 🚀 !

### Installation sur une environnement local (MAMP, WAMP, LAMP, etc.)

Pour vous aider à démarrer, nous avons fourni un fichier `dump.sql.gz` qui contient une base de données avec des données fictives
correspondant au site que vous allez créer.

1. Clonez le dépôt dans votre dossier public de votre serveur local (par exemple `/Applications/MAMP/htdocs/`)
2. Créez une base de données MySQL sur votre serveur local
3. Ouvrez votre base de données MySQL (Adminer, PhpMyAdmin, etc.)
4. Créez une nouvelle base de données
5. Importez le fichier `dump.sql.gz` qui se trouve à la racine dans votre base de données.
6. Modifiez le fichier `db.php` dans le dossier `includes` avec les informations de votre base de données.

... et voilà, votre site est prêt à être utilisé 🚀 !

### Structure de la base de données

La base de données fournie contient 1 tables :

- `subscribers` : contient les informations des utilisateurs qui se sont inscrits à la newsletter

```sql
CREATE TABLE `subscribers` (
  `id` bigint(60) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### Structure du projet

```
initiation-dev-web.zip
├── 📁 app
│   ├── 📁 public
│   │   ├── 📁 assets
│   │   │   ├── 📁 styles
│   │   │   ├── 📁 scripts
│   │   │   └── 📁 images
│   │   ├── 📁 includes
│   │   │   ├── 📄 action-newsletter-subscribe.php
│   │   │   ├── 📄 db.php
│   │   │   ├── ...
│   │   ├── 📁 partials
│   │   │   ├── 📄 header.php
│   │   │   ├── 📄 footer.php
│   │   │   ├── ...
│   │   ├── 📄 index.php
│   │   ├── ...
├── 📁 conf
├── 📁 logs
```

- `App` : Est le point d'entrée de votre application.
- `Public` : Est le dossier accessible par le navigateur. Il contient tout les fichiers qui seront servis au client comme le fichier `index.php`, les fichiers statiques, etc.
  - `Assets` : contient tout les fichiers statiques comme les styles, les scripts, les images, etc.
  - `Includes` : contient tout les scripts PHP de votre application comme les fonctions, les classes, etc.
  - `Partials` : contient les fragments de code HTML réutilisables comme le header, le footer, etc.

⚠️ ATTENTION : `Conf` & `Logs` sont nécessaire à LocalWP. NE PAS Y TOUCHER !

## Outils

### Framework CSS

Ce cours étant une initiation au PHP et MySQL, pour vous faciliter la tâche, nous utiliserons le framework CSS [Pico.css](https://picocss.com/) pour le design de notre site.

Il est déjà pré-installé vous n'aurez donc pas à vous en soucier.

Pour l'utiliser, il vous suffit de consulter la [documentation](https://picocss.com/docs) pour voir les différentes classes disponibles.

### Librairie de couleurs

Pour géré simplement les couleurs de votre site, nous avons également installé la librairie fournie par [Pico.css](https://picocss.com/docs/colors) pour vous aider à choisir les couleurs de votre site et les utiliser facilement dans votre code.

### Serveur web local

Pour héberger notre site, nous utiliserons [LocalWP](https://localwp.com/), un serveur web local simple et gratuit fait à la base pour les développeurs WordPress mais qui peut également être utilisé pour héberger des sites web en PHP.

## Resources

- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [Javascript](https://developer.mozilla.org/fr/docs/Web/JavaScript)
- [LocalWP](https://localwp.com/help-docs/)
- [Pico CSS](https://picocss.com/docs)

## Auteurs

- [Raphael Sanchez](https://www.linkedin.com/in/raphael-sanchez-design/)
- [Olivier Martineau](https://www.linkedin.com/in/omartineau/)

## Report issues

Si vous avez des problèmes avec le code, n'hésitez pas à [ouvrir une issue](https://github.com/raphaelsanchez/nws-initiation-php-mysql/issues/new)
