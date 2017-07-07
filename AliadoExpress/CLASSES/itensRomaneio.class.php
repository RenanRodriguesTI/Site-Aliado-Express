<?php
require_once "romaneio.class.php";
require_once "encomenda.class.php";
class itensromaneio{
 
        //atributos inten do romaneio
        private $codencom;
        private $codromaneio;
      

        //construtor
        public function __construct($codencom=null, $codromaneio=null){
            //objetos
            if($codencom==null)
            {
                $this->codencom = new encomenda();
            }
            else
            {
                $this->codencom = $codencom;
            }

            if($codromaneio==null)
            {
                $this->codromaneio = new romaneio();
            }
            else
            {
                $this->codromaneio = $codromaneio;
            }
        }

    public function getCodencom(){
		return $this->codencom;
	}

	public function setCodencom($codencom){
		$this->codencom = $codencom;
	}

	public function getCodromaneio(){
		return $this->codromaneio;
	}

	public function setCodromaneio($codromaneio){
		$this->codromaneio = $codromaneio;
	}
}    
?>