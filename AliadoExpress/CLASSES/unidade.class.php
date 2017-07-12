<?php
require_once "cidade.class.php";
 class unidade{
     //atributo correspondente ao código da unidade
     private $codunidade;
     //atributo correspondente ao nome da unidade
     private $nomeunidade;
     //atributo correspondente ao código da cidade
     private $cidade;

     //métodos
     public function __construct($codunidade="",$cidade=null,$nomeunidade="")
     {
        //o atributo codunidade recebe o parametro $codunidade
           $this->codunidade = $codunidade;
           //o atributo nomeunidade recebe o parametro $nomeunidade
           $this->nomeunidade = $nomeunidade;
           //o atributo codcidade recebe o parametro $codcidade
            if($cidade == null)
            {
                $this->cidade = new cidade();
            }
            else
            {
                $this->cidade =$cidade;
            }

            
         
       

     }
     //retorna o valor do atributo código unidade
    public function getCodunidade(){
		return $this->codunidade;
	}
    //recebe o valor do atributo código 
	public function setCodunidade($codunidade){
		$this->codunidade = $codunidade;
	}
    //retorna o nome da unidade
	public function getNomeunidade(){
		return $this->nomeunidade;
	}
    //recebe o nome da unidade
	public function setNomeunidade($nomeunidade){
		$this->nomeunidade = $nomeunidade;
	}
    //retorna código cidade 
	public function getCidade(){
		return $this->cidade;
	}
    //recebe o código da cidade
	public function setCidade($cidade){
        //alterar pois será necessário implementar o objeto
		$this->codcidade = $cidade;
	}

    public function validacao()
    {
        $this->mensagem = array();
        if($this->nomeunidade == "")
        {
            $this->mensagem[] = "Informe o nome da unidade";
        }
        else
        {
            if(is_numeric($this->nomeunidade))
            {
                $this->mensagem[] = "O nome da unidade é composto de letras e números";
            }
        }
        return empty($this->mensagem);
    }
 }
?>