<?php
require_once "cliente.class.php";
    class cliente_juridico{
        private $IE;
        private $CNPJ;
        private $codcliente;

		public function __construct($codcliente=null,$CNPJ="",$IE="")
		{
			if($codcliente == null)
			{
				$this->codcliente = new cliente();
			}
			else{
				$this->codcliente = $codcliente;

			}
			$this->CNPJ = $CNPJ;
			$this->IE = $IE;
		}
         public function getCodcliente(){
		    return $this->codcliente;
	     }

	     public function setCodcliente($codcliente){
		    $this->codcliente = $codcliente;
	     }
         
		public function getIE(){
		return $this->IE;
		}

		public function setIE($IE){
		$this->IE = $IE;
		}

		public function getCNPJ(){
		return $this->CNPJ;
		}

		public function setCNPJ($CNPJ){
		$this->CNPJ = $CNPJ;
		}
    }
	//fim da classe

?>