<?php
require_once "cliente.class.php";
require_once "unidade.class.php";
    class encomenda{
        private $codencom;
        private $peso;
        private $data;
        private $valorfrete;
        private $obsencomenda;
        private $cliente;
        private $unidadedestino;
        private $unidadeorigem;

        //construtor
        public function __construct($codencom="",$peso="",$data="",$obsencomenda="",$valorfrete="",$cliente=null,$unidadeorigem=null,$unidadedestino=null){
            $this->codencom = $codencom;
            $this->peso =$peso;
            $this->data = $data;
            $this->valorfrete = $valorfrete;
			$this->obsencomenda = $obsencomenda;
            //objetos
            if($cliente==null)
            {
                $this->cliente = new cliente();
            }
            else
            {
                $this->cliente = $cliente;
            }
            if($unidadeorigem==null)
            {
                $this->unidadeorigem = new unidade();
            }
            else
            {
                $this->unidadeorigem = $unidadeorigem;
            }
            if($unidadedestino ==null)
            {
                $this->unidadedestino =new unidade();
            }
            else
            {
                $this->unidadedestino = $unidadedestino;;
            }

        }
    public function getCodencom(){
		return $this->codencom;
	}

	public function setCodencom($codencom){
		$this->codencom = $codencom;
	}

	public function getCepdestino(){
		return $this->cepdestino;
	}

	public function setCepdestino($cepdestino){
		$this->cepdestino = $cepdestino;
	}

	public function getCeporigem(){
		return $this->ceporigem;
	}

	public function setCeporigem($ceporigem){
		$this->ceporigem = $ceporigem;
	}

	public function getPeso(){
		return $this->peso;
	}

	public function setPeso($peso){
		$this->peso = $peso;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function getValorfrete(){
		return $this->valorfrete;
	}

	public function setValorfrete($valorfrete){
		$this->valorfrete = $valorfrete;
	}

	public function getObsencomenda(){
		return $this->obsencomenda;
	}

	public function setObsencomenda($obsencomenda){
		$this->obsencomenda = $obsencomenda;
	}

	public function getcliente(){
		return $this->cliente;
	}

	public function setcliente($cliente){
		$this->cliente = $cliente;
	}

	public function getunidadedestino(){
		return $this->codunidadedestino;
	}

	public function setunidadedestino($codunidadedestino){
		$this->codunidadedestino = $codunidadedestino;
	}

	public function getunidadeorigem(){
		return $this->codunidadeorigem;
	}

	public function setunidadeorigem($codunidadeorigem){
		$this->codunidadeorigem = $codunidadeorigem;
	}


    }

?>