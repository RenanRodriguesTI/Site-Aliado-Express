<?php
 class motorista{
     private $Matricula;
     private $Nome ;
     private $RG;
     private $CPF;
     private $Fone;
     private $Login;
     private $Senha;
     private $Mensagem;

     //Construtor 
     public function __construct($Matricula="",$Nome="",$RG="",$CPF="",$Fone="",$Login="",$Senha="")
     {
         $this->Matricula = $Matricula;
         $this->Nome = $Nome;
         $this->RG = $RG;
         $this->CPF = $CPF;
         $this->Fone = $Fone;
         $this->Login = $Login;
         $this->Senha = $Senha;
     }


     	public function getMatricula(){
		return $this->Matricula;
	}

	public function setMatricula($Matricula){
		$this->Matricula = $Matricula;
	}

	public function getNome(){
		return $this->Nome;
	}

	public function setNome($Nome){
		$this->Nome = $Nome;
	}

	public function getRG(){
		return $this->RG;
	}

	public function setRG($RG){
		$this->RG = $RG;
	}

	public function getCPF(){
		return $this->CPF;
	}

	public function setCPF($CPF){
		$this->CPF = $CPF;
	}

	public function getFone(){
		return $this->Fone;
	}

	public function setFone($Fone){
		$this->Fone = $Fone;
	}

	public function getLogin(){
		return $this->Login;
	}

	public function setLogin($Login){
		$this->Login = $Login;
	}

	public function getSenha(){
		return $this->Senha;
	}

	public function setSenha($Senha){
		$this->Senha = $Senha;
	}

 }
?>