<?php
require_once "banco.php";
require_once "itensRomaneio.class.php";
    class itensRomaneioRepository{
        //insere dados da tabela cidade
       public function gravar($itensromaneio)
        {
            try{
                //Abre uma conex�o com o banco
                $pdo = Conectar();
                //Prepara o comando sql para inserir no banco
                $encomendas =$itensromaneio->getCodencom()->getCodencom();
               
                foreach($encomendas as $vet)
                {
                $comando = $pdo->prepare("insert into itens_romaneio(cod_encom,cod_romaneio) values(:codencom,:codromaneio)");
                //atribui valor ao parametro codigo da encomenda
                $comando->bindValue(":codencom",$vet);
                //atribui valor ao parametro :codigo do romaneio
                $comando->bindValue(":codromaneio",$itensromaneio->getCodromaneio()->getCodromaneio());
                $comando->execute();
                }
                
              
                //fecha a conex�o
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
       public function alterar($itensromaneio)
       {
           try{
               $pdo = Conectar();
               $encomendas=$itensromaneio->getCodencom()->getCodencom();
               foreach($encomendas as $vet){
                $comando = $pdo->prepare("update itens_romaneio set cod_encom=:codencom where  cod_romaneio =:codromaneio");
               $comando->bindValue(":codencom",$vet);
                //atribui valor ao parametro :codigo do romaneio
                $comando->bindValue(":codromaneio",$itensromaneio->getCodromaneio()->getCodromaneio());
                //executa o comando sql
                $comando->execute();

               }
               
               Desconectar($pdo);
           }
           catch(Exception $erro)
           {
               Desconectar($pdo);
           }

       }
        //exclui dados da tabela cidade
        public function excluir($itensromaneio)
        {
             try{
                //Abre uma conex�o com o banco
                $pdo = Conectar();
                //Prepara o comando sql para excluir dados da tabela itensromaneio
                $comando = $pdo->prepare("delete from itens_Romaneio where cod_romaneio=:romaneio");
                //atribui valor ao parametro :codencom
                $comando->bindValue(":romaneio",$itensromaneio);
                //executa o comando sql
                $comando->execute();
                //fecha a conex�o
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }

        //obt�m dados da tabela atrav�s de um select 
      public  function itensRomaneio($codencom)
        {
             try{
                   //Abre uma conex�o com o banco
                $pdo = Conectar();
                //Prepara um comando sql para selecionar as cidades pelo c�digo 
                $comando = $pdo->prepare("select * from itens_Romaneio where codencom = :codencom");
                //atribui valor ao parametro :codencom
                $comando->bindValue(":codencom",$codencom);
                //executa o comando sql
                $comando->execute();
                //fecha a conex�o
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }

      
        
    }
?>