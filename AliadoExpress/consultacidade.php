<?php 
session_start();
$usuario = "Nome do usuário";
if(isset($_SESSION["usuario"]))
{
    $usuario = $_SESSION["usuario"];
}
else
{
    header("Location: login.php");
}

?>
<?php
require_once "CLASSES/cidade.class.php";
require_once "REPOSITORIOS/cidadeRepository.class.php";

$pesquisa = $tabela = $cidade = "";

if(isset($_POST["localizar"]))
{
    $cidade = new cidade();
    $cidadeO = new cidadeRepository();
   $cidade = $cidadeO->buscacompleta();
   $tabela = tabela($cidade);


}

function tabela ($cidade)
{
    $tabela = "";
    foreach($cidade as $objcidade)
    {
        $tabela .= "<tr><td>{$objcidade->getCodcidade()}</td><td>{$objcidade->getNomecidade()}</td><td>{$objcidade->getNomeestado()}</td><td><a href='cadastrocidade.php?id={$objcidade->getCodcidade()}'>Alterar/Excluir</a></td></tr>";
    }
    return $tabela;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title><?=$usuario?></title>
    <link rel="stylesheet" href="CSS/estilo.css"/>
    <link rel="stylesheet" href="CSS/estilocpanel.css"/>
    <link rel="stylesheet" href="CSS/estiloformconsultas.css" />
    <style>
        #imagem-fundo{
             background-image:url(IMAGENS/estrada1.png);
        }
        div#mapeamento a{
            text-decoration: none;
        }
        .paineldecontrole{
            /*border:1px solid red;*/
            width: 70%;
            margin:0 auto;
        }
        .opcoescpanel{
            /*border:1px solid black;*/
            
            width:33%;
            float:left;
            box-sizing: border-box;
            
        }
        .imagensdopainel{
            width: 64px;
            margin: 0 auto 10px auto;
           /* border: 1px solid black;*/
            text-align: center;
        }
        .centro{
            text-align: center;
        }
        .titulocpanelfun{
            clear: both;
            background-color:rgb(20,28,94);
            border-radius:4px;
            color:white;
            padding:4px;
            font-size:20px;
            margin-bottom: 20px;
        }
       
        @media(max-width:1100px)
        {
           #informacoes-usuario{
            min-height:300px;   
        } 
        }
        nav#menu-secundario{
           
            width: 100%;
        }
        
        nav#menu-secundario ul li{
            width: 100%;
            margin-bottom: 2px;
          
            height: 35px;
            display: block;
            box-sizing:border-box;
            
        }
        nav#menu-secundario ul li a{
            color:white;
             text-decoration: none;
            display: block;
            height: 35px;
          box-sizing:border-box;
              padding: 2px;
             background-color:rgb(20,28,94);
          border:2px solid rgb(20,28,94);
          
        }
           
        
        nav#menu-secundario ul li a:hover{
             background-color: white;
            color:black;
            transition: 1s;
            
              border:2px solid rgb(20,28,94)
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
            <aside id="informacoes-usuario" class="flutuacaocpanel" style="" >
                 <figure id="imagem-perfil-secundario" style="margin:0 auto">
                    <img src="IMAGENS/userperfilmenor.png" alt="Usuário"/>
                </figure>
                <h2 id="nomeusuario">SAT - SISTEMA ADMINISTRATIVO</h2>
                <nav id="menu-secundario">
                    <ul>
                        <li><a href="cadastrocidade.php" target="_self">Cadastro de Cidade</a></li>
                        <li><a href="consultacidade.php" target="_self">Consulta de Cidade</a></li>
                        <li><a href="cadastrounidade.php" target="_self">Cadastro de Unidade</a></li>
                        <li><a href="consultaunidade.php" target="_self">Consulta de Unidade</a></li>
                        <li><a href="cadastrocaminhao.php" target="_self">Cadastro de Caminhão</a></li>
                        <li><a href="consultacaminhao.php" target="_self">Consulta de Caminhão</a></li>
                        <li><a href="cadastrofuncionario.php" target="_self">Cadastro de Funcionário</a></li>
                        <li><a href="consultafuncionario.php" target="_self">Consulta de Funcionário</a></li>
                        <li><a href="cadastrocliente.php" target="_self">Cadastro de Cliente</a></li>
                        <li><a href="consultacliente.php" target="_self">Consulta de Cliente</a></li>
                        <li><a href="cadastroerncomenda.php" target="_self">Cadastro de Encomenda</a></li>
                        <li><a href="consultaencomenda.php" target="_self">Consulta de Encomenda</a></li>
                        <li><a href="cadastroroamenio.php" target="_self">Emitir Romaneio</a></li>
                        <li><a href="consultaromaneio.php" target="_self">Consultar Romaneio</a></li>
                    </ul>
                
                
                </nav>
            </aside>
          
            
        
                        
                    
                
                
            
            
                  
            
            <section id="Cpanelusuario" class="flutuacaocpanel">
                <figure id="imagem-perfil-secundario">
                    <img src="IMAGENS/userperfilmenor.png" alt="Usuário"/>
                </figure>
                <h2 id="nomeusuario">Nome do usuário</h2>
               
                
                <form action="consultacidade.php" method="post" class="formulario">
     <h3 class="titulo">Consulta de cidades</h3>
<div class="area-formulario" id="area1">
   
    <label for="nome">Pesquisa</label>
    <input type="text" class="texto" name="codfun" id="nome"/>
     

    
</div>
<div class="area-formulario" id="area2" style="float:right">
  
<input type="submit" class="bt_acao" name="localizar" value="Localizar"/>

</div>
                    
     <fieldset id="itens-listagem"  >
       
        <table id="listagem">
            
            <tr><th colspan="4">Cidades</th></tr>
            <tr><td>Código</td><td>Nome</td><td>UF</td><td>Operação</td></tr>
            <?=$tabela?>
        </table>
    </fieldset>
</form>
                
                
                
            </section>
           
            
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