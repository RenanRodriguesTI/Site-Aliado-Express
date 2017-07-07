<?php
require_once "banco.php";
require_once "encomenda.class.php";


//show tables;
    class encomendaRepository{
        public function gravar($encomenda){
            try{
                $pdo = Conectar();
            $comando = $pdo->prepare("insert into encomenda(peso_encom,valor_frete_encom,obs_encom,cod_cliente,cod_unidade_destino,cod_unidade_origem,data_encom) values(:peso,:valor,:obs,:cliente,:destino,:origem,:data)");
            
            $comando->bindValue(":peso",$encomenda->getPeso());
            $comando->bindValue(":valor",$encomenda->getValorfrete());
            $comando->bindValue(":obs",$encomenda->getObsencomenda());
            $comando->bindValue(":data",$encomenda->getdata());
            $comando->bindValue(":cliente",$encomenda->getcliente()->getCodcliente());
            $comando->bindValue(":destino",/*$encomenda->getCodcliente()->getunidadedestino()*/0);
            $comando->bindValue(":origem",/*$encomenda->getCodcliente()->getunidadeoorigem()*/0);
            $comando->execute();
            Desconectar($pdo);
            }
            catch(Exception $erro)
            {
                Desconectar($pdo);

            }

        }

        public function alterar($encomenda){
            try{
                $pdo = Conectar();
                $comando = $pdo->prepare("update encomenda set cep_destino_encom = :cepdestino,cep_origem_encom=:ceporigem,peso_encom=:peso,valor_frete_encom=:valor,obs_encom=:obs,cod_cliente=:cliente,cod_unidade_destino=:destino,cod_unidade_origem = :origem where cod_encom = :cod");
                $comando->bindValue(":cod",$encomenda->getCodencom());
                $comando->bindValue(":cepdestino",$encomenda->getCeppdestino());
                $comando->bindValue(":ceporigem",$encomenda->getCeporigem());
                $comando->bindValue(":peso",$encomenda->getPeso());
                $comando->bindValue(":valor",$encomenda->getValorfrete());
                $comando->bindValue(":obs",$encomenda->getObsencomenda());
                $comando->bidValue(":cliente",$encomenda->getCodcliente()->getCodcliente());
                $comando->bindValue(":destino",$encomenda->getCodcliente()->getunidadedestino());
                $comando->bindValue(":origem",$encomenda->getCodcliente()->getunidadeoorigem());
                $comando->execute();
                Desconectar($pdo);

            }
            catch(Exception $erro)
            {
                Desconectar($pdo);
            }

        }
        public function excluir($cod)
        {
            try{
                $pdo = Conectar($pdo);
                $comando = $pdo->prepare("delete from encomenda where cod_encom = :cod");
                $comando->bindValue(":cod",$encomenda->getcodencom());
                Desconectar($pdo);

            }
            catch(Exception $erro)
            {
                Desconectar($pdo);
            }
        }
        //selecionar pelo codigo da encomenda
        public function localizarcodigoencomenda($cod)
        {
            try{
                $pdo = Conectar();
                $comando = $pdo->prepare("select * from encomenda where cod_encom = :cod ");
                $comando->bindValue(":cod",$cod);
                $comando->execute();
                Desconectar($pdo);


            }
            catch(Exception $erro)
            {
                Desconectar($pdo);
            }
        }
        //localizar pela data de emissao
        public function localizarpordata($data)
        {
            try{
                $pdo = Conectar();
                $comando = $pdo->prepare("select * from encomenda data_emissao_ENCOM = :DATA");
                $comando->bindValue(":DATA",$data);
                $comando->execute();
                Desconectar($pdo);

            }
            catch(Exception $erro)
            {
                Desconectar($pdo);

            }
        }

        //localizar pelo cep origem ou destino
        public function localizarporcep($cep)
        {
            try{
                $pdo = Conectar();
                $comando=$pdo->prepare("select * from where cep_origem_encom = :cep or cep_destino_encom = :cep");
                $comando->bindValue(":cep",$cep);
                $comando->execute();
                Desconectar($pdo);

            }
            catch(Exception $erro)
            {
               Desconectar($pdo);
            }
        }
        //localizar pelo valor
        public function localizarvalor($valor)
        {
            try{
                $pdo = Connectar();
                $comando=$pdo->prepare("select * from where valor_frete_encom =:encom");
                 $comando->bindValue(":encom",$cep);
                $comando->execute();
                Desconectar($pdo);

            }
            catch(Exception  $erro)
            {

            }
        }
        public function listarencomenda()
        {
            try{
        
                $resultado="";
                $pdo = Conectar();
                $comando=$pdo->prepare("select * from encomenda  ");
                $comando->execute();
                $TABELA="<table><tr><td>Código Encomenda</td><td>Peso Encomenda</td><td>Data de Cadastro</td><td>Valor Frete</td><td>Observação</td><td>Código do cliente</td><td>Unidade Destino</td><td>Unidade Origem</td><td></td></tr>";
                while($linha=$comando->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado .="<tr><td>{$linha['COD_ENCOM']}</td><td>{$linha['PESO_ENCOM']}</td><td>{$linha['DATA_ENCOM']}</td><td>{$linha['VALOR_FRETE_ENCOM']}</td><td>{$linha['OBS_ENCOM']}</td><td>{$linha['COD_CLIENTE']}</td><td>{$linha['COD_UNIDADE_DESTINO']}</td><td>{$linha['COD_UNIDADE_ORIGEM']}</td><td><input type='checkbox' name='codencom[]'  value='{$linha['COD_ENCOM']}'/></td></tr>";
                }
                $TABELA.= $resultado."</table>";
                Desconectar($pdo);
                return $TABELA;
            }
            catch(Exception $erro)
            {
                Desconectar($pdo);
            }
        }
        
    }

?>