import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

//recupero tutti i pulsanti di cancellazione della tabella dei post
const deleteSubmitButton = document.querySelectorAll('.delete-project-form button[type="submit"]');

//ciclo tutti i pulsanti
deleteSubmitButton.forEach((button) => {
    //ad ogni pulsante gli dico di rimanere in attesa di un evento click
    button.addEventListener('click', (event) => {
        //previene la sottomissione della form al click IMPORTANTISSIMO
        event.preventDefault();

        //recupero l'html della modale
        const modal = document.getElementById('confirmProjectDelete');

        //creo l'istanza della classe modal di bootstrap a partire dall'html che ho recuperato nel passaggio precedente
        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        //recupero il pulsante di cancellazione presente nella modale
        const buttonDelete = document.querySelector('.confirm-delete-button');

        //dico di rimanere in attesa di un evento click
        buttonDelete.addEventListener('click', () => {
            //dal pulsante recupero l'antenato e sottometto la form
            button.parentElement.submit();
        });
    })
});
