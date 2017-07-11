<?php
require_once "CLASSES/cidade.class.php";
require_once "REPOSITORIOS/cidadeRepository.class.php";
require_once "funcoes.php";

session_start();
    $cidade = $estado = $usuario = "";
    $id= $idestado = 0;
    $mensagem="";
   
if(isset($_SESSION["usuario"]))
{
    $usuario = $_SESSION["usuario"];
}
else
{
    header("Location: login.php");
}

    if(isset($_POST["btn_cadastrar"]))
    {
        $id = $_POST["codcidade"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $objcidade = new cidade($id,$cidade,$estado);
        $cidadeR = new cidadeRepository;
        if($cidadeR->localizarporcidade($cidade))
        {
           $mensagem ="<span style='color:red;font-size:15px;text-align:center'>A cidade já está cadastrada</span><br>";
        }
        else
        {
            if($id ==0)
            {
                 $cidadeR->gravar($objcidade);
            }
            else
            {
                $cidadeR->alterar($objcidade);
            }
            
             $mensagem="";
           
        }
        
        
    }
 if(isset($_POST["estado"]))
    {
        if($_POST["estado"]!="")
        {
           
           
            $id = $_POST["codcidade"];
            $estado= $_POST["estado"];
        $cidade = $_POST["cidade"];
      
        }
       
        
    }

    //localizar cidades 
    if(isset($_POST["localizar"]))
    {
        header("Location: consultacidade.php");
    }

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $cidadeR = new cidadeRepository();
       $cidadeO = $cidadeR->localizarporcodigo($id);
       $estado = $cidadeO["UF_CIDADE"];
       $cidade =$cidadeO["NOME_CIDADE"];

       
    }

    if (isset($_POST["excluir"])) {
        $id = $_POST["codcidade"];
        $cidadeO = new cidadeRepository();
        $cidadeO->excluir($id);
        $estado ="";
        $cidade="";
        $id="";
        # code...
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Cadastro de Cidade</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="CSS/estiloformcadastros.css"/>
    <link rel="stylesheet" href="CSS/estilo.css"/>
<link rel="stylesheet" href="CSS/estilocpanel.css"/>
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');
    
       
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family: arial;

}
/*formatação bakcground*/    
body{
            background-color: rgb(232,238,240);
        }
    
#imagem-fundo{
             background-image:url(IMAGENS/estrada1.png);
        }
  div#mapeamento a{
            text-decoration: none;
        }

</style>
   
</head>
<body>
<div id="interface">
    <header>
            
            <div class="logo" >
                <figure >
                             <a href="home.html"><img id="logomarca" src="IMAGENS/aliadoexpress2.png" alt="Logo" /></a>
                    
                    <label style="float:left;margin-top:20px;" id="icone" for="check"><img id="icone-responsivo" src="IMAGENS/menu.png" alt="icone do menu"/></label>
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
              <ul>
            
                <li class="link"><a  href="home.html" >Home</a></li>
                <li class="link"><a  href="Filiais.html">Filiais</a></li>
                <li class="link"><a  href="empresa.html">Empresa</a></li>
                <li class="link"><a  href="cotacao.html">Cotação</a></li>
                <li class="link"><a  href="trabalheconosco.html">Trabalhe conosco</a></li>
                <li class="link"><a  href="faleconosco.html">Fale Conosco</a></li>
                </ul>
 
            
        
        </nav>
    
    
    </aside>
    <section id="conteudo" style="min-height:600px;width:100%">
        <section id="imagem-fundo">
               
            <div id="imagem-perfil">
               <a href="cpanelfuncionario.php"><img src="IMAGENS/userperfil.png" alt="Perfil usuário"/></a>
            </div>
            <h1 id="nomeuserprincipal"><?=$usuario?></h1>
            <a id="btn-editar-perfil2">Editar</a>
             <a id="btn-editar-perfil" href="login.php?btn=sair">Sair</a>
            </section>
        
           <form name="cadastrocidade" action="cadastrocidade.php" method="post" class="formulario">
     <h3 class="titulo">Cadastro de Cidade</h3>
