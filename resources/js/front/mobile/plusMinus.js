// En cualquier momento podemos ver el valor de una variable escribiendo console.log y escribiendo
// dentro de los parentesis el nombre de la variable. En este ejemplo tenemos la variable "age" que
// hace referencia al input que tiene como id "age". Si queremos saber el valor de un input podemos
// escribir age.value.
//    " console.log(age.value); "


// Un condicional empieza siempre con un if, y dentro de los parentesis escribimos la condición que
// se tiene que cumplir. En este caso tenemos que el valor de la variable "age" sea menor que 18.
// Más de una condición else if.
//    "if(age.value <18) "       "else"    "else if(age.value >=18) "  . Todos continuados de alert.

export let plusMinus = () => {

    let botonMas = document.getElementById("mas");
    let botonMenos = document.getElementById("menos");


    if(botonMas){
        botonMas.addEventListener("click", () => {
            if(botonMas.dataset.boton == "mas" && cantidad.value < 20) {
                cantidad.value = (parseInt(cantidad.value) +1);
            }
        });
    }

    if(botonMenos){
        botonMenos.addEventListener("click", () => {
            if(botonMenos.dataset.boton == "menos" && cantidad.value >0) {
                cantidad.value = (parseInt(cantidad.value) -1);
            }
        });
    }
}




