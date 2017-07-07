<?php
require "banco.php";
require_once "romaneio.class.php";
    class romaneioRepository{
      
        public function gravar($romaneio){
            try{
                
            $pdo = Conectar();
            $comando=$pdo->prepare("insert into romaneio(data_Emissao_romaneio,cod_caminhao,matricula_fun,unidade_origem,unidade_destino) values(:data,:caminhao,:matricula,:origem,:destino)");
            $comando->bindValue(":data",$romaneio->getDataemissao());
            $comando->bindValue(":caminhao",$romaneio-> getCodcaminhao()->getIdcaminhao());
            $comando->bindValue(":matricula",$romaneio->getMotorista()->getCodmotorista());
            $comando->bindValue(":origem",$romaneio->getUnidadeorigem()->getCodunidade());
            $comando->bindValue(":destino",$romaneio->getUnidadedestino()->getCodunidade());
            $comando->execute();
            $codigoromaneio = $pdo->lastInsertId(); // Recupera o código autoincremento gerado, apenas INSERT
            Desconectar($pdo);
            return $codigoromaneio;
            }
            catch(Expection $e)
            {
                Desconectar($pdo);
            }
        }
        public function alterar($romaneio){
            $pdo = Conectar();
            $comando = $pdo->prepare("update romaneio set  cod_caminhao=:caminhao,matricula_fun=:matricula,unidade_origem =:origem,unidade_destino = :destino where cod_romaneio = :id");
            $comando->bindValue(":id",$romaneio->getCodromaneio());
            
            $comando->bindValue(":caminhao",$romaneio->getCodcaminhao()->getIdcaminhao());
            $comando->bindValue(":matricula",$romaneio->getMotorista()->getCodmotorista());
            $comando->bindValue(":origem",$romaneio->getUnidadeorigem()->getCodunidade());
            $comando->bindValue(":destino",$romaneio->getUnidadedestino()->getCodunidade());
          
            
            $comando->execute();
            Desconectar($pdo);
            }
        
        public function excluir($cod){
            try{
                $pdo = Conectar();
                $comando = $pdo->prepare("delete from romaneio where cod_romaneio = :cod");
                $comando->bindValue(":cod",$cod);
                $comando->execute();
                Desconectar($pdo);     

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }

        }
        public function localizarcodromaneio($cod)
        {
             try{
                   //Abre uma conexão com o banco
                $pdo = Conectar();
                //Prepara um comando sql para selecionar as romaneio pelo código 
                $comando = $pdo->prepare("select * from romaneio where cod_romaneio = :cod");
                //atribui valor ao parametro :cod
                $comando->bindValue(":cod",$cod);
                //executa o comando sql
                $comando->execute();
                //le a linha do banco
                if($linha= $comando->fetch(PDO::FETCH_ASSOC))
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

        public function localizardata($data)
        {
            try{
                   //Abre uma conexão com o banco
                $pdo = Conectar();
                //Prepara um comando sql para selecionar as romaneio pela data
                $comando = $pdo->prepare("select * from romaneio where data_romaneio = :data");
                //atribui valor ao parametro :cod
                $comando->bindValue(":data",$data);
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
        //select * from encomenda e inner join itens_romaneio r on e.cod_encom = r.cod_encom
        //A função abaixo cria uma tabela com as encomenda cadastradas em um romaneio
        public function listaencomendasselecionadas($codigoromaneio)
        {
            try{
                $checked="";
                $resultado="";
                $pdo = Conectar();
                $comando=$pdo->prepare("select I.COD_ROMANEIO,E.COD_ENCOM,E.PESO_ENCOM,E.OBS_ENCOM,E.DATA_ENCOM,E.VALOR_FRETE_ENCOM,E.COD_CLIENTE,E.MATRICULA_FUN,E.COD_UNIDADE_DESTINO,E.COD_UNIDADE_ORIGEM from encomenda E LEFT join itens_romaneio I on E.COD_encom = I.cod_encom ");
               
                $comando->execute();
                $TABELA="<table><tr><td>Código Encomenda</td><td>Peso Encomenda</td><td>Data de Cadastro</td><td>Valor Frete</td><td>Observação</td><td>Código do cliente</td><td>Unidade Destino</td><td>Unidade Origem</td><td></td></tr>";
                while($linha=$comando->fetch(PDO::FETCH_ASSOC))
                {
                    if($linha['COD_ROMANEIO'] == $codigoromaneio)
                    {
                         $checked="checked";
                    }
                    else {
                        $checked="";
                    }
                    $resultado .="<tr><td>{$linha['COD_ENCOM']}</td><td>{$linha['PESO_ENCOM']}</td><td>{$linha['DATA_ENCOM']}</td><td>{$linha['VALOR_FRETE_ENCOM']}</td><td>{$linha['OBS_ENCOM']}</td><td>{$linha['COD_CLIENTE']}</td><td>{$linha['COD_UNIDADE_DESTINO']}</td><td>{$linha['COD_UNIDADE_ORIGEM']}</td><td><input type='checkbox' name='codencom[]' $checked value='{$linha['COD_ENCOM']}'/></td></tr>";
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

        //Várias estruturas select
    }

?>