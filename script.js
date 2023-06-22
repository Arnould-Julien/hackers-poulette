// Récupérer les éléments du formulaire
const form = document.querySelector('form');
const errorMessages = document.querySelectorAll('.error-message');

// Cacher les messages d'erreur initialement
errorMessages.forEach(message => message.style.display = 'none');

// Animation lors de la soumission du formulaire
form.addEventListener('submit', (event) => {
  event.preventDefault(); // Empêcher l'envoi du formulaire par défaut

  // Vérifier les champs requis et afficher les messages d'erreur appropriés
  let errors = false;

  const nomInput = document.getElementById('nom');
  const prenomInput = document.getElementById('prenom');
  const emailInput = document.getElementById('email');
  const descriptionInput = document.getElementById('description');

  if (nomInput.value.length < 2 || nomInput.value.length > 255) {
    displayErrorMessage(nomInput, 'Le nom doit contenir entre 2 et 255 caractères');
    errors = true;
  } else {
    hideErrorMessage(nomInput);
  }

  if (prenomInput.value.length < 2 || prenomInput.value.length > 255) {
    displayErrorMessage(prenomInput, 'Le prénom doit contenir entre 2 et 255 caractères');
    errors = true;
  } else {
    hideErrorMessage(prenomInput);
  }

  if (emailInput.value.length < 2 || emailInput.value.length > 255 || !validateEmail(emailInput.value)) {
    displayErrorMessage(emailInput, 'Veuillez entrer une adresse e-mail valide');
    errors = true;
  } else {
    hideErrorMessage(emailInput);
  }

  if (descriptionInput.value.length < 2 || descriptionInput.value.length > 1000) {
    displayErrorMessage(descriptionInput, 'La description doit contenir entre 2 et 1000 caractères');
    errors = true;
  } else {
    hideErrorMessage(descriptionInput);
  }

  if (!errors) {
    // Envoyer le formulaire si aucune erreur n'est présente
    form.submit();
  }
});

// Afficher un message d'erreur sous le champ de saisie
function displayErrorMessage(input, message) {
  const errorMessage = input.nextElementSibling;
  errorMessage.innerText = message;
  errorMessage.style.display = 'block';
}

// Cacher le message d'erreur
function hideErrorMessage(input) {
  const errorMessage = input.nextElementSibling;
  errorMessage.style.display = 'none';
}

// Valider l'adresse e-mail
function validateEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}
// Récupérer tous les champs du formulaire
const formFields = document.querySelectorAll('input, textarea');

// Appliquer l'animation au survol des champs
formFields.forEach(field => {
  field.addEventListener('mouseenter', () => {
    field.style.transition = 'background-color 0.3s ease';
    field.style.backgroundColor = '#f2f2f2';
  });

  field.addEventListener('mouseleave', () => {
    field.style.transition = 'background-color 0.3s ease';
    field.style.backgroundColor = 'transparent';
  });
});
