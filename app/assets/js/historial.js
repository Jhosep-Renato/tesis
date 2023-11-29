import { cursos } from "./interaccion.js";

const fecha = document.getElementById('fecha');
const mensaje = document.querySelector('.mensaje');
const historialDiv = document.querySelector(".historialDiv");
const h2 = document.querySelector(".h2")


const texto = h2.innerHTML.split(",");
cursos.addEventListener("change", () => {

    if(cursos.value === 'seleccionar') {
        fecha.value = "";
        mensaje.style.display = 'block';
        historialDiv.style.display = 'none';
        h2.innerHTML = texto[0] + ", seleccione el curso por favor";
    }
    else if(cursos.value !== 'seleccionar') {
        fecha.value = "";
        h2.innerHTML = texto[0] + ", seleccione la fecha por favor";
    }
});

fecha.addEventListener("change", () => {
    if(fecha.value !== "" && cursos.value !== 'seleccionar') {
        historialDiv.style.display = 'block';
        mensaje.style.display = 'none';
    }
    else if(fecha.value === '') {
        historialDiv.style.display = 'none';
        mensaje.style.display = 'block';
    }
})