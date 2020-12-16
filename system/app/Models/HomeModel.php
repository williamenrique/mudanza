<?php
class HomeModel extends Mysql {
	private $intIdComent;
	private $strTxtNombre;
	private $strTxtEmail;
	private $strTxtMensaje;

	public function __construct(){
		parent::__construct();
	}

	public function insertComent(string $strTxtNombre, string $strTxtEmail, string $strTxtMensaje){
		$this->strTxtNombre = $strTxtNombre;
		$this->strTxtEmail = $strTxtEmail;
		$this->strTxtMensaje = $strTxtMensaje;

		$queryInsert = "INSERT INTO comentario(autor,email,contenido) VALUES(?,?,?)";
		$arrData = array($this->strTxtNombre,$this->strTxtEmail,$this->strTxtMensaje);
		$requestInser =$this->insert($queryInsert,$arrData);
		return $requestInser;
	}

	public function selectComents(){
		$sql = "SELECT  * FROM comentario ORDER BY id DESC";
		$request = $this->select_all($sql);
		return $request;
	}
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
	public function selectComent(int $idComent){
		$this->intIdComent = $idComent;
		$sql = "SELECT * FROM comentario WHERE id = $this->intIdComent";
		$request = $this->select($sql);
		return $request;
	}
}