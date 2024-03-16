# Initiation au développement web

## Objectif

L'ojectif de ce cours est de vous initier au développement web.
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

Il vous est également possible de consulter la [documentation officielle de PHP](https://www.php.net/docs.php) et la [documentation officielle de MySQL](https://dev.mysql.com/doc/).

## Prérequis

✅ Avoir des notions de base en HTML et CSS  
✅ Avoir un IDE (éditeur de texte) pour écrire du code  
✅ Avoir un serveur web local. Ici nous utilisons [LocalWP](https://localwp.com/) pour plus de simplicité

💡 Il est également recommandé d'avoir le formateur **Prettier** installé dans votre IDE pour formater votre code. Vos correcteurs vous en remercieront 🙏

## Frameworks CSS

Ce cours étant une initiation au PHP et MySQL, pour vous faciliter la tâche, nous utiliserons le framework CSS [Pico.css](https://picocss.com/) pour le design de notre site.

Il est déjà pré-installé vous n'aurez donc pas à vous en soucier.

Pour l'utiliser, il vous suffit de consulter la [documentation](https://picocss.com/docs) pour voir les différentes classes disponibles.

## Utilisation

### Installation

1. Ouvez votre serveur local
2. Téléchargez le dossier `initiation-dev-web.zip`
3. Cliquez sur le bouton `+` en bas à gauche de LocalWP et cliquez sur `Select an existing ZIP`
4. Choisissez le fichier `initiation-dev-web.zip` précédement téléchargé et cliquez sur `Continue`
5. Choisissez un nom pour votre site et cliquez sur `Continue`
6. Sélectionnez l'option `Preferred` et cliquez sur `Import site`
7. Cliquez sur `View Site` pour voir votre site

... et voilà, votre site est prêt à être utilisé 🚀 !

### Base de données

1. Dans le menu de gauche, Selectionnez votre site
2. Dans le volet de droite, cliquez sur `Database`
3. Dans l'onglet `Database` cliquez sur `Open AdminerEvo`

... et voilà, vous pouvez maintenant gérer votre base de données 💪 !

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

## Auteurs

- [Raphael Sanchez](https://www.linkedin.com/in/raphael-sanchez-design/)
- [Olivier Martineau](https://www.linkedin.com/in/omartineau/)

## Report issues

Si vous avez des problèmes avec le code, n'hésitez pas à [ouvrir une issue](https://github.com/raphaelsanchez/nws-initiation-php-mysql/issues/new)
