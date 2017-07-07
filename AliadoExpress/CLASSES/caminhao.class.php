<?php
class caminhao{

    //atributos da classe caminhao

    //código do caminhão
    private $idcaminhao;
    //código da placa do caminhão
    private $codplaca;
    //ano de fabricação
    private $anofab;
    //combustível do caminhão
    private $combustivel;
    private $mensagem;
    //métodos

    //construtor 
    //caso o construtor não receba valores externos por padrão terá os valores informados nos parametros
    public function __construct($idcaminhao="",$codplaca="",$anofab="",$combustivel="")
    {
        //o atributo idcaminhao recebe o parametro $idcaminhao
        $this->idcaminhao = $idcaminhao;
        //o atributo codplaca recebe o parametro $codplaca
        $this->codplaca = $codplaca;
        //o atributo anofab recebe o parametro $anofab
        $this->anofab = $anofab;
        //o atributo combustivel o parametro $combustivel
        $this->combustivel = $combustivel;
        //o atributo mensagem um array
        $this->mensagem = array();
    }


    //retorna o código do caminhao quando necessário
    public function getIdcaminhao(){
		return $this->idcaminhao;
	}

    //recebe o código do caminhão quando necessário
	public function setIdcaminhao($idcaminhao){
		$this->idcaminhao = $idcaminhao;
	}
    //retorna o código da placa do caminhão
	public function getCodplaca(){
		return $this->codplaca;
	}
    //recebe o código da placa do caminhão
	public function setCodplaca($codplaca){
		$this->codplaca = $codplaca;
	}
    //retorna o ano de fabricação do caminhão
	public function getAnofab(){
		return $this->anofab;
	}
    //recebe o ano de fabricação do caminhão
    public function setAnofab($anofab){
		$this->anofab = $anofab;
	}
    //retorna o valor do atributo combustivel
    public function getcombustivel()
    {
        return $this->combustivel;
    }
    //recebe o valor do atributo combustivel
    public function setcombustivel($combustivel)
    {
        $this->combustivel = $combustivel;
    }

    //Validações 
    //Realizar as validações dos dados antes de serem utilizados pela classe caminhaoRepository
    public function validacao($caminhao)
    {
        
        if($this->idcaminhao =="")
        {
            $mensagem[] = "Verifique se o código do caminhão foi informado corretamente";
        }
        if($this->combustivel=="")
        {
            $mensagem[] = "Escolha um dos combustiveís disponíveis";
        }
        return empty($this->mensagem);

    }
}

?>