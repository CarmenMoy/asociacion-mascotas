import {renderAlertas} from './alertas.js';
import {validator} from './validator.js';

export let renderForm = () => {

    let sendButton = document.getElementById('send-button');
    let forms = document.querySelectorAll('.front-form');

    if(sendButton){

        sendButton.addEventListener("click", () => {

            forms.forEach( form => {

                let validate = validator(form);

                validate.onSuccess( () => {

                    let formData = new FormData(form);

                    for (let entradas of formData.entries()) {
                        console.log(entradas[0]+ ': ' + entradas[1]); 
                    } 

                    renderAlertas('exito', 'Tu formulario se ha enviado correctamente. Muchas gracias por tu participación.');
                });

                validate.onFail( () => {
                    renderAlertas('error', 'Por favor, revise el formulario');
                });
            });
        });
    }
}