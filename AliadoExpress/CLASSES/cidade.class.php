<?php
//classe cidade
    class cidade{
        //atributo código da cidade da cidade
        private $codcidade;
        private $nomecidade;
        private $nomeestado;

        //métodos
        //construtor
        public function __construct($codcidade="",$nomecidade="",$nomeestado="")
        {
            $this->codcidade = $codcidade;
            $this->nomecidade = $nomecidade;
            $this->nomeestado = $nomeestado;
        }
        //retorna o código da cidade 
        public function getCodcidade(){
		return $this->codcidade;
	    }   
        //recebe código da cidade 
	    public function setCodcidade($codcidade){
		$this->codcidade = $codcidade;
	    }
        //retorna o nome da cidade
	    public function getNomecidade(){
		return $this->nomecidade;
	    }
        //recbe o nome da cidade
	    public function setNomecidade($nomecidade){
		$this->nomecidade = $nomecidade;
	    }
        //retorna o nome do estado
	    public function getNomeestado(){
		return $this->nomeestado;
	    }
        //recebe o nome do estado
	    public function setNomeestado($nomeestado){
		$this->nomeestado = $nomeestado;
	    }
    }
?>