document.getElementById('submitButton').addEventListener('click', function () {
	var nombre = document.getElementsByName('nombre')[0].value.trim();
	var apPaterno = document.getElementsByName('Ap')[0].value.trim();
	var apMaterno = document.getElementsByName('Am')[0].value.trim();
	var usuario = document.getElementsByName('usuario')[0].value.trim();
	var email = document.getElementsByName('email')[0].value.trim();
	var password = document.getElementById('password').value.trim();
	var confirmPassword = document.getElementById('confirmPassword').value.trim();
	var errorContainer = document.getElementById('errorContainer');

	var passwordPattern = /^(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?])(?=.*\d)[A-Za-z\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]{8,}$/;

	if (!nombre || !apPaterno || !usuario || !email || !password || !confirmPassword) {
		errorContainer.style.display = 'block';
		errorContainer.textContent = 'Todos los campos obligatorios deben estar completos';
	} else if (password !== confirmPassword) {
		errorContainer.style.display = 'block';
		errorContainer.textContent = 'Las contraseñas no coinciden';
		document.getElementById('confirmPassword').value = ''; // Limpiar solo el campo de confirmación de contraseña
	} else if (!passwordPattern.test(password)) {
		errorContainer.style.display = 'block';
		errorContainer.textContent = 'La contraseña debe tener al menos 8 caracteres, una letra mayúscula y un carácter especial';
		document.getElementById('password').value = ''; // Limpiar el campo de contraseña
		document.getElementById('confirmPassword').value = ''; // Limpiar el campo de confirmación de contraseña
	} else {
		errorContainer.style.display = 'none';
		document.getElementById('registroForm').submit(); // Enviar el formulario si todos los campos están completos y las contraseñas coinciden
	}
});