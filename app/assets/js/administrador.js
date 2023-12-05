const formulario = document.getElementById("formularioDocente");
const guardar = document.getElementById("guardar");
const buscar = document.querySelector(".buscar");
const divTabla = document.querySelector(".tabla");
const cerrar = document.getElementById("cerrar");
const inputBuscar = document.querySelector(".rounded");

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
            if(seleccionado !== 'no') {
                inputBuscar.value = data;
            }
        });

    limpiarFormulario();
});


buscar.addEventListener("click", () => {

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

function llenarTabla() {
    
}