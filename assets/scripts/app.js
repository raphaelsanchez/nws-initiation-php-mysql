/*
  Ce fichier est chargé sur toutes les pages du site.
  Il contient du code JavaScript qui doit être exécuté sur toutes les pages.
  Par exemple, le code qui gère le formulaire de newsletter.

  Pour ajouter du code spécifique à une page, créez un fichier nommé comme la page.
  Par exemple, pour la page "contact.html", créez un fichier "contact.js" dans le même dossier.
 */

/**
 * EVENT LISTENER
 *
 * on écoute l'événement "DOMContentLoaded" sur le document pour vérifier que le DOM est bien chargé
 * (c'est-à-dire que la page est bien prête)
 * et on exécute une fonction qui contient notre code JavaScript
 * (c'est une bonne pratique pour éviter les problèmes de chargement)
 *
 * Note: on utilise une fonction fléchée (ES6) pour définir la fonction de rappel
 */
document.addEventListener("DOMContentLoaded", () => {
  /* On affiche un message dans la console pour vérifier que le fichier est bien chargé (pas obligatoire, mais pratique pour le débugger) */
  console.log("app.js chargé 🚀");
  /* On initialise la fonction newsletterSubscribe */
  newsletterSubscribe();
  /* On initialise aussi la fonction toggleThemeMode() */
  toggleThemeMode();
});

/**
 * Fonction qui gère le formulaire de newsletter
 *
 * Cette fonction est appelée dans l'event listener ci-dessus si le formulaire de newsletter est présent.
 * Elle permet de vérifier que l'email est valide et active le bouton d'envoi si c'est le cas.
 */
function newsletterSubscribe() {
  /* On cible le formulaire de newsletter grace à son id en utilisant querySelector() et on le stock dans une constante "newsletterForm" */
  const newsletterForm = document.querySelector("#newsletter-form");

  /* Si le formulaire n'existe pas, on sort de la fonction ce n'est pas la peine de continuer */
  if (newsletterForm === null) {
    return;
  }

  /* On récupère l'input de l'email et on le stock dans une constante "emailInput" */
  const emailInput = newsletterForm.querySelector("input[type=email]");
  /* On récupère le bouton d'envoi et on le stock dans une constante "submitButton" */
  const submitButton = newsletterForm.querySelector("button[type=submit]");

  /* On commence par désactiver le bouton d'envoi par défaut pour éviter l'envoi avant vérification du champ */
  submitButton.disabled = true;

  /* On créer une fonction de rappel qui vérifie si l'email est valide */
  function validate() {
    /* Si l'email est valide, on active le bouton d'envoi */
    if (validateEmail(emailInput.value)) {
      submitButton.disabled = false;
    } else {
      /* Sinon, on désactive le bouton d'envoi */
      submitButton.disabled = true;
    }
  }

  /* On créé une fonction qui vérifie si l'email est valide grace à une RegExp */
  function validateEmail(email) {
    const regExp = /\S+@\S+\.\S+/;
    return regExp.test(email);
  }

  /** On pourrait imaginer d'autres fonctions de validation de champ comme un âge minimum par exemple ... */

  /**
   * Enfin, On écoute l'événement "input", c'est à dire quand l'utilisateur tape du text, sur l'input de l'email
   * et on appelle la fonction validate à chaque fois que l'événement est déclenché pour vérifier si l'email est valide
   */
  emailInput.addEventListener("input", validate);
}

/**
 * Fonction qui gère le mode sombre/clair
 */
function toggleThemeMode() {
  // TODO: écrire le code qui permet de changer de thème

  // 1. On cible le bouton qui permet de changer de thème
  const themeButton = document.querySelector("[data-toggle='theme']");
  // 2. On cible le html pour changer le data-theme
  // 3. On écoute l'événement "click" sur le bouton
  themeButton.addEventListener("click", () => {
    alert(
      "🚧\n Le theme switcher n'est pas encore implémenté ! \n\n Veuillez corriger le JavaScript"
    );
    // 4. On toggle le data-theme du html
    // 5. On permute les icones moon et sun en enlevant l'attribut hidden sur l'icone correspondante
  });
}
