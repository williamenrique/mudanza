<?php
class Home extends Controllers{
	public function __construct(){
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function home(){
			$data['page_title'] = "Mudanzas - Home";
			$data['page_link'] = "home";
		$this->views->getViews($this, "home",$data);
	}
}