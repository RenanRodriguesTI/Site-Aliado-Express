<?php

    class motoristaRepository{
        public function gravar($motorista)
        {
            try{
              $pdo = Conectar();
              $comando = $pd->prepare("insert into motorista(NOME_FUN,RG_FUN,CPF_FUN,DTADMISSAO_FUN,DTDEMISSAO_FUN) values(:NOME,:RG,:CPF:ADMISSAO,:DEMISSAO)");
              $comando->bindValue(":NOME",$motorista->getNomemotorista());
              $comando->bindValue(":RG",$motorista->getRgmotorista());
              $comando->bindValue(":CPF",$motorista->getCpfmotorista());
              $comando->bindValue(":ADMISSAO",$motorista->getDtaemissao());
              $comando->bindValue(":DEMISSAO",NULL);
              $comando->execute();

              Desconectar($pdo);

            }   
            catch(Exception $e)
            {
               
                Desconectar($pdo);
            }            
        }
        public function alterar($motorista)
        {
            try{
                $pdo = Conectar();
                $comando = $pdo->prepare("update motorista set NOME_FUN = :NOME, RG_FUN = :RG, CPF_FUN = :CPF, DTADMISSAO_FUN = :DTADMISSAO, DTDEMISSAO_FUN = :DTDEMISSAO where MATRICULA_FUN = :COD");
                $comando->bindValue(":COD",$motorista->getCodmotorista());
                $comando->bindValue(":NOME",$motorista->getNomemotorista());
                $comando->bindValue(":RG",$motorista->getRgmotorista());
                $comando->bindValue(":CPF",$motorista->getCpfmotorista());
                $comando->bindValue(":DTAMISSAO",$motorista->getDtamissao());
                $comando->bindValue(":DEMISSAO",$motorista->getDtdemissao());
                $comando->execute();
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconetar($pdo);
            }
        }
        public function excluir($motorista)
        {
            try{
                $pdo = Conectar();
                $comando=$pdo->prepare("delete from motorista where MATRICULA_FUN = :cod");
                $comando->bindValue(":cod",$motorista->getCodmotorista());
                $comando->execute();
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        public function localizarporcodigo($id)
        {
            try{
                $pdo = Conectar();
                $comando = $pdo->prepare("select * from motorista where matricula_fun = :cod");
                $comando->bindValue(":cod",$id);
                $comando->execute();
                $linha = $comando->fetch(PDO::FETCH_ASSOC);
                if($linha)
                return $linha;
                Desconectar($pdo);

            }
            catch(Exception $e)
            {
                Desconectar();
            }
        }

        public function localizarnome($nome)
        {
            $vetornomes = array();
            try{
                $pdo = Conectar();
                $comando = $pdo ->prepare("select * from motorista where nome_fun like :nome ");
                $comando->bindValue(":nome","%".$nome."%");
                $comando->execute();
                while($linha = $comando->fetch(PDO::FETCH_ASSOC))
                {
                    //há necessidade de guardar o valor da linha em outra variavel
                }
                Desconectar($pdo);
            }
            catch(Exception $e)
            {
                Desconectar($pdo);
            }
        }
        public function localizarcpf($cpf)
        {
            $pdo= Conectar();
            $comando = $pdo->prepare("select * from where cpf_fun = :cpf");
            $comando->bindValue(":cpf",$cpf);
            $comando->execute();
            while($linha= $comando->fetch(PDO::FETCH_ASSOC))
            {
                //há necessidade de guardar o valor da linha em outra variavel
            }
            Desconectar($pdo);
        }
        
    }
?>