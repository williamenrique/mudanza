<?php
class HomeModel extends Mysql {
	private $intIdComent;
	private $intIdReply;
	private $strTxtNombre;
	private $strTxtEmail;
	private $strTxtMensaje;

	public function __construct(){
		parent::__construct();
	}
	/* obtener datos de la empresa */
	public function getDatos(){
		$sql = "SELECT  * FROM empresa";
		$request = $this->select($sql);
		return $request;
	}
	/* insertar comentario */
	public function insertComent(string $strTxtNombre, string $strTxtEmail, string $strTxtMensaje){
		$this->strTxtNombre = $strTxtNombre;
		$this->strTxtEmail = $strTxtEmail;
		$this->strTxtMensaje = $strTxtMensaje;

		$queryInsert = "INSERT INTO comentario(autor,email,contenido) VALUES(?,?,?)";
		$arrData = array($this->strTxtNombre,$this->strTxtEmail,$this->strTxtMensaje);
		$requestInser =$this->insert($queryInsert,$arrData);
		return $requestInser;
	}
	/* inseratr respuesta de comentario */
	public function insertReply(string $strTxtNombre, string $strTxtEmail, string $strTxtMensaje){

		$this->strTxtNombre = $strTxtNombre;
		$this->strTxtEmail = $strTxtEmail;
		$this->strTxtMensaje = $strTxtMensaje;

		$queryInsert = "INSERT INTO respuesta(nombre,email,respuesta) VALUES(?,?,?)";
		$arrData = array($this->strTxtNombre,$this->strTxtEmail,$this->strTxtMensaje);
		$requestInser =$this->insert($queryInsert,$arrData);
		return $requestInser;
	}
	/* unir comentario con respuesta */
	public function insertReplyComent(int $intIdComent, int $intIdReply){

		$this->intIdReply = $intIdReply;
		$this->intIdComent = $intIdComent;

		$queryInsert = "INSERT INTO coment_respuesta(id_comentario,id_respuesta) VALUES(?,?)";
		$arrData = array($this->intIdComent,$this->intIdReply);
		$requestInser =$this->insert($queryInsert,$arrData);
		return $requestInser;
	}
	/* seleccionar comenmtarios */
	public function selectComents(){
		$sql = "SELECT  * FROM comentario ORDER BY id DESC";
		$request = $this->select_all($sql);
		return $request;
	}
	/* seleccionar respuestas */
	public function selectReply(int $idComent){
		$this->intIdComent = $idComent;
		$sql = "SELECT a.id, a.nombre, a.email, a.respuesta , a.fecha
						FROM respuesta a
						INNER JOIN coment_respuesta b ON a.id = b.id_respuesta
						INNER JOIN comentario c ON c.id = b.id_comentario
						WHERE c.id = 	$this->intIdComent";
		$request = $this->select_all($sql);
		return $request;
	}
	/* seleccionar un solo comentario */
	public function selectComent(int $idComent){
		$this->intIdComent = $idComent;
		$sql = "SELECT * FROM comentario WHERE id = $this->intIdComent";
		$request = $this->select($sql);
		return $request;
	}
}