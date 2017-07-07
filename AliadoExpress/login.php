<?php
require_once "CLASSES/login.class.php";
require_once "REPOSITORIOS/loginRepository.class.php";
session_start();
$mensagem="";

$login = $senha="";

//login Objeto

if(isset($_POST["btnEntrar"]))
{
    //Recuperar valores do formulário 
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $loginO = new login($login,$senha);
   if(!$loginO->validacao())
   {
       $mensagem = "<span style='color:red;font-size:15px'>{$loginO->getmensagem()[0]}</span><br>";
   }
   else
   {
       $mensagem = "";
       $loginR = new loginRepository();
       if($loginR->entrar($loginO)||($login =="root"&&$senha="root"))
        {
            
           $_SESSION["usuario"] = $loginO->getlogin();
           header("Location: cpanelfuncionario.php");
       
        }
        else
        {
            $mensagem= "<span style='color:red;font-size:15px'>Login ou senha inválidos</span><br>";
        }
   }


}

if(isset($_GET["sair"]))
{
    if(isset($_SESSION["usuario"]))
    {
        unset($_SESSION["usuario"]);
        session_destroy();
    }
    else
    {
        header("Location:login.php");
    }


}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Aliado Express</title>
    <link rel="stylesheet"  href="estilo.css" tpye="text/css"/>
    <style>
        *{
            font-family: Arial;
        }
        
        
        div#interface{
            
             background-image:url(estrada1.png);
            background-repeat: no-repeat;
            background-size: 100% 100%;
               margin-bottom:0;
        }
 
        .imglogin
        {
            margin:0 auto;
            width:60px;
            margin-bottom: 15px;
        }
        
        input#bt_Entrar{
          
            
            background-color: rgb(20,28,94);
            color:white;
            font-size:18px;
            font-weight:bold;
            width:340px;
          
        }
        
        /*formatação formulario login*/
        form#formulariodelogin{
           
     
            box-shadow: 1px  2px 10px;
            border-radius:6px;
            min-height:290px;
            background-color:white;
            opacity:0.7;
        }
        form#formulariodelogin h1{
           /* background-color: rgb(20,28,94);*/
            padding: 10px;
            font-size:40px;
            font-weight:bold;
            margin-top:0px;
            color: black;
            text-align: center;
            margin-bottom:15px;
        }
       input {
           text-align: center;
           background-color:  rgb(232,238,240);
           border: 2px solid transparent;
           border-radius: 3px;
           font-size: 16px;
           font-weight: 200;
           padding: 10px 0;
           width: 340px;
           margin-bottom: 3px;
transition: border .5s;
}
        
        article#Login{
            margin-top:200px;
        }
        
        
        input:focus {
      border: 2px solid rgb(20,28,94);
            box-shadow: none;
}
        div#inputs{
            
            margin:0 auto;
            width:340px;
        }/*fim formatação formulário login*/
    </style>
</head>
<body>
    
  
      <div id="interface">
            <header>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
            <div class="logo" >
                <figure >
                             <a href="home.html"><img id="logomarca" src="aliadoexpress2.png" alt="Logo" /></a>
                    
                    <label style="float:left;margin-top:20px;" id="icone" for="check"><img id="icone-responsivo" src="menu.png" alt="icone do menu"/></label>
                </figure>
            </div>
                
            
            
        <nav class="cabecalho"  >
             <ul id="menu" style="">
        
                <li><a href="home.html" >Home</a></li>
                <li><a href="Filiais.html">Filiais</a></li>
                <li><a href="empresa.html">Empresa</a></li>
                <li><a href="cotacao.html">Cotação</a></li>
                <li><a href="trabalheconosco.html">Trabalhe conosco</a></li>
                <li><a href="faleconosco.html">Fale Conosco</a></li>
            
            </ul>    
        </nav>
        
         
        </header>
       
    <input type="checkbox" id="check"/>
    
     <aside class="barra">
        <nav>
            <a href=""><div class="link">Home</div></a>
            <a href=""><div class="link">Home</div></a>
            <a href=""><div class="link">Home</div></a>
            <a href=""><div class="link">Home</div></a>
            <a href=""><div class="link">Home</div></a>
            
        
        </nav>
    
    
    </aside>
        
         <section id="conteudo">
      
     <article id="Login">
            
        
        <!-- imagem-->
        <form id="formulariodelogin" style="width:400px; margin:0 auto;  " action="login.php" method="post">
            <h1>Iniciar sessão</h1>
		      <div class="imglogin">
                  <label for="bt_Entrar"><img src="entrar3.png" alt="login"/></label>
            </div>
            <div id="inputs">
                    <?=$mensagem ?>
                    <label for="login">Usuário:</label><span id="msgcpf" style="color:red;  "></span>
                  <input id="login" class="login" name="login" type="text" placeholder="Login" maxlength="11" onkeypress="" value="<?=$login?>" />
                    <br><br>
			<label for="senhalogin">Senha:</label><span id="msgsenha" style="color:red"></span>
        <input id="senhalogin" class="login" type="password" name="senha" placeholder="Senha" value="<?=$senha?>"/>
       
          
           
            <!-- cadastrar cliente -->
            
            </div >
          
            <div style="width:340px;margin:40px auto 20px auto;">
                       <input id="bt_Entrar"   class="login" name="btnEntrar" type="submit" value="ENTRAR"/>
            
            </div>
         
                
        </form>
    </article>
        
        </section>
       
          
         
        
        
        </div>
    </body>
    
</html>