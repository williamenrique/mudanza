<?php
// const BASE_URL = "http://mudanzas.cl/";
const BASE_URL = "https://williamenrique.github.io/mudanza";
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

//constantes de base de datos
const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASS = "";
const DB_NAME = "";
const DB_CHARSET = "charset=utf8";

//constantes de encriptacion
define('METHOD','AES-256-CBC');
define('SECRET_KEY','B@53');
define('SECRET_IV','101712');

// datos de email
define('SMTPSecure' , 'tls');
define('Host'       , 'smtp.gmail.com');
define('Username'   ,'william21enrique@gmail.com');
define('Password'   ,'naca2105');
define('Port'       ,'587');