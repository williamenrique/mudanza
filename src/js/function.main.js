document.addEventListener('DOMContentLoaded', function () {

	/* hacer el envio de email */
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

/* crear comentario */
	if (document.querySelector('#formComent')) {
		var formComent = document.querySelector('#formComent');
		//agregar el evento al boton del formulario
		formComent.onsubmit = function (e) {
			e.preventDefault();
			//obenemos todos los valores del formulario
			let intComentario =  document.querySelector('#idComent').value;
			var strTxtNombre = document.querySelector('#txtNombre').value;
			var strTxtEmail = document.querySelector('#txtEmail').value;
			var strtxtMensaje = document.querySelector('#txtMensaje').value;
			/*************************************************
			* creamos el objeto de envio para tipo de navegador
			* hacer una validacion para diferentes navegadores y crear el formato de lectura
			* y hacemos la peticion mediante ajax
			* usando un if reducido creamos un objeto del contenido en(request)
			*****************************************************/
			let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url + 'Home/setComent';
			//creamos un objeto del formulario con los datos haciendo referencia a formData
			let formData = new FormData(formComent );
			//prepara los datos por ajax preparando el dom
			request.open('POST', ajaxUrl, true);
			//envio de datos del formulario que se almacena enla variable
			request.send(formData);
			//obtenemos los resultados
			request.onreadystatechange = function () {
				if (request.readyState == 4 && request.status == 200) {
					//obtenemos los datos y convertimos en JSON
					let objData = JSON.parse(request.responseText);
					//leemos el ststus de la respuesta
					if (objData.status) {
						notifi(objData.msg, 'success');
						$("#modalComent").modal("hide");
						formComent.reset();
						/* recargamos la funcion que nos llama los comentarios */
					} else {
						notifi(objData.msg, 'error');
					}
				}
			}
		}
	}
}, false);

/* abrir el modal */
function openModal() {
	document.querySelector('#idComent').value = '';//limpiar el value del input hiden del modal
	document.querySelector('#titleModal').innerHTML = 'Crear Comentario';
	// document.querySelector('.modal-header').classList.replace('headerComentar', 'headerPreguntar');
	document.querySelector('#btnActionForm').classList.replace('btn-info', 'btn-primary');
	document.querySelector('#btnText').innerHTML = 'Comentar';
	document.querySelector('#formComent').reset();
	$("#modalComent").modal("show");
}



async function reply() {
	let id = 4;
	const { value: formValues } = await Swal.fire({
		title: 'Ingrese los datos',
		showCancelButton: true,
		cancelButtonColor: '#f51114',
		html:
			'<input id="swal-hidden" type="hidden" class="swal2-input" placeholder="Nombre" value="'+id+'">' +
			'<input id="swal-input1" class="swal2-input" placeholder="Nombre">' +
			'<input id="swal-input2" class="swal2-input" placeholder="Email">'+
			'<input id="swal-input3" class="swal2-input" placeholder="Comentario">',
		focusConfirm: false,
		preConfirm: () => {
			return [
				document.getElementById('swal-hidden').value,
				document.getElementById('swal-input1').value,
				document.getElementById('swal-input2').value,
				document.getElementById('swal-input3').value
			]
		}
	})

	if (formValues) {
		Swal.fire(JSON.stringify(formValues))
		/* Envio de datos por ajax */
	}
}

/* crear el comentario */
async function comment() {
	let id = 4;
	const { value: formValues } = await Swal.fire({
		title: 'Ingrese sus datos',
		showCancelButton: true,
		cancelButtonColor: '#f51114',
		html:
			'<input id="swal-hidden" type="hidden" class="swal2-input" placeholder="Nombre" value="'+id+'">' +
			'<input id="swal-input1" class="swal2-input" placeholder="Nombre">' +
			'<input id="swal-input2" class="swal2-input" placeholder="Email">'+
			'<input id="swal-input3" class="swal2-input" placeholder="Comentario">',
		focusConfirm: false,
		preConfirm: () => {
			return [
				document.getElementById('swal-hidden').value,
				document.getElementById('swal-input1').value,
				document.getElementById('swal-input2').value,
				document.getElementById('swal-input3').value
			]
		}
	})

	if (formValues) {
		Swal.fire(JSON.stringify(formValues))
		/* Envio de datos por ajax */
	}
}



$(".btnComent").click(function () {
	comment();
})