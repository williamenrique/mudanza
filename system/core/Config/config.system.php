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
// const DB_USER = "transpo4_mudanza";
// const DB_PASS = "Tr@n5p0rt3";
// const DB_NAME = "transpo4_mudanza";
// const DB_CHARSET = "charset=utf8";

//constantes de encriptacion
define('METHOD','AES-256-CBC');
define('SECRET_KEY','Mud@n5a');
define('SECRET_IV','101712');


/* CREAR NUEVAS CONST PARA EL EMAIL */
const EMAIL = "contacto@transportemudanzas.cl";
// datos de email
define('SMTPSecure' , 'tls');
define('Host'       , 'smtp.gmail.com');
define('Username'   , 'william21enrique@gmail.com');
define('Password'   , 'naca2105');
define('Port'       , '587');