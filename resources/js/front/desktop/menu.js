// Le aplicamos export para poder importarlo al documneto conjusto de java en este caso, app-mobile.
// y le aplicamos el nombre en este caso, renderMenu (que volveremos a meter en app-mobile).
// Esto por cada variable o conjunto de variables generadas.
export let renderMenu = () => {

    // let, indica que vamos a aplicarle una variable a un elemento (div) de html. Generamos una
    // variable a la cual le daremos eventos (acciones).

    // En este caso, a la variable, le denominamos, menuButton para identificar la acción del botón.
    // Nuestro botón o hamburguesa (en este caso) denominado en html "collapse-button".
    let menuButton = document.getElementById("collapse-button");
    // Además, le damos una variable al menú, que se active y desactive con el button.
    let menu = document.getElementById("menu");

    // Esto es el evento de la variable (let) que hemos denominado "menuButton" ya que se lo aplica-
    // mos al botón (hamburguesa) que tenemos en el menú de nuestra cabecera html.
    // El evento es que al hacer click con el ratón, se active la acción. En este caso, se activará
    // o aparecerá el menú a la vez que la hamburguesa se transforma en una x (ver css/scss).
    menuButton.addEventListener("click", () => {
        menuButton.classList.toggle("active");
        menu.classList.toggle("active");
    });
}