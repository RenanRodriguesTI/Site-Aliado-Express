<?php
class login{
private $login;
private $senha;
private $mensagem;


//construtor
public function __construct($login="",$senha="")
{
    $this->login = $login;
    $this->senha = $senha;
    $this->mensagem= array();
}

public function getlogin()
{
    return $this->login;
}
public function setlogin($login)
{
    $this->login = $login;
}
public function getsenha()
{
    return $this->senha;
}
public function setsenha($senha)
{
    $this->senha = $senha;

}
public function getmensagem()
{
    return $this->mensagem;
}

public function validacao()
{
    if(trim($this->login) ==""||trim($this->senha)=="")
    {
        $this->mensagem[] =  "Login ou senha não foram digitados corretamente";
    }
    else
    {
        if(is_numeric($this->login))
        {
            $this->mensagem[] = "Login ou senha não foram digitados corretamente";
        }
        else
        {
            $this->mensagem = array();
        }
    }

    return empty($this->mensagem);
    
}


}


?>