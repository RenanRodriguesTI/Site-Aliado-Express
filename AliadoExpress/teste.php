<?php
session_start();
$logado="";
    echo "Hello Word!!!";
    if(isset($_POST["sair"]))
{
    unset($_SESSION);
    session_destroy();
    
}
 if(isset($_SESSION["usuario"]))
    {
        echo $_SESSION["usuario"];
    }
    else
    {
        echo "Não logado";
    }
   
?>
<?php

function conectar()
{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=pii;port=3311",'root','root')
}
?>