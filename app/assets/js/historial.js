import { eliminarFilas } from "./reutilizar.js";

const cursos = document.querySelector('.cursos');
const divHistorial = document.querySelector('.historialDiv');
const mensaje = document.querySelector('.mensaje');
const tbody = document.querySelector('tbody');

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
    
    if(cursos.value !== 'seleccionar') {
        divHistorial.style.display = 'block';
        mensaje.style.display = 'none';
        await obtenerAsistenciaCurso();
    }
    else {
        divHistorial.style.display = 'none';
        mensaje.style.display = 'block';
    }
});


async function obtenerAsistenciaCurso() {
    let i = cursos.selectedIndex;
    let curso = cursos.options[i].id;

    return fetch(`../controller/DocenteController.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify( {curso: curso, todo: "todo"} )
    })
        .then((res) => res.json())
        .then((data) => {

            let fechasUnicas = new Set();

            data.forEach(a => {
                fechasUnicas.add(a['fechaRegistro']);
            });
            let porcentaje = calcularAsistencia(fechasUnicas.size, data);
        })
        .catch((err) => console.error('Error al obtener la asistencia ' + err));
}

function calcularAsistencia(fechaUnicas, datos) {
    let i = 0;
    let registroAlumno = datos.length / fechaUnicas;
    let porcentajes = new Array(registroAlumno).fill(0);
    let nombresUnicos = new Set();

    datos.forEach(a => {

        if(a['estado'] === 'P') {
            porcentajes[i] += 100;
        } else if(a['estado'] === 'T') {
            porcentajes[i] += 75; 
        } else {
            porcentajes[i] += 50;
        }
        i++;
        if(i == registroAlumno) {
            i = 0;
        }
        nombresUnicos.add(`${a['codigo']}, ${a['nombre']}, ${a['apePaterno']}, ${a['apeMaterno']}`);
    });

    eliminarFilas(tbody);

    for (let item of nombresUnicos) {
        let alumno = item;
        let cortar = alumno.split(",");
        porcentajes[i] = (porcentajes[i] / (fechaUnicas * 100)) * 100;

        const tr = document.createElement('tr');
        const td1 = document.createElement('td');
        const td2 = document.createElement('td');
        const td3 = document.createElement('td');

        td1.textContent = cortar[0];
        td2.textContent = `${cortar[1]} ${cortar[2]} ${cortar[3]}`;
        td3.textContent = porcentajes[i];

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);

        tbody.appendChild(tr);
    }
}