<div class="area-formulario" id="area1">
   <?=$mensagem?>
    <label for="codcidade">Código da Cidade</label>
    <input type="text" class="texto" name="codcidade" id="codcidade" value="<?=$id?>" readonly/>
    
    <label for="estado">Estado</label>
     <select name="estado" id="estado" onchange="cadastrocidade.submit()">
    <option value="0">Selecione o Estado</option>
        <?=($idestado = gerarOptionEstados($estado))?> 
    </select>
     <label for="cidade">Cidade</label>
     <select name="cidade" id="cidade">
    <option value="0">Selecione a Cidade</option>
        <?=gerarOptionCidades($idestado, $cidade)?>
    </select>
    
    
</div>
<div class="area-formulario" id="area2" style="float:right">
  
<input type="submit" class="bt_acao" name="localizar" value="Localizar"/>
<input type="submit" class="bt_acao" name="btn_cadastrar" value="Salvar"/>
<input type="submit" class="bt_acao" name="excluir" value="Excluir"/> 
<input type="submit" class="bt_acao" name="btn_cancelar" value="Cancelar"/>
</div>
</form>
    </section>
<footer>
    
    <div  id="mapeamento" >
    
    <div class="flutuacao">
        <nav>
            <ul>
                <li><a href="index.html" target="_blank">Home</a></li>
                <li><a href="filiais.html" target="_blank">Filiais</a></li>
                <li><a href="empresa.html" target="_blank">Empresa</a></li>
                <li><a href="cotacao.html" target="_blank">Cotação</a></li>
                
            
            </ul>
        
        </nav>
    </div>    
    <div class="flutuacao">
         <nav class="menurodape">
            <ul>
                <li><a href="faleconosco.html">Fale Conosco</a></li>
                <li><a href="trabalheconosco.html">Trabalhe Conosco</a></li>
                <li><a href="cpanelcliente.html">Encomenda</a></li>
                <li><a href="cpanelcliente.html">Cliente</a></li>
                
            
            </ul>
        
        </nav>
    </div>
        <div  class="flutuacao">
            <nav class="menurodape">
            <ul>
                <li><a href="cadastrounidades.html">Unidade</a></li>
                <li><a href="cadastrocaminhao.html">Caminhão</a></li>
                <li><a href="cadastroromaneio.html">Romaneio</a></li>
                <li><a href="cadastrocidade.html">Cidade</a></li>
                
            
            </ul>
        
        </nav>
        
        </div>
        <div  class="flutuacao">
            <nav class="menurodape">
            <ul>
                <li><a href="cadastromotorista.html">Motorista</a></li>
                <li><a href="chat.html">Chat</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="login.html">Login</a></li>
                
            
            </ul>
        
        </nav>
        
        </div>
        
        <select id="navegacao"onchange="javascript: abreJanela(this.value)" >
        <optgroup label="Área de Navegação">
            <option></option>
            <option value="index.html">Home</option>
            <option value="empresa.html">Empresa</option>
            <option value="filiais.html">Filiais</option>
            <option value="trabalheconosco.html">Trabalhe Conosco</option>
            <option value="faleconosco.html">Fale Conosco</option>
            <option value="chat.html">Chat</option>
            <option value="cpanelcliente.html">Cliente</option>
            <option value="cpanelcliente.html">Encomenda</option>
            <option value="cpanelfuncionario.html">Romaneio</option>
            <option value="cpanelfuncionario.html">Motorista</option>
            <option value="cpanelfuncionario.html">Cidade</option>
            <option value="cpanelfuncionario.html">Unidade</option>
            <option value="cpanelfuncionario.html">Caminhão</option>
            <option value="login.html">Login</option>
            
            </optgroup>
            
            
        
        </select>
        
    
    </div>
   <address>

       
       TODOS OS DIREITOS RESERVADOS</address>
  
   
    
    
    
</footer>
</div>
</body>
</html>