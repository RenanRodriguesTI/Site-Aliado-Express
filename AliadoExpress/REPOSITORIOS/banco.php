<?php
    //Essa função permite o que abra uma conexão com o banco
    function Conectar()
    {
        //Foi criado um objeto pdo neste objeto foi passado os parâmetros da conexão
        $pdo = new PDO("mysql:host=127.0.0.1;port=3311;dbname=db_aliado_Express","root","root");
        //a função do objeto pdo recebe como parametros atributos de erros(PDO::ATTR_ERRMODE) e exceções(PDO::ATTR_ERR_EXCEPTION)
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //e retorna o objeto pdo
        return $pdo;
    }
    //fecha a conexão com o banco de dados
    function Desconectar(&$pdo)
    {
        return $pdo = null;
    }
?>