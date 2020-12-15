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
}