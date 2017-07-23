<?php
require_once "CLASSES/cliente.class.php";
require_once "banco.php";
    //classe responsável por gerenciar a gravação dos dados do cliente
    class clienteRepository {

        public function gravar($cliente)
{
 
    try{
        //cria objeto de conexão com o banco
        $pdo = Conectar();
        //prepara um comando  de inserção no banco de dados
        $comando = $pdo-> prepare ("insert into cliente(NOME_CLIENTE,EMAIL_CLIENTE,ENDERECO_CLIENTE,BAIRRO_CLIENTE,CEP_CLIENTE,COD_CIDADE,LOGIN_CLIENTE,SENHA_CLIENTE) values(:NOME_CLIENTE,:EMAIL_CLIENTE,:ENDERECO_CLIENTE,:BAIRRO_CLIENTE,:CEP_CLIENTE,:COD_CIDADE,:LOGIN_CLIENTE,:SENHA_CLIENTE)");
        //cria um vetor da posição Nome_cliente recebendo o array
        $comando->bindValue(":NOME_CLIENTE",$cliente->getNomecliente());
        $comando->bindValue(":EMAIL_CLIENTE", $cliente->getEmail());
        $comando->bindValue(":ENDERECO_CLIENTE", $cliente->getEndereco());
        $comando->bindValue(":BAIRRO_CLIENTE",$cliente->getBairro());
        $comando->bindValue(":COD_CIDADE",$cliente->getCodcidade()->getCodcidade());
        $comando->bindValue(":CEP_CLIENTE",$cliente->getCep());
        $comando->bindValue(":LOGIN_CLIENTE",$cliente->getLogin());
        $comando->bindValue(":SENHA_CLIENTE",$cliente->getsenha());

     
       
        //executa o comando de inserção no banco passando como parametro o array $parametro
        $comando ->execute();
        
        $codigo = $pdo->lastInsertId();
        Desconectar($pdo);
        return $codigo;

    }
    catch(Exception $e)
    {
        echo $e;
        Desconectar($pdo);
    }


}

public function alterar ($cliente)

{
    //Esta função deverá alterar os dados dos clientes cadastrados
    try{
        $pdo = Conectar();
        $comando = $pdo->prepare("update cliente set nome_cliente =:NOME_CLIENTE, email_cliente =:EMAIL_CLIENTE,endereco_cliente=:ENDERECO_CLIENTE,bairro_cliente=:BAIRRO_CLIENTE,cep_cliente = :CEP_CLIENTE,login_cliente = :LOGIN_CLIENTE,senha_cliente = :SENHA_CLIENTE, cod_cidade = :COD_CIDADE where cod_cliente = :COD_CLIENTE");
      
         $comando->bindValue(":COD_CLIENTE",$cliente->getCodcliente());
         $comando->bindValue(":NOME_CLIENTE",$cliente->getNomecliente());
        $comando->bindValue(":EMAIL_CLIENTE", $cliente->getEmail());
        $comando->bindValue(":ENDERECO_CLIENTE", $cliente->getEndereco());
        $comando->bindValue(":BAIRRO_CLIENTE",$cliente->getBairro());
        $comando->bindValue(":COD_CIDADE",$cliente->getCodcidade()->getCodcidade());
        $comando->bindValue(":CEP_CLIENTE",$cliente->getCep());
         $comando->bindValue(":LOGIN_CLIENTE",$cliente->getLogin());
       $comando->bindValue(":SENHA_CLIENTE",$cliente->getSenha());
        $comando ->execute(); 
        Desconectar($pdo);
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
     
}

public function excluir($cod)
{
    //Exclui os clientes cadastrados
    try{
        $pdo = Conectar();
        $comando =$pdo->prepare("delete from cliente where cod_pessoa = :codpessoa");
        $comando->bindValue(":codpessoa",$cod);
        $comando->execute();
        Desconectar($pdo);

    }
    catch(Exception $e)
    {
        Desconectar($pdo);
    }
}
//metodo para localizar o cliente pelo código
public function localizarcodigo($codigo)
{

    try{
        //objeto de conexão com o banco
        $pdo = Conectar();
        //Prepara um comando sql para selecionar os cliente através do código
        $comando = $pdo->prepare("select * from cliente where cod_cliente = :cod");
        //atribui um valor para o parâmetro :cod
        $comando->bindValue(":cod",$codigo);
        //executa o comando sql no banco
        $comando->execute();
        //recebe o valor retornado pelo stream_select
        $linha = $comando->fetch(PDO::FETCH_ASSOC);
        //se $linha for verdadeiro retorna a linha encotrada na banco
        if($linha)
        {
            return $linha;
        }
        //destroi o objeto de conexão com o banco
        Desconectar($pdo);

    }
    catch(Exception $e)
    {
        Desconectar($pdo);
    }
}
public function localizarporcpf($cpf)
{
    try
    {
        //objeto de conexão com o banco
        $pdo = Conectar();
        //Prepara um comando sql para selecionar os cliente através do cpf
        $comando = $pdo->prepare("select * from cliente where cpf_cliente = :cpf");
        //atribui um valor para o parâmetro :cpf
        $comando->bindValue(":cpf",$cpf);
        //executa o comando sql no banco
        $comando->execute();
        //recebe o valor retornado pelo select
        $linha = $comando->fetch(PDO::FETCH_ASSOC);
        //se $linha for verdadeiro retorna a linha encotrada na banco
        if($linha)
        {
            return $linha;
        }
        //fecha a conexão com o banco
        Desconectar($pdo);

    }
    catch(Exception $e)
    {
        Desconectar($pdo);
    }
}
public function localizarpornome($nome)
{
    try{
        //objeto de conexão com o banco
        $pdo = Conectar();
        //Prepara um comando sql para selecionar os cliente através do nome
        $comando = $pdo->prepare("select * from cliente where nome_cliente = :nome");
        //atribui um valor para o parâmetro :cpf
        $comando->bindValue(":cpf",$nome);
        //executa o comando sql no banco
        $comando->execute();
        //recebe o valor retornado pelo select
        
        //enquanto $linha for verdadeiro retorna a linha encotrada na banco
        while($linha = $comando->fetch(PDO::FETCH_ASSOC))
        {
            //guardar cada linha recebida 
        }
        //fecha a conexão com o banco
        Desconectar($pdo);

    }
    catch(Exception $e)
    {
        Desconectar($pdo);
    }
}

    public function localizartudo()
    {
        try{
            $cliente = "";
            $pdo = Conectar();
            $comando = $pdo->prepare("select * from  cliente");
            $comando->execute();
            //ler todas linhas de dados
            Desconectar();
        }
        catch(Exception $erro)
        {
            Desconectar($pdo);
        }
    }


    }
?>




