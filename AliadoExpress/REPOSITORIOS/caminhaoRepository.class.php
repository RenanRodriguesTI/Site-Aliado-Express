<?php
    //o arquivo banco.php contém apenas métodos para abrir e fechar conexão com o banco de dados
    require_once "banco.php";
    require_once "CLASSES/caminhao.class.php";

    //classe responsável pelas manipulações no banco
    class caminhaoRepository{
        //para fazer as manipulações criar a abaixo será necessário o objeto caminhão
        public function gravar($caminhao)
        {
            try{
                //cria o objeto pdo
            $pdo = Conectar();
            //Prepara um comando sql para inserção no banco
            $comando = $pdo->prepare("insert into caminhao(combustivel_caminhao, placa_caminhao,anofabricacao_caminhao) values(:combustivel,:placa,:anofabricacao)");
            //atribuição dos parametros citados acima (:combustivel,:placa,:anofabricacao)
            //o parametro :combustivel recebe o atributo combustivel do objeto caminhao
            $comando->bindValue(":combustivel", $caminhao->getcombustivel());
            //o parametro :placa recebe o atributo placa do objeto caminhao
            $comando->bindValue(":placa",$caminhao->getCodplaca());
            //o parametro :anofabricacao recebe o atributo ano de fabricação do objeto caminhao
            $comando->bindValue(":anofabricacao",$caminhao->getAnofab());
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
        public function alterar($caminhao)
        {
            try{
                 //cria o objeto pdo
            $pdo = Conectar();
             //Prepara um comando sql para alteração no banco
            $comando = $pdo->prepare("update caminhao set combustivel_caminhao = :combustivel,placa_caminhao=:placa,anofabricacao_caminhao = :anofabricacao where cod_caminhao =:cod");
            //atribuição dos parametros citados acima (:combustivel,:placa,:anofabricacao,:cod)
            //o parametro :cod recebe o atributo identificação do caminhao
            $comando->bindValue(":cod",$caminhao->getIdcaminhao());
            //o parametro :combustivel recebe o atributo combustivel do objeto caminhao
            $comando->bindValue(":combustivel",$caminhao->getcombustivel());
            //o parametro :placa recebe o atributo placa do objeto caminhao
            $comando->bindValue(":placa",$caminhao->getCodplaca());
            //o parametro :anofabricacao recebe o atributo ano de fabricação do objeto caminhao
            $comando->bindValue(":anofabricacao",$caminhao->getAnofab());
            //executa o comando sql com parametros definidos acima
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
        public function excluir($caminhao)
        {
            //cria o objeto pdo
            $pdo = Conectar();
              //Prepara um comando sql para exclusão no banco
            $comando = $pdo->prepare("delete from caminhao where cod_caminhao = :cod");
            //Atribuição de valor para o paramento :cod
            //o parametro :cod recebe o atributo identificação do objeto caminhao
            $comando->bindValue(":cod",$caminhao->getIdcaminhao());
            $comando->execute();
            //destroi o objeto pdo
            Desconectar($pdo);
        }

        public function localizarporcodigo($codigo)
        {
            try{
                $caminhao = "";
                $pdo= Conectar();
                $comando = $pdo->prepare("select * from caminhao where   cod_caminhao = :id");
                $comando->bindValue(":id",$codigo);
                $comando->execute();
                if($linha = $comando->fetch(PDO::FETCH_ASSOC))
                {
                    $caminhao = new caminhao($linha["COD_CAMINHAO"],$linha["PLACA_CAMINHAO"],$linha["ANOFABRICACAO_CAMINHAO"],$linha["COMBUSTIVEL_CAMINHAO"]);
                }
                Desconectar($pdo);
                return $caminhao;
            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }


        public function localizartudo()
        {
            try{
                $caminhao="";
                $pdo = Conectar();
                $comando = $pdo->prepare("select * from caminhao");
                $comando->execute();
                while($linha = $comando->fetch(PDO::FETCH_ASSOC))
                {
                    $caminhao[] = new caminhao($linha["COD_CAMINHAO"],$linha["PLACA_CAMINHAO"],$linha["ANOFABRICACAO_CAMINHAO"],$linha["COMBUSTIVEL_CAMINHAO"]);
                }
                Desconectar($pdo);
                return $caminhao;

            }
            catch(Exception $erro)
            {
                Desconectar($pdo);
            }
        }

    }
?>