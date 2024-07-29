document.getElementById('logoutButton').addEventListener('click', function(e) {
    e.preventDefault();
    
    fetch('../logout.php', {
      method: 'POST',
      credentials: 'same-origin'
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        window.location.href = 'sign_in.html'; // Redirige a la página de inicio de sesión
      } else {
        console.error('Error al cerrar sesión');
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  });