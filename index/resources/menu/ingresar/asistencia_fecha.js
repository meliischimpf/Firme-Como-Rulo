function registrarAsistencia(id_alumno, id_materia, presente) {
    const fecha_asistencia = new Date().toISOString().split('T')[0]; 

    fetch('gestionar_asistencia.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id_alumno=${id_alumno}&id_materia=${id_materia}&presente=${presente}&fecha_asistencia=${fecha_asistencia}`
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Asistencia registrada:', data);
    })
    .catch(error => {
        console.error('Error al registrar asistencia:', error);
    });
}