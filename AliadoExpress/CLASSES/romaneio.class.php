<?php

require_once "motorista.class.php";
require_once "caminhao.class.php";

class romaneio{
    private $codromaneio;
	private $motorista;
    private $codcaminhao;
    private $dataemissao;
	private $unidadedestino;
	private $unidadeorigem;
    

    public function __construct($codromaneio="",$dataemissao="", $motorista=null,$codcaminhao=null,$unidadeorigem=null,$unidadedestino=null)
    {
        $this->codromaneio = $codromaneio;
        $this->dataemissao = $dataemissao;
		if($motorista == null)
		{
			$this->motorista = new motorista();
		}
		else{
			$this->motorista = $motorista;

		}
		if($codcaminhao == null)
		{
			$this->codcaminhao = new caminhao();
		}
		else{
			 $this->codcaminhao = $codcaminhao;
		}
		if($unidadeorigem ==null)
		{
			$this->unidadeorigem = new unidade();
		}
		else{
			$this->unidadeorigem = $unidadeorigem;

		}
		if($unidadedestino == null)
		{
			$this->unidadedestino = new unidade();
		}
		else{
			$this->unidadedestino = $unidadedestino;

		}


      
      
        
    }

    public function getCodromaneio(){
		return $this->codromaneio;
	}

	public function setCodromaneio($codromaneio){
		$this->codromaneio = $codromaneio;
	}

	public function getDataemissao(){
		return $this->dataemissao;
	}

	public function setDataemissao($dataemissao){
		$this->dataemissao = $dataemissao;
	}

	public function getMotorista(){
		return $this->motorista;
	}

	public function setMotorista($motorista){
		$this->motorista = $motorista;
	}

	public function getCodcaminhao(){
		return $this->codcaminhao;
	}

	public function setCodcaminhao($codcaminhao){
		$this->codcaminhao = $codcaminhao;
	}
	public function getUnidadedestino(){
		return $this->unidadedestino;
	}

	public function setUnidadedestino($unidadedestino){
		$this->unidadedestino = $unidadedestino;
	}

	public function getUnidadeorigem(){
		return $this->unidadeorigem;
	}

	public function setUnidadeorigem($unidadeorigem){
		$this->unidadeorigem = $unidadeorigem;
	}
	
}


?>