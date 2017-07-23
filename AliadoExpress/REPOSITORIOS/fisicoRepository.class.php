<?php
    class fisicoRepository{
         function gravar($fisica)
        {
            try{
                //Abre uma conexão com o banco
                $pdo = Conectar();
                //Prepara o comando sql para inserir no banco
                $comando = $pdo->prepare("insert into fisica(rg_fisica,cpf_fisica,cod_cliente) values(:rg,:cpf,:cod)");
                //atribui valor ao parametro :cpf
                $comando->bindValue(":cpf",$fisica->getCpfFisica());
                //atribui valor ao parametro :rg
                $comando->bindValue(":rg",$fisica->getRgFisica());
                //atribui valor ao parametro :cod
                $comando->bindValue(":cod",$fisica->getCodcliente()->getCodcliente());
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
        function alterar($fisica)
        {
             try{                  
                $pdo = Conectar();              
                $comando = $pdo->prepare("update fisica set rg_fisica = :rg,cpf_fisica = :cpf where cod_cliente = :cod");
                $comando->bindValue(":cod",$fisica->getCodcliente());
                $comando->bindValue(":rg",$fisica->getRgFisica());
                $comando->bindValue(":cpf",$fisica->getCpfFisica()); 
                $comando->execute();
                Desconectar($pdo);
            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        function excluir($fisica)
        {
             try{
                $pdo = Conectar();
                $comando = $pdo->prepare("delete from fisica  where cod_cliente = :cod");
                $comando->bindValue(":cod",$fisica->getCodcliente());
                $comando->execute();
                Desconectar($pdo);
            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        function localizarporcodigo($fisica)
        {
             try{
                $pdo = Conectar();
                $comando = $pdo->prepare("select * from fisica where cod_cliente = :cod");
                $comando->bindValue(":cod",$fisica->getCodcliente());
                $comando->execute();
                Desconectar($pdo);
            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }        
        function localizarporcpf($fisica)
        {
             try{
                $pdo = Conectar();
                $comando = $pdo->prepare("select * from fisica where cpf_fisica = :cpf");
                $comando->bindValue(":cpf",$fisica->getCpfFisica()); 
                $comando->execute();
                Desconectar($pdo);
            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        
    }
?>