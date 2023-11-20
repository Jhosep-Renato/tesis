const cursos = document.getElementById('cursos');
const divAsistencia = document.querySelector('.asistenciaDiv');
const mensaje = document.querySelector('.mensaje');
const tbasistencia = document.getElementById('');

fetch('../controller/DocenteController.php?action=obtenerCurso')
        .then(res => res.json())
        .then(data => {

            data.forEach(curso => {

                const option = document.createElement('option');

                option.value = curso.curso;
                option.id = curso.codCurso;
                option.innerHTML = curso.curso;

                cursos.appendChild(option);
            });
        })
        .catch(err => {
            console.error('Error al obtener los cursos: ', err);   
})

cursos.addEventListener("change", () => {
    
    if(cursos.value === 'seleccionar') {
        
    }
    else {
        mensaje.style.display = 'none';
        divAsistencia.style.display = 'block';

        let i = cursos.selectedIndex;
        obtenerAlumnos(cursos.options[i].id);
    }
});


function obtenerAlumnos(curso) {
    fetch(`../controller/DocenteController.php?action=obtenerAlumno&curso=${curso}`)
        .then(res => res.json())
        .then(data => {

            console.log(data);
        })
        .catch(err => {
            console.error('Error al obtener los alumnos: ', err)
        });
}


{/* <button class="btnI btn"><img src="../img/check.png" class="bimg"></button> <button class="btnI btn"><img src="../img/x.png" class="bimg"></button> */}