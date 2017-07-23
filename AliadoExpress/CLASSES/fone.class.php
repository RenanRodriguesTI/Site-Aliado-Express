<?php

class fone{
 
        //atributos inten do romaneio
        private $cod_cliente;
        private $numero_fone;
        private $mensagem;

        //construtor
        public function __construct($cod_cliente=null, $numero_fone=""){
            //objetos
            if($cod_cliente==null)
            {
                $this->cod_cliente = new cod_cliente();
            }
            else
            {
                $this->cod_cliente = $cod_cliente;
            }
          
                
                $this->numero_fone = $numero_fone;
                $this->mensagem = array();
        }


    public function getcod_cliente(){
		return $this-> cod_cliente;
	}

	public function setcod_cliente($cod_cliente){
		$this->cod_cliente = $cod_cliente;
	}

    public function getnumero_fone(){
        return $this->numero_fone;
    }

    public function setnumero_fone($numero_fone){
        $this->numero_fone = $numero_fone;
    }
   
    //VERIFICA SE FONE É NUMERICO1''
    public function verificacao($fone) 
      {     
        if (!is_numeric($this->numero_fone))
        {
           return false;
             $mensagem[] = 'VERIFIQUE CAMPO TELEFONE E TENTE NOVAMENTE!!!';
        } 
      }
      
  
}    
?>