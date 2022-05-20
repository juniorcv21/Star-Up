var boton = document.getElementById('boton');
		var input = document.getElementById('contraseña');

		boton.addEventListener('click',mostrarContraseña);

		function mostrarContraseña(){
			if (input.type == "password") {
				input.type = "text";
				boton.src = "image/ocultar.png";
			} else{
				input.type = "password";
				boton.src = "image/mostrar.png";
			}
		}