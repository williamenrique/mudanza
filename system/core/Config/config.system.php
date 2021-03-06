<?php
// const BASE_URL = "https://transportemudanzas.cl/";
const BASE_URL = "http://mudanzas.cl/";
const LIBS = "system/core/Libraries/";
const VIEWS = "system/app/Views/";
date_default_timezone_set('America/Caracas');

//rutas de assets
const CSS = BASE_URL."src/css/";
const JS = BASE_URL."src/js/";
const IMG = BASE_URL."src/images/";
//constantes del template admin
const PLUGINS = BASE_URL."src/plugins/";

const CONTROLLER = BASE_URL."system/core/Libraries/Controllers.php";
const LOAD = BASE_URL."system/core/Libraries/Load.php";

// constantes de base de datos
const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASS = "";
const DB_NAME = "bd_mudanza";

// const DB_HOST = "localhost";
// const DB_USER = "transportemudanzas_app";
// const DB_PASS = "53hlBBMgj";
// const DB_NAME = "transportemudanzas_app";

const DB_CHARSET = "charset=utf8";

//constantes de encriptacion
define('METHOD','AES-256-CBC');
define('SECRET_KEY','Mud@n5a');
define('SECRET_IV','101712');


/* CREAR NUEVAS CONST PARA EL EMAIL */
const EMAIL = "contacto@transportemudanzas.cl";
const CONTACTO = "transportejcm1286@gmail.com";