document.addEventListener('DOMContentLoaded', function() {

  /* hacer el envio de email */
  if (document.querySelector('#formEmail')) {
    // let btnEnvio = document.querySelector('#btnEnvio');
    var formEmail = document.querySelector('#formEmail');
    //agregar el evento al boton del formulario
    formEmail.onsubmit = function(e) {
      e.preventDefault();
      //     btnEnvio.innerHTML = `<button class="btn btn-primary" type="button" disabled>
      // 	<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      // 	Loading...
      // </button>`;

      let request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
      let ajaxUrl = base_url + 'Home/sendEmail';
      //creamos un objeto del formulario con los datos haciendo referencia a formData
      // var formData = new FormData(formEmail);
      //prepara los datos por ajax preparando el dom
      // request.open('POST', ajaxUrl);
      //envio de datos del formulario que se almacena enla variable
      // request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      // console.log(formData);
      // request.send(formData);
      var formElement = document.getElementById("formEmail");
      request.open("POST", ajaxUrl);
      request.send(new FormData(formElement));
      let txtNombre = document.querySelector('#nombre').value;
      let txtEmail = document.querySelector('#email').value;
      let txtAsunto = document.querySelector('#asunto').value;
      let txtMensaje = document.querySelector('#mensaje').value;
      // let data = 'nombre=' + txtNombre + '&email=' + txtEmail + '&asunto=' + txtAsunto + '&mensaje=' + txtMensaje;
      // request.send(data);
      //obtenemos los resultados
      request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
          //obtenemos los datos y convertimos en JSON
          let objData = JSON.parse(request.responseText);
          if (objData.status) {
            let mensaje = document.querySelector('.sent-message');
            // mensaje.style.display = 'block';
            mensaje.innerHTML = objData.msg;
            formEmail.reset();
            $('.sent-message').fadeIn(3000).delay(2000).fadeOut(2000);
          } else {
            notifi(objData.msg, 'error');
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
    formComent.onsubmit = function(e) {
      e.preventDefault();
      //obenemos todos los valores del formulario
      let intComentario = document.querySelector('#idComent').value;
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
      let formData = new FormData(formComent);
      //prepara los datos por ajax preparando el dom
      request.open('POST', ajaxUrl, true);
      //envio de datos del formulario que se almacena enla variable
      request.send(formData);
      //obtenemos los resultados
      request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
          //obtenemos los datos y convertimos en JSON
          let objData = JSON.parse(request.responseText);
          //leemos el ststus de la respuesta
          if (objData.status) {
            notifi(objData.msg, 'success');
            $('#modalComent').modal('hide');
            formComent.reset();
            /* recargamos la funcion que nos llama los comentarios */
            fntComent();
          } else {
            notifi(objData.msg, 'error');
          }
        }
      }
    }
  }

}, false);

window.addEventListener('load', function() {
    fntComent();
  }, false)
  /*************************
   * funcion para obtener los comentarios
   ************************/
function fntComent() {
  if (document.querySelector('.comments-container')) {
    let ajaxUrl = base_url + 'Home/getComents';
    //creamos el objeto para os navegadores
    let response = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    //abrimos la conexion y enviamos los parametros para la peticion
    response.open('GET', ajaxUrl, true);
    // response.getResponseHeader('Content-type', 'application/x-www-form-urlencoded');
    response.send();
    response.onreadystatechange = function() {
      if (response.readyState == 4 && response.status == 200) {
        //option obtenidos del controlador
        document.querySelector('.comments-container').innerHTML = response.responseText;
      }
    }
  }
}

/* contestar el comentario */
function fntReply(id) {
  document.querySelector('#idComent').value = ''; //limpiar el value del input hiden del modal
  document.querySelector('#titleModal').innerHTML = 'Contestar comentario';
  // document.querySelector('.modal-header').classList.replace('headerComentar', 'headerPreguntar');
  document.querySelector('#btnActionForm').classList.replace('btn-primary', 'btn-info');
  document.querySelector('#btnText').innerHTML = 'Contestar';

  //nos referimos a ese elmento aque lo hemos dado click
  var id = id;
  //creamos el objeto para os navegadores
  var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  var ajaxUrl = base_url + 'Home/getComent/' + id;
  //abrimos la conexion y enviamos los parametros para la peticion
  request.open('GET', ajaxUrl, true);
  request.send();
  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
      var objData = JSON.parse(request.responseText);
      if (objData.status) {
        document.querySelector('#idComent').value = objData.data.id;
      }
    }
    $('#modalComent').modal('show');
  }
}


/* abrir el modal */
function openModal() {
  document.querySelector('#idComent').value = ''; //limpiar el value del input hiden del modal
  document.querySelector('#titleModal').innerHTML = 'Crear Comentario';
  // document.querySelector('.modal-header').classList.replace('headerComentar', 'headerPreguntar');
  document.querySelector('#btnActionForm').classList.replace('btn-info', 'btn-primary');
  document.querySelector('#btnText').innerHTML = 'Comentar';
  document.querySelector('#formComent').reset();
  $('#modalComent').modal('show');
}