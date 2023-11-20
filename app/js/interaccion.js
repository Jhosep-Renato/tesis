const cursos = document.getElementById('cursos');
const divAsistencia = document.querySelector('.asistenciaDiv');
const mensaje = document.querySelector('.mensaje');

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