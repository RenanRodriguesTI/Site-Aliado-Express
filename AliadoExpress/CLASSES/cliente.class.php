<?php
//objeto cidade 
require_once "cidade.class.php";

//contém todos os atributos do cliente
    class cliente{
        private $codcliente;
        private $codcidade;
        private $nomecliente;
        private $email;
        private $endereco;
        private $bairro;
        private $cep;
		//objeto cliente ou funcionario
		private $login;
		private $senha;
    

	public function __construct($codcliente=0,$codcidade=null,$nomecliente="",$email="",$endereco="",$bairro="",$cep="",$login="",$senha="")
	{
		$this->codcliente=$codcliente;
		if($codcidade == null)
		{
			$this->codcidade = new cidade();
		}
		else{
			$this->codcidade = $codcidade;

		}
	
		$this->nomecliente=$nomecliente;
		$this->email = $email;
		$this->endereco = $endereco;
		$this->bairro = $bairro;
		$this->cep = $cep;
		$this->login = $login;
		$this->senha = $senha;
		
	
	}

    public function getCodcliente(){
		return $this->codcliente;
	}

	public function setCodcliente($codcliente){
		$this->codcliente = $codcliente;
	}

	public function getCodcidade(){
		return $this->codcidade;
	}

	public function setCodcidade($codcidade){
		$this->codcidade = $codcidade;
	}

	public function getNomecliente(){
		return $this->nomecliente;
	}

	public function setNomecliente($nomecliente){
		$this->nomecliente = $nomecliente;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEndereco(){
		return $this->endereco;
	}

	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	public function getCep(){
		return $this->cep;
	}

	public function setCep($cep){
		$this->cep = $cep;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}


    public function validacao()
    {
        //atribuir validações no objeto cliente
		/*

		*/
		return true;
    }
	
	 public function validacpf()
	 {
		   $cpfval=false;


          $dg1 = $dg2 = $num = $contcarat = $pos= 0;
		$cont = $verifdg1 = $verifdg2=0; 
		$soma1dig =  $soma2dig = 0;
		$mult = 2;
        $text="";
             
	 }
	
    }

?>