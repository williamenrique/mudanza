document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelector('#formEmail')) {
		var formEmail = document.querySelector('#formEmail');
		//agregar el evento al boton del formulario
		formEmail.onsubmit = function (e) {
			e.preventDefault();

			let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + 'Home/sendEmail';
			//creamos un objeto del formulario con los datos haciendo referencia a formData
			let formData = new FormData(formEmail);
			//prepara los datos por ajax preparando el dom
			request.open('POST', ajaxUrl, true);
			//envio de datos del formulario que se almacena enla variable
			request.send(formData);
			//obtenemos los resultados
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					//obtenemos los datos y convertimos en JSON
					let objData = JSON.parse(request.responseText);
					if (objData.status) {
						let mensaje = document.querySelector(".sent-message");
						mensaje.style.display = 'block';
						mensaje.delay(1000).style.display = 'none';
						mensaje.innerHTML = objData.msg;
						formEmail.reset();
					} else {
						mensaje.style.display = 'block';
						mensaje.innerHTML = objData.msg;
						formEmail.reset();
					}
				}
			}
		}
	}

}, false);



async function reply() {
	let id = 4;
	const { value: formValues } = await Swal.fire({
		title: 'Ingrese los datos',
		html:
			'<input id="swal-hidden" class="swal2-input" placeholder="Nombre" value="'+id+'">' +
			'<input id="swal-input1" class="swal2-input" placeholder="Nombre">' +
			'<input id="swal-input2" class="swal2-input" placeholder="Email">'+
			'<input id="swal-input3" class="swal2-input" placeholder="Comentario">',
		focusConfirm: false,
		preConfirm: () => {
			return [
				document.getElementById('swal-input1').value,
				document.getElementById('swal-input2').value,
				document.getElementById('swal-input3').value
			]
		}
	})

	if (formValues) {
		Swal.fire(JSON.stringify(formValues))
	}
}