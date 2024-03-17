/**
 * Passons maintenant à l'implémentation du JavaScript.
 *
 * Ce fichier contient du code JavaScript qui doit être exécuté sur toutes les pages.
 * Par exemple, le code qui gère le formulaire de newsletter.
 */

/**
 * EVENT LISTENER
 *
 * Un "event listener" est une fonction qui écoute un événement sur un élément HTML.
 *
 * Ici, on écoute l'événement "DOMContentLoaded" sur le document pour vérifier que le DOM est bien chargé (c'est-à-dire que la page est bien prête)
 * et on exécute une fonction qui contient notre code JavaScript (c'est une bonne pratique pour éviter les problèmes de chargement).
 *
 * Note: on utilise une fonction fléchée (ES6) pour définir la fonction de rappel
 */
document.addEventListener("DOMContentLoaded", () => {
  /* On affiche un message dans la console pour vérifier que le fichier est bien chargé (pas obligatoire, mais pratique débugger) */
  console.log("app.js chargé 🚀");

  /* On initialise la fonction newsletterSubscribe */
  newsletterSubscribe();

  /* On initialise aussi la fonction toggleThemeMode() */
  toggleThemeMode();
});

/**
 * Fonction qui gère le formulaire de newsletter
 *
 * Cette fonction est appelée dans l'event listener ci-dessus.
 * Elle nous sert à vérifier que l'email est valide et active le bouton d'envoi si c'est le cas.
 */
function newsletterSubscribe() {
  /* On commence par cibler le formulaire de newsletter grace à son id en utilisant querySelector() et on le stock dans une constante "newsletterForm" */
  const newsletterForm = document.querySelector("#newsletter-form");

  /* On récupère ensuite l'input de l'email et on le stock dans une constante "emailInput" */
  const emailInput = newsletterForm.querySelector("input[type=email]");

  /* On récupère aussi le bouton d'envoi et on le stock dans une constante "submitButton" */
  const submitButton = newsletterForm.querySelector("button[type=submit]");

  /* Maintenant, si le formulaire n'existe pas, ça ne sert à rien de continuer alors on sort de la fonction. */
  if (newsletterForm === null) {
    return;
  }

  /* On commence par désactiver le bouton d'envoi par défaut pour éviter l'envoi avant vérification du champ */
  submitButton.disabled = true;

  /* On créer une fonction de rappel qui vérifie si l'email est valide */
  function validateNewsletterEmailField() {
    if (validateEmail(emailInput.value)) {
      /* SI, validateEmail() return 'true' (l'email est valide) on active le bouton d'envoi */
      submitButton.disabled = false;
    } else {
      /* SINON, on désactive le bouton d'envoi */
      submitButton.disabled = true;
    }
  }

  /* On créé une fonction qui vérifie si l'email est valide grace à une RegExp */
  function validateEmail(email) {
    const regExp = /\S+@\S+\.\S+/;
    return regExp.test(email); /* return 'true' si email match avec regExp */
  }

  /* On pourrait imaginer d'autres fonctions de validation de champ comme un âge minimum par exemple ... */

  /**
   * Enfin, On écoute l'événement "input", c'est à dire quand l'utilisateur tape du text, sur l'input de l'email
   * et on appelle la fonction validate à chaque fois que l'événement est déclenché pour vérifier si l'email est valide
   */
  emailInput.addEventListener("input", validateNewsletterEmailField);
}

/**
 * Fonction qui gère le mode sombre/clair
 */
function toggleThemeMode() {
  /**
   * À VOUS DE JOUER !
   * ----------------------------------------------
   * Vous devez écrire le code qui permet de changer de thème en cliquant sur le bouton
   * Suivez les étapes ci-dessous pour implémenter cette fonctionnalité :
   */

  // 1. On cible le bouton qui permet de changer de thème
  const themeButton = document.querySelector("[data-toggle='theme']");

  // 2. On cible le html pour changer le data-theme

  // 3. On vérifie si le bouton existe sinon on sort de la fonction

  // 4. On écoute l'événement "click" sur le bouton
  themeButton.addEventListener("click", () => {
    // 5. On toggle le data-theme du html

    // 6. On permute les icônes "moon" et "sun" en enlevant l'attribut hidden sur l’icône correspondante

    // Note : Vous pourrez supprimer l'appel de la fonction showAlertMessage() une fois que votre code sera implémenté
    // et que vous aurez vérifié qu'il fonctionne correctement 😉
    showAlertMessage(
      "Le theme switcher n'est pas encore implémenté ! \n\n Veuillez corriger le code JavaScript correspondant pour le faire fonctionner."
    );
  });
}

/**
 * Fonction qui affiche une alerte
 * @param {string} message
 */
function showAlertMessage(message) {
  alert(message);
}
