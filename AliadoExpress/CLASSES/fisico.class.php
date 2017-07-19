<?php
require "cliente.class.php";
    class cliente_fisico
    {
         private $rgfisica;
         private $cpffisica;
         private $codcliente;

		 public function __construct($codcliente=null,$rgfisica="",$cpffisica=""){
			 if($this->codcliente == null)
			 {
				 $this->codcliente = new cliente();
			 }
			 else
			 {
				 $this->codcliente = $codcliente;
			 }
			 $this->rgfisica = $rgfisica;
			 $this->cpffisica = $cpffisica;


		 }
         public function getCodcliente(){
		    return $this->codcliente;
	     }

	     public function setCodcliente($codcliente){
		    $this->codcliente = $codcliente;
	     }
         public function getRgFisica(){
		    return $this->rgfisica;
	     }

	     public function setRgFisica($codcliente){
		    $this->rgfisica = $rgfisica;
	     }
         public function getCpfFisica(){
		    return $this->cpffisica;
	     }

	     public function setCpfFisica($codcliente){
		    $this->cpffisica = $cpffisica;
	     }
    }
?>