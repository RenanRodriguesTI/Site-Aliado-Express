<?php
    class cliente_juridico{
        private $razaosocialjuridica;
         private $cnpjjuridica;
         private $codcliente;

         public function getCodcliente(){
		    return $this->codcliente;
	     }

	     public function setCodcliente($codcliente){
		    $this->codcliente = $codcliente;
	     }
         public function getRazaoSocialJuridica(){
		    return $this->razaosocialjuridica;
	     }

	     public function setRazaoSocialJuridica($codcliente){
		    $this->razaosocialjuridica = $razaosocialjuridica;
	     }
         public function getCnpjJuridica(){
		    return $this->cnpjjuridica;
	     }

	     public function setCnpjJuridica($codcliente){
		    $this->cnpjjuridica = $cnpjjuridica;
	     }
    }

?>