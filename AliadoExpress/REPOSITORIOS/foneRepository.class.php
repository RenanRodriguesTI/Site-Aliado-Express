<?php
    //o arquivo banco.php contém apenas métodos para abrir e fechar conexão com o banco de dados
    require_once "banco.php";
    require_once "CLASSES/fone.class.php";

    //classe responsável pelas manipulações no banco
    class foneRepository{
        //para fazer as manipulações criar a abaixo será necessário o objeto caminhão
        public function gravar($fone)
        {
            try{
                //cria o objeto pdo
            $pdo = Conectar();
            //Prepara um comando sql para inserção no banco
            $comando = $pdo->prepare("insert into fone(cod_cliente, numero_fone) values(:cod_cliente,:numero_fone)");
            $comando->bindValue(":cod_pessoa", $fone->getcod_cliente()->getCodcliente());
            $comando->bindValue(":numero_fone",$fone->getnumero_fone());
            //executa o comando sql com parametros definidos acima
            $comando->execute();

            //destroi o objeto pdo
            Desconectar($pdo);
            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }


        public function alterar($fone)
        {
            try{
                 //cria o objeto pdo
            $pdo = Conectar();
             //Prepara um comando sql para alteração no banco
            $comando = $pdo->prepare("update fone set numero_fone = :numero_fone where cod_cliente = :cod_cliente");
            $comando-> bindaValue(":cod_cliente", $fone -> getcod_cliente() -> getCodcliente());
            $comando-> bindValue(":numero_fone", $fone->getnumero_fone());
            $comando->execute();
            //destroi o objeto pdo
            Desconectar($pdo);
            }
            catch(Exception $erro)
            {
                //destroi o objeto pdo
                Desconectar($pdo);
            }
        }

       
        public function excluir($cod_cliente)
        {
            //cria o objeto pdo
            $pdo = Conectar();
              //Prepara um comando sql para exclusão no banco
            $comando = $pdo->prepare("delete from fone where cod_cliente = :cod_cliente");
            //Atribuição de valor para o paramento :cod_cliente
       //o parametro :cod_cliente recebe o atributo identificação do objeto fone
            $comando->bindValue(":cod_cliente", $cod_cliente);
            $comando->execute();
            //destroi o objeto pdo
            Desconectar($pdo);
        }

        public function localizarporcodigo($cod_cliente)
        {
            try{
                $pdo= Conectar();
                $comando = $pdo->prepare("select * from fone where cod_cliente = :cod_cliente");
                $comando->bindValue(":cod_cliente", $cod_cliente);
                $comando->execute();
                if($linha = $comando->fecth(PDO::FETCH_ASSOC))
                {
                    return $linha;
                }
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }

         public function localizarporfone($numero_fone)
        {
            try{
                $pdo= Conectar();
                $comando = $pdo->prepare("select * from fone where numero_fone = :numero_fone");
                $comando->bindValue(":numero_fone", $numero_fone);
                $comando->execute();
                if($linha = $comando->fecth(PDO::FETCH_ASSOC))
                {
                    return $linha;
                }
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }



          public function localizarporsequencia($seq_fone)
        {
            try{
                $pdo= Conectar();
                $comando = $pdo->prepare("select * from fone where seq_fone = :seq_fone");
                $comando->bindValue(":seq_fone", $seq_fone);
                $comando->execute();
                if($linha = $comando->fecth(PDO::FETCH_ASSOC))
                {
                    return $linha;
                }
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }


    }
?>