import { cursos } from "./interaccion.js"; // exportanciones con nombres

const divAsistencia = document.querySelector('.asistenciaDiv');
const mensaje = document.querySelector('.mensaje');
const tbasistencia = document.querySelector('.tbAsistencia');
const tbody = tbasistencia.querySelector('tbody');


cursos.addEventListener("change", () => {
    
    if(cursos.value === 'seleccionar') {
        mensaje.style.display = 'block';
        divAsistencia.style.display = 'none';
    }
    else {
        let filas = tbody.rows.length;
        if(filas > 0) {
            eliminarFilas();
        }

        mensaje.style.display = 'none';
        divAsistencia.style.display = 'block';

        let i = cursos.selectedIndex;
        obtenerAlumnos(cursos.options[i].id);
    }
});

function obtenerAlumnos(curso) {
    fetch(`../controller/DocenteController.php?action=obtenerAlumno&curso=${curso}`)
        .then((res) => res.json())
        .then((data) => {   

            data.forEach(a => {
                const tr = document.createElement('tr');
                const td1 = document.createElement('td');
                const td2 = document.createElement('td');
                const td3 = document.createElement('td');
                const td5 = document.createElement('td');
                const td4 = document.createElement('td');

                const botones = inicializarBotones();

                const date = Date.now();

                td1.textContent = a['codigo'];
                td2.textContent = `${a['nombre']} ${a['apePaterno']} ${a['apeMaterno']}`;
                td3.textContent = `${new Date(date).toLocaleDateString()}`
                td5.appendChild(botones[0]);
                td5.appendChild(botones[1]);

                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);
                tr.appendChild(td5);

                tbody.appendChild(tr);
            });

            agregarFunciones();
        })
        .catch((err) => {
            console.error('Error al obtener los alumnos: ' + err)
        });
}

function inicializarBotones() {

    const button1 = document.createElement('button');
    const button2 = document.createElement('button');
    const img1 = document.createElement('img');
    const img2 = document.createElement('img');

    button1.classList.add("btnI", "btn", "check");
    button2.classList.add("btnI", "btn", "x");
    img1.classList.add("bimg");
    img2.classList.add("bimg");
    img1.src = "../assets/img/check.png";
    img2.src = "../assets/img/x.png";

    button1.appendChild(img1);
    button2.appendChild(img2);

    return [button1, button2];
}

function eliminarFilas() {
    while(tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }
}

function agregarFunciones() {

    const botones = document.querySelectorAll('.btnI');

    botones.forEach((b) => {
        b.addEventListener('click', () => {
            if(b.classList.contains('check')) {
                let indice = posicionBotones(b);
                indice.textContent = 'P';
                indice.style.backgroundColor = '#B9EAB3';

            } else if(b.classList.contains('x')) {
                let indice = posicionBotones(b);
                indice.textContent = 'F';
                indice.style.backgroundColor = '#D9B4BB';
            }   
        })
    });
}

function posicionBotones(boton) {
    const columna = boton.parentElement;
    const fila = columna.parentElement;
    const indiceColumna = Array.from(fila.children).indexOf(columna);

    return columna.parentElement.cells[indiceColumna - 1];
}


document.getElementById('registrar').addEventListener('click', () => {
    let filas = tbody.getElementsByTagName('tr');
    let i = cursos.selectedIndex;
    let curso = cursos.options[i].id;
    let array = [];
    for(let i = 0; i < filas.length; i++) {
        let celda = filas[i].getElementsByTagName('td');

        const asistencia = {
            codigoAlumno : celda[0].innerHTML,
            fecha : celda[2].innerHTML,
            estado : celda[3].innerHTML,
            curso : curso
        }

        array.push(asistencia);
    }

    registrarAsistencia(array);
})

const alerta = document.querySelector('.alert');
function registrarAsistencia(asistencias) {

    fetch("../controller/DocenteController.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: 
            JSON.stringify(asistencias)
    })
        .then(res => res.text())
        .then(data =>  {
            
            if(data === "registrado") {
                alerta.style.display = 'block';

                setTimeout(() => {
                    alerta.style.display = 'none';
                }, 3000);
            }
        })
}