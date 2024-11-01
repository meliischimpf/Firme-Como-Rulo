function darBaja(id_alumno) {
    console.log("Alumno a dar de baja: " + id_alumno); // Agrega esto
    if (confirm('¿Estás seguro de que deseas dar de baja a este alumno?')) {
        fetch('darBaja.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=dar_baja&id_alumno=' + id_alumno
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return response.text();
        })
        .then(data => {
            console.log(data);
            alert('Respuesta del servidor: ' + data);
            window.location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al dar de baja al alumno.');
        });
    }
}

