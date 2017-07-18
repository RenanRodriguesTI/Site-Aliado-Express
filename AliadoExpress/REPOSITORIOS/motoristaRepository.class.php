<?php

    class motoristaRepository{
        public function gravar($motorista)
        {
            try{
              $pdo = Conectar();
              $comando = $pdo->prepare("insert into motorista(NOME_FUN,RG_FUN,CPF_FUN,DTADMISSAO_FUN,DTDEMISSAO_FUN,LOGIN_FUN,SENHA_FUN, FONE_FUN) values(:NOME,:RG,:CPF,:ADMISSAO,:DEMISSAO,:LOGIN,:SENHA,:FONE)");
              $comando->bindValue(":NOME",$motorista->getNome());
              $comando->bindValue(":RG",$motorista->getRg());
              $comando->bindValue(":CPF",$motorista->getCpf());
              $comando->bindValue(":ADMISSAO","02/02/2017");
              $comando->bindValue(":DEMISSAO","02/02/2017");
              $comando->bindValue(":LOGIN",$motorista->getLogin());
              $comando->bindValue(":SENHA",$motorista->getSenha());
              $comando->bindValue(":FONE",$motorista->getFone());
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
                $comando = $pdo->prepare("update motorista set NOME_FUN = :NOME, RG_FUN = :RG, CPF_FUN = :CPF, FONE_FUN = :FONE, LOGIN_FUN = :LOGIN, SENHA_FUN = :SENHA where MATRICULA_FUN = :COD");
                $comando->bindValue(":COD",$motorista->getMatricula());
                $comando->bindValue(":NOME",$motorista->getNome());
                $comando->bindValue(":RG",$motorista->getRG());
                $comando->bindValue(":CPF",$motorista->getCPF());
                $comando->bindValue(":FONE",$motorista->getFone());
                $comando->bindValue(":LOGIN",$motorista->getLogin());
                $comando->bindValue(":SENHA",$motorista->getSenha());

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
                $comando->bindValue(":cod",$motorista);
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
                $motorista= "";
                $pdo = Conectar();
                $comando = $pdo->prepare("select * from motorista where matricula_fun = :cod");
                $comando->bindValue(":cod",$id);
                $comando->execute();
                $linha = $comando->fetch(PDO::FETCH_ASSOC);
                if($linha)
                return $motorista = new motorista($linha["MATRICULA_FUN"],$linha["NOME_FUN"],$linha["RG_FUN"],$linha["CPF_FUN"],$linha["FONE_FUN"],$linha["LOGIN_FUN"],$linha["SENHA_FUN"]);
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

        public function buscacompleta()
        {
            try{
                $motorista="";
                $pdo = Conectar();
                $comando = $pdo->prepare("select * from motorista");
                $comando->execute();
                while($linha = $comando->fetch(PDO::FETCH_ASSOC))
                {
                    $motorista[] = new motorista($linha["MATRICULA_FUN"],$linha["NOME_FUN"],$linha["RG_FUN"],$linha["CPF_FUN"],$linha["FONE_FUN"],$linha["LOGIN_FUN"],$linha["SENHA_FUN"]);
                }
                Desconectar($pdo);
                return $motorista;

            }
            catch(Exeption $erro)
            {
                Desconectar($pdo);
            }
        }
        
    }
?>