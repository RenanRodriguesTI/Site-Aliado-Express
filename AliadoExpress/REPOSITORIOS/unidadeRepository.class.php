<?php
    require_once "banco.php";
    require_once "unidade.class.php";
    class unidadeRepository{
        public function gravar($unidade){
            try{
                $pdo= Conectar();
            $comando = $pdo->prepare("insert into unidades(cod_cidade,nome_unidade) values(:cidade,:nome)");
            $comando->bindValue(":cidade",$unidade->getCidade()->getCodcidade());
            $comando->bindValue(":nome",$unidade->getNomeunidade());
            $comando->execute();
            Desconectar($pdo);

            }
            catch(Exception $erro)
            {
                Desconectar($pdo);
            }

        }
        public function alterar($unidade){
            try{
                $pdo = Conectar();
                $comando= $pdo->prepare("update unidades set cod_cidade=:cidade,nome_unidade=:nome where cod_unidade = :cod");
                $comando->bindValue(":cod",$unidade->getCodunidade());
                $comando->bindValue(":cidade",$unidade->getCidade()->getCodcidade());
                $comando->bindValue(":nome",$unidade->getNomeunidade());
                $comando->execute();
                Desconectar($pdo);

            }
            catch(Exception $erro)
            {
                Desconectar($pdo);
            }


        }
        public function excluir($cod){
            try{
                
                $pdo = Conectar();
                $comando= $pdo->prepare("delete from unidades where cod_unidade = :cod");
                $comando->bindValue(":cod",$cod);
                $comando->execute();
                Desconectar($pdo);

            }
            catch(Exception $erro)
            {
                Desconectar($pdo);
            }

        }
        public function localizarcodunidade($cod)
        {
            try{
                $pdo = Conectar();
                $comando = $pdo ->prepare("select * from unidades where cod_unidade =:cod ");
                $comando->bindValue(":cod",$cod);
                $comando->execute();
                if($linha = $comando->fetch(PDO::FETCH_ASSOC))
                {
                    return $linha;
                }
                Desconectar($pdo);

            }
            catch(Exception $erro)
            {
                Desconectar($pdo);
            }
        }
        public function localizarnomeunidade($nome)
        {
            try{
                $pdo = Conectar();
                $comando = $pdo ->prepare("select * from unidades where nome_unidade =:nome ");
                $comando->bindValue(":nome",$nome);
                $comando->execute();
                while($linha = $comando->fetch(PDO::FETCH_ASSOC))
                {
                    //gravar linha do banco em uma matriz
                    return $linha;
                }
                Desconectar($pdo);

            }
            catch(Exception $erro)
            {
                Desconectar($pdo);
            }

        }
        public function localizarcodcidade($cod)
        {
            try{
                $pdo = Conectar();
                $comando = $pdo ->prepare("select * from unidades where cod_cidade =:cidade ");
                $comando->bindValue(":cidade",$cod);
                $comando->execute();
                if($linha = $comando->fetch(PDO::FETCH_ASSOC))
                {
                    //gravar linha do banco em uma matriz
                    return $linha;
                }
                Desconectar($pdo);

            }
            catch(Exception $erro)
            {
                Desconectar($pdo);
            }
        }


    }
?>