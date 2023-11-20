const cursos = document.getElementById('cursos');
const divAsistencia = document.querySelector('.asistenciaDiv');
const mensaje = document.querySelector('.mensaje');


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
        mensaje.style.display = 'block';
        divAsistencia.style.display = 'none';
    }
    else {
        mensaje.style.display = 'none';
        divAsistencia.style.display = 'block';
    }
});