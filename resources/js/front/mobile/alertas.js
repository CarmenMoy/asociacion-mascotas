export let renderAlertas = (type, message) => {

    let alerta = document.getElementById('alerta');

    alerta.classList.add("active");
    alerta.classList.add(type);
    alerta.innerHTML = message;

    setTimeout( () => {
        alerta.classList.remove("active");
        alerta.classList.remove(type);
    }, 5000);
};