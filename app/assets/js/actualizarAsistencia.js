import { alumnosTabla, eliminarFilas } from "./reutilizar.js";

const fecha = document.getElementById('fecha');
const mensaje = document.querySelector('.mensaje');
const historialDiv = document.querySelector(".asistenciaDiv");
const h2 = document.querySelector(".h2");
const cursos2 = document.querySelector('.cursos2');
const tb = document.querySelector('.tbActualizacion');
const tbody = tb.querySelector('tbody');
const actualizar = document.getElementById("actualizar");

// CODIGO AL HACER INTERACCION CON LOS OPTIONS O INPUT DATE 
fetch('../controller/DocenteController.php?obtenerCursos=obtenerCurso', {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json'
    }
})
        .then((res) => res.json())
        .then((data) => {
            data.forEach(curso => {

                const option = document.createElement('option');

                option.value = curso["codigoCurso"];
                option.id = curso["codigoCurso"];
                option.innerHTML = curso["nombre"];

                cursos2.appendChild(option);
            });
        })
        .catch((err) => console.error('Error al obtener los cursos' + err) );


const texto = h2.innerHTML.split(",");
cursos2.addEventListener("change", () => {

    if(cursos2.value === 'seleccionar') {
        fecha.value = "";
        mensaje.style.display = 'block';
        historialDiv.style.display = 'none';
        h2.innerHTML = texto[0] + ", seleccione el curso por favor";
    }
    else if(cursos2.value !== 'seleccionar') {
        fecha.value = "";
        h2.innerHTML = texto[0] + ", seleccione la fecha por favor";
    }
});

fecha.addEventListener("change", () => {
    if(fecha.value !== "" && cursos2.value !== 'seleccionar') {
        let filas = tbody.rows.length;
        if(filas > 0) {
            eliminarFilas(tbody);
        }
        obtenerAlumno();
        historialDiv.style.display = 'block';
        mensaje.style.display = 'none';
    }
    else if(fecha.value === '') {
        historialDiv.style.display = 'none';
        mensaje.style.display = 'block';
    }
})


// BLOQUE PARA LA ACTUALIZACION DE ASISTENCIA
let datos = null;
function obtenerAlumno() {
    let i = cursos2.selectedIndex;
    let curso = cursos2.options[i].id;
    
    fetch(`../controller/DocenteController.php?curso=${curso}&fecha=${fecha.value}`, {
        method: 'GET',
        headers: {
            'Content-Type' : 'application/json'
        },
    })
        .then((res) => res.json())
        .then((data) => {   
            datos = data;
            if(data !== null) {
                alumnosTabla(data, tbody, true);
            } else {
                console.log("No hay nada que traer");
            }
            
        })
        .catch((err) => {
            console.error('Error al obtener los alumnos: ' + err)
        });
}

actualizar.addEventListener("click", () => {
    let arrayAsistencias = extraerDatos();
    actualizarTabla(arrayAsistencias, "actualizar");
});

function actualizarTabla(asistencias, actualizar) {


    fetch("../controller/DocenteController.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: 
            JSON.stringify({ asistencias: asistencias, actualizar: actualizar, validacion: true })
    })
        .then(res => res.text())
        .then(data =>  {
            
            if(actualizar !== null && data == 'actualizado') {
                console.log("Actualizado correctamente!");
            } else if(actualizar == null && data == 'registrado'){
                console.log("Asistencia Registrada!");
            }
        })
}

function extraerDatos() {
    let filas = tbody.getElementsByTagName('tr');
    let i = cursos2.selectedIndex;
    let curso = cursos2.options[i].id;
    let arrayAsistencias = [];
    
    for(let i = 0; i < filas.length; i++) {
        let celda = filas[i].getElementsByTagName('td');

        const asistencia = {
            codigoAlumno : celda[0].innerHTML,
            fecha : celda[2].innerHTML,
            estado : celda[3].innerHTML,
            curso : curso
        }
        arrayAsistencias.push(asistencia);
    }
    return arrayAsistencias;
}