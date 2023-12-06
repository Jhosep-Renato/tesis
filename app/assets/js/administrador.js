const formulario = document.getElementById("formularioDocente");
const guardar = document.getElementById("guardar");
const cerrar = document.getElementById("cerrar");
const inputBuscar = document.querySelector(".rounded");
const tabla = document.querySelector(".table")
const tbody = tabla.querySelector("tbody");
const d = document.getElementById("docente");
const asignar = document.getElementById("asignar");
const formularioCurso = document.getElementById("formularioCurso");
// Llenado de tabla al iniciar administrador

fetch("../../controller/AdministradorController.php", {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json'
    }
})
    .then((res) => res.json())
    .then((data) => llamarTablaCurso(data))


guardar.addEventListener("click", () => {

    const formData = new FormData(formulario);
    const radios = document.getElementsByName("opcion");

    let seleccionado;
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            seleccionado = radios[i].value;
            break;
        }
    }

    const docente = {
        nombre: formData.get("nombre"),
        apellidoP: formData.get("apellidoP"),
        apellidoM: formData.get("apellidoM"),
        sexo: formData.get("sexo"),
        telefono: formData.get("telefono"),
        dni: formData.get("dni"),
        edad: formData.get("edad"),
        opcion: seleccionado
    }

    fetch("../../controller/AdministradorController.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: 
            JSON.stringify( {docente: docente} )
    })
        .then((res) => res.json())
        .then((data) => {
            if(seleccionado === 'si') {
                d.value = data;
            }
        });

    limpiarFormulario();
});

asignar.addEventListener("click", () => {

    const formData = new FormData(formularioCurso);

    const curso = {
        docente: formData.get("docente"),
        curso: formData.get("curso"),
        fechaInicio: formData.get("fechaInicio"),
        fechaFinal: formData.get("fechaFin"),
        grupo: formData.get("grupo")
    }

    fetch("../../controller/AdministradorController.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body:
            JSON.stringify( {curso: curso} )

    })
        .then((res) => res.json())
        .then((data) => {
            console.log(data);
        })
});

/* buscar.addEventListener("click", () => {

    const codDocente = document.querySelector(".rounded").value;

    if(codDocente !== "") {
        fetch("../../controller/AdministradorController.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body:
                JSON.stringify( {codigo: codDocente} )

        })
            .then((res) => res.json())
            .then((data) => {
                if(data !== null) {
                    if(data.length > 0) {

                    }
                    divTabla.style.display = 'block';
                }
                console.log(data);
            })
    }
    else {
        divTabla.style.display = 'none';
        alert("Digite un codigo");
    }
})
 */
cerrar.addEventListener("click", () => {
    limpiarFormulario();
});

function limpiarFormulario() {

    for(let i = 0; i < formulario.elements.length; i++) {

        if(formulario.elements[i].type == 'text') {
            formulario.elements[i].value = '';
        }
    }
}

function llamarTablaCurso(datos) {

    eliminarFilas(tbody);
    datos.forEach(d => {

        const tr = document.createElement('tr');
        const td1 = document.createElement('td');
        const td2 = document.createElement('td');
        const td3 = document.createElement('td');
        const td4 = document.createElement('td');

        td1.textContent = d['idGrupo'];
        td2.textContent = d['nombre'];
        td3.textContent = d['idHorario'];
        td4.textContent = d['codigoDocente'];


        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);

        tbody.appendChild(tr);
    });
}

function eliminarFilas(tbody) {
    while(tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }
}