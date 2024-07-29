document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signupForm');
    const nombre = document.getElementById('nombre');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const password1 = document.getElementById('password1');
    const submitBtn = document.getElementById('submitBtn');
    const passwordError = document.getElementById('passwordError');
    const password1Error = document.getElementById('password1Error');
    const emailError = document.getElementById('emailError');
  
    const validatePassword = () => {
      const value = password.value;
      if (value.length < 8) {
        passwordError.textContent = 'La contraseña debe tener al menos 8 caracteres.';
        return false;
      }
      if (!/[A-Z]/.test(value)) {
        passwordError.textContent = 'La contraseña debe contener al menos una letra mayúscula.';
        return false;
      }
      if (!/[a-z]/.test(value)) {
        passwordError.textContent = 'La contraseña debe contener al menos una letra minúscula.';
        return false;
      }
      if (!/[0-9]/.test(value)) {
        passwordError.textContent = 'La contraseña debe contener al menos un número.';
        return false;
      }
      passwordError.textContent = '';
      return true;
    };
  
    const validatePasswordMatch = () => {
      if (password.value !== password1.value) {
        password1Error.textContent = 'Las contraseñas no coinciden.';
        return false;
      }
      password1Error.textContent = '';
      return true;
    };
  
    const validateEmail = () => {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email.value)) {
        emailError.textContent = 'Por favor, introduce un email válido.';
        return false;
      }
      emailError.textContent = '';
      return true;
    };
  
    const validateForm = () => {
      const isPasswordValid = validatePassword();
      const isPasswordMatch = validatePasswordMatch();
      const isEmailValid = validateEmail();
      const isNameValid = nombre.value.trim() !== '';
      
      submitBtn.disabled = !(isPasswordValid && isPasswordMatch && isEmailValid && isNameValid);
      
      return isPasswordValid && isPasswordMatch && isEmailValid && isNameValid;
    };
  
    [nombre, email, password, password1].forEach(input => {
      input.addEventListener('input', validateForm);
    });
  
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (validateForm()) {
          fetch('../register.php', {
            method: 'POST',
            body: new FormData(this)
          })
          .then(response => {
            if (!response.ok) {
              throw new Error('Error en la respuesta del servidor');
            }
            return response.json();
          })
          .then(data => {
            if (data.success) {
              window.location.href = data.redirect;
            } else {
              alert(data.message);
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('Hubo un error al procesar la solicitud. Por favor, intenta de nuevo más tarde.');
          });
        }
      });
  });
  document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', function() {
      const targetId = this.getAttribute('data-target');
      const passwordInput = document.getElementById(targetId);
      const icon = this.querySelector('i');
  
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });
  });