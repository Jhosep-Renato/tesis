import { alumnosTabla, inicializarBotones, eliminarFilas, agregarFunciones, posicionBotones } from "./reutilizar.js";

const divAsistencia = document.querySelector('.asistenciaDiv');
const mensaje = document.querySelector('.mensaje');
const tbasistencia = document.querySelector('.tbAsistencia');
export const tbody = tbasistencia.querySelector('tbody');
const registrar = document.getElementById('registrar');
const actualizar = document.getElementById('actualizar');
const cursos = document.querySelector(".cursos");

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

                cursos.appendChild(option);
            });
        })
        .catch((err) => console.error('Error al obtener los cursos' + err) );


cursos.addEventListener("change", async () => {
    
    if(cursos.value === 'seleccionar') {
        mensaje.style.display = 'block';
        divAsistencia.style.display = 'none';
    }
    else {
        let filas = tbody.rows.length;
        if(filas > 0) {
            eliminarFilas(tbody);
        }

        mensaje.style.display = 'none';
        divAsistencia.style.display = 'block';

        let i = cursos.selectedIndex;
        let curso = cursos.options[i].id;

        const asistencia = await obtenerAsistencia(curso);
        if(asistencia != null) {
           alumnosTabla(asistencia, tbody, false); 
           registrar.style.display = 'none';
           actualizar.style.display = 'block';
        } else {
            obtenerAlumnos(curso);
            registrar.style.display = 'block';
            actualizar.style.display = 'none';
        }
    }
});

function obtenerAlumnos(curso) {
    fetch(`../controller/DocenteController.php?curso=${curso}`, {/* ?action=obtenerAlumno&curso=${curso} */
        method: 'GET',
        headers: {
            'Content-Type' : 'application/json'
        },
    })
        .then((res) => res.json())
        .then((data) => {   
            alumnosTabla(data, tbody, false);
        })
        .catch((err) => {
            console.error('Error al obtener los alumnos: ' + err)
        });
}


registrar.addEventListener('click', () => {
    
    let arrayAsistencias = registrarActualizar();
    registrarAsistencia(arrayAsistencias, null);
})

function registrarActualizar() {
    let filas = tbody.getElementsByTagName('tr');
    let i = cursos.selectedIndex;
    let curso = cursos.options[i].id;
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

actualizar.addEventListener('click', () => {
    let arrayAsistencias = registrarActualizar();
    registrarAsistencia(arrayAsistencias, "actualizar");
});


const alerta = document.querySelector('.alert');
function registrarAsistencia(asistencias, actualizar) {

    const alert = document.getElementById('alert');

    fetch("../controller/DocenteController.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: 
            JSON.stringify({ asistencias: asistencias, actualizar: actualizar, validacion: false})
    })
        .then(res => res.text())
        .then(data =>  {
            console.log(data);
            if(actualizar !== null && data == 'actualizado') {
                bloques("Actualizado correctamente!");
            } else if(actualizar == null && data == 'registrado'){
                bloques("Asistencia Registrada!");
            }
        })
        
        function bloques(texto) {
            alert.innerHTML = texto;
            alerta.style.display = 'block';

            setTimeout(() => {
                alerta.style.display = 'none';
            }, 3000);
        }
}

async function obtenerAsistencia(curso) {

    return fetch("../controller/DocenteController.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body:
            JSON.stringify({ curso: curso})
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        if(data !== "null") {
            return data;
        }
        else {
            return null;
        }
            })
    .catch(error => {
        console.error('Error al obtener asistencia:', error);
        return null;
    });
}