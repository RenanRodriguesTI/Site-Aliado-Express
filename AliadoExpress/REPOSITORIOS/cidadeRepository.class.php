<?php
require_once "banco.php";
//Classe cidadeRepostory é responsável pelas alterações no banco
    class cidadeRepository{
        //insere dados da tabela cidade
        function gravar($cidade)
        {
            try{
                //Abre uma conexão com o banco
                $pdo = Conectar();
                //Prepara o comando sql para inserir no banco
                $comando = $pdo->prepare("insert into cidade(nome_cidade,uf_cidade) values(:cidade,:estado)");
                //atribui valor ao parametro :cidade
                $comando->bindValue(":cidade",$cidade->getNomecidade());
                //atribui valor ao parametro :estado
                $comando->bindValue(":estado",$cidade->getNomeestado());
                //executa o comando sql
                $comando->execute();
                //fecha a conexão
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        //altera dados da tabela cidade
        function alterar($cidade)
        {
             try{
                   //Abre uma conexão com o banco
                $pdo = Conectar();
                //Prepara o comando sql para alterar a tabela cidade
                $comando = $pdo->prepare("update cidade  set nome_cidade = :cidade,uf_cidade = :estado where cod_cidade = :cod");
                //atribui valor ao parametro :cod
                $comando->bindValue(":cod",$cidade->getCodcidade());
                //atribui valor ao parametro :cidade
                $comando->bindValue(":cidade",$cidade->getNomecidade());
                //atribui valor ao parametro :estado
                $comando->bindValue(":estado",$cidade->getNomeestado());
                //executa o comando sql
                $comando->execute();
                //fecha a conexão
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        //exclui dados da tabela cidade
        function excluir($cod)
        {
             try{
                   //Abre uma conexão com o banco
                $pdo = Conectar();
                //Prepara o comando sql para excluir dados da tabela cidade
                $comando = $pdo->prepare("delete from cidade  where cod_cidade = :cod");
                //atribui valor ao parametro :cod
                $comando->bindValue(":cod",$cidade->getCodcidade());
                //executa o comando sql
                $comando->execute();
                //fecha a conexão
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        //obtém dados da tabela através de um select 
        function localizarporcodigo($cod)
        {
             try{
                   //Abre uma conexão com o banco
                $pdo = Conectar();
                //Prepara um comando sql para selecionar as cidades pelo código 
                $comando = $pdo->prepare("select * from cidade where cod_cidade = :cod");
                //atribui valor ao parametro :cod
                $comando->bindValue(":cod",$cod);
                //executa o comando sql
                $comando->execute();
                if($linha = $comando->fetch(PDO::FETCH_ASSOC))
                {
                    return $linha;
                }
                //fecha a conexão
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        ////obtém dados da tabela através de um select 
        function localizarporcidade($nome)
        {
             try{
                //Abre uma conexão com o banco
                $pdo = Conectar();
                 //Prepara um comando sql para selecionar as cidades pelo nome  
                $comando = $pdo->prepare("select * from cidade where nome_cidade = :cidade");
                //atribui valor ao parametro :cidade
                $comando->bindValue(":cidade",$nome);
                //executa o comando sql
                $comando->execute();
                if($linha=$comando->fetch(PDO::FETCH_ASSOC))
                {
                    return $linha["COD_CIDADE"];
                }

                //fecha a conexão
                Desconectar($pdo);
                

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        //obtém dados da tabela através de um select 
        function localizarporestado($estado)
        {
             try{
                //Abre uma conexão com o banco
                $pdo = Conectar();
                 //Prepara um comando sql para selecionar as cidades pelo nome  
                $comando = $pdo->prepare("select * from cidade where uf_cidade = :estado");
                //atribui valor ao parametro :cidade
                $comando->bindValue(":estado",$estado);
                //executa o comando sql
                $comando->execute();
                //fecha a conexão
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
    }
?>