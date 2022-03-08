window.onload = () => {
    // On instancie Stripe et on lui passe notre clé publique
    let stripe = Stripe('pk_test_51KMXz2L8eUNbBHo6cVGTDBHw40tJQIKldLKtSbz8QGybAfAitnKitjrOhM2GkRm9wGlJ3fNfKfOTHWHkgmqodq5N00pBFIStLB');

    // Initialise les éléments du formulaire
    let elements = stripe.elements();

    // Définit la redirection en cas de succès du paiement
    let redirect = "indexpayement";

    // Récupère l'élément qui contiendra le nom du titulaire de la carte
    let cardholderName = document.getElementById('cardholder-name')

    // Récupère l'élement button
    let cardButton = document.getElementById('card-button');

    // Récupère l'attribut data-secret du bouton
    let clientSecret = cardButton.dataset.secret;


    let style = {
        base: {
            color: '#303238',
            fontSize: '16px',
            fontFamily: '"Open Sans", sans-serif',
            fontSmoothing: 'antialiased',
            '::placeholder': {
                color: '#CFD7DF',
            },
        },
        invalid: {
            color: '#e5424d',
            ':focus': {
                color: '#303238',
            },
        },
    };


    // Crée les éléments de carte et les stocke dans la variable card
    let card = elements.create("card", { style: style });

    card.mount("#card-elements");

    card.addEventListener('change', function(event) {
        // On récupère l'élément qui permet d'afficher les erreurs de saisie
        let displayError = document.getElementById("card-errors");

        // Si il y a une erreur
        if (event.error) {
            // On l'affiche
            displayError.textContent = event.error.message;
        } else {
            // Sinon on l'efface
            displayError.textContent = "";
        }
    });

    cardButton.addEventListener("click", () => {
        stripe.handleCardPayment(
            clientSecret, card, {
                payment_method_data: {
                    billing_details: {
                        name: cardholderName.value
                    }
                }
            }
        ).then((result) => {
            if (result.error) {
                document.getElementById("errors").innerText = result.error.message
            } else {
                document.location.href = redirect
            }
        })
    })
}