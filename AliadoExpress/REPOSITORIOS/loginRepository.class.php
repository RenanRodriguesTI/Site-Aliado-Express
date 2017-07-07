<?php
require_once "banco.php";
require_once "CLASSES/login.class.php";
    class loginRepository{
        public function entrar($loginO)
        {
            try{
                $pdo =Conectar();
                $comando = $pdo->prepare("select login_fun, senha_fun motorista where login_fun = :login and senha_fun");
                $comando->bindValue(":login",$loginO->getlogin());
                $comando->bindValue(":senha",$loginO->getsenha());
                $comando->execute();
                if($linha = $comando->fetch(PDO::FETCH_ASSOC))
                {
                    return true;
                    Desconectar($pdo);
                }
                else
                {
                    $comando = $pdo->prepare("select login_cli, senha_cli cliente where login_cli = :login,senha_cli = :senha");
                    $comando->bindValue(":login",$loginO->getlogin());
                    $comando->bindValue(":senha",$loginO->getsenha());
                    $comando->execute();
                    if($linha = $comando->fetch(PDO::FETCH_ASSOC))
                    {
                        return true;
                        Desconectar($pdo);
                    }
                    else
                    {
                        return false;
                        Desconectar($pdo);
                    }
                }
                
            }
            catch(Exception $erro)
            {

            }
        }


    }
?>