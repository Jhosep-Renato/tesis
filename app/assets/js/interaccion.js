export const cursos = document.querySelector('.cursos');

fetch('../controller/DocenteController.php?action=obtenerCurso')
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

