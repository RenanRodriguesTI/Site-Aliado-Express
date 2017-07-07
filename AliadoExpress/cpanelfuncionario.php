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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title><?=$usuario?></title>
    <link rel="stylesheet" href="CSS/estilo.css"/>
    <link rel="stylesheet" href="CSS/estilocpanel.css"/>
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
        #informacoes-usuario{
            min-height:2225px;   
        }
        @media(max-width:1100px)
        {
           #informacoes-usuario{
            min-height:300px;   
        } 
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
                <h2>Informações do Funcionário</h2>
                <p>Nome:</p>
                <p>CPF:</p>
                <p>RG: </p>
                <p>Matricula: </p>
                <p>Mora em: </p>
                <p>Telefone:</p>
                <p>E-mail:</p>
            </aside>
            <section id="Cpanelusuario" class="flutuacaocpanel">
                <figure id="imagem-perfil-secundario">
                    <img src="IMAGENS/userperfilmenor.png" alt="Usuário"/>
                </figure>
                <h2 id="nomeusuario">Nome do usuário</h2>
                <h2 class="titulocpanel">Cidade</h2>
                <div class="paineldecontrole">
                    <div class="opcoescpanel">
                        <h3 class="centro">Cadastrar</h3>
                        <figure class="imagensdopainel">
                            <a href="cadastrocidade.html" target="_self"><img  src="IMAGENS/cadastrar.png" alt="Cadastrar Encomenda"/></a>
                        </figure>
                        
                    </div>
                    <div class="opcoescpanel">
                        <h3 class="centro">Alterar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/atualizar.png" alt="Atualizar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                    <div class="opcoescpanel">
                        <h3>Consultar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/pesquisa.png" alt="Consultar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                
                </div>
                
                
                
            </section>
            
            <section id="Cpanelusuario" class="flutuacaocpanel">
                <figure id="imagem-perfil-secundario">
                    <img src="IMAGENS/userperfilmenor.png" alt="Usuário"/>
                </figure>
                <h2 id="nomeusuario">Nome do usuário</h2>
                <h2 class="titulocpanel">Unidade</h2>
                <div class="paineldecontrole">
                    <div class="opcoescpanel">
                        <h3 class="centro">Cadastrar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/cadastrar.png" alt="Cadastrar Encomenda"/>
                        </figure>
                        
                    </div>
                    <div class="opcoescpanel">
                        <h3 class="centro">Alterar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/atualizar.png" alt="Atualizar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                    <div class="opcoescpanel">
                        <h3>Consultar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/pesquisa.png" alt="Consultar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                
                </div>
                
                
                
            </section>
            
            <section id="Cpanelusuario" class="flutuacaocpanel">
                <figure id="imagem-perfil-secundario">
                    <img src="IMAGENS/userperfilmenor.png" alt="Usuário"/>
                </figure>
                <h2 id="nomeusuario">Nome do usuário</h2>
                <h2 class="titulocpanel">Funcionário</h2>
                <div class="paineldecontrole">
                    <div class="opcoescpanel">
                        <h3 class="centro">Cadastrar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/cadastrar.png" alt="Cadastrar Encomenda"/>
                        </figure>
                        
                    </div>
                    <div class="opcoescpanel">
                        <h3 class="centro">Alterar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/atualizar.png" alt="Atualizar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                    <div class="opcoescpanel">
                        <h3>Consultar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/pesquisa.png" alt="Consultar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                
                </div>
                
                
                
            </section>
            
            <section id="Cpanelusuario" class="flutuacaocpanel">
                <figure id="imagem-perfil-secundario">
                    <img src="IMAGENS/userperfilmenor.png" alt="Usuário"/>
                </figure>
                <h2 id="nomeusuario">Nome do usuário</h2>
                <h2 class="titulocpanel">Cliente</h2>
                <div class="paineldecontrole">
                    <div class="opcoescpanel">
                        <h3 class="centro">Cadastrar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/cadastrar.png" alt="Cadastrar Encomenda"/>
                        </figure>
                        
                    </div>
                    <div class="opcoescpanel">
                        <h3 class="centro">Alterar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/atualizar.png" alt="Atualizar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                    <div class="opcoescpanel">
                        <h3>Consultar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/pesquisa.png" alt="Consultar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                
                </div>
                
                
                
            </section>
            
            <section id="Cpanelusuario" class="flutuacaocpanel">
                <figure id="imagem-perfil-secundario">
                    <img src="IMAGENS/userperfilmenor.png" alt="Usuário"/>
                </figure>
                <h2 id="nomeusuario">Nome do usuário</h2>
                <h2 class="titulocpanel">Encomenda</h2>
                <div class="paineldecontrole">
                    <div class="opcoescpanel">
                        <h3 class="centro">Cadastrar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/cadastrar.png" alt="Cadastrar Encomenda"/>
                        </figure>
                        
                    </div>
                    <div class="opcoescpanel">
                        <h3 class="centro">Alterar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/atualizar.png" alt="Atualizar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                    <div class="opcoescpanel">
                        <h3>Consultar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/pesquisa.png" alt="Consultar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                
                </div>
                
                
                
            </section>
            
            <section id="Cpanelusuario" class="flutuacaocpanel">
                <figure id="imagem-perfil-secundario">
                    <img src="IMAGENS/userperfilmenor.png" alt="Usuário"/>
                </figure>
                <h2 id="nomeusuario">Nome do usuário</h2>
                <h2 class="titulocpanel">Caminhão</h2>
                <div class="paineldecontrole">
                    <div class="opcoescpanel">
                        <h3 class="centro">Cadastrar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/cadastrar.png" alt="Cadastrar Encomenda"/>
                        </figure>
                        
                    </div>
                    <div class="opcoescpanel">
                        <h3 class="centro">Alterar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/atualizar.png" alt="Atualizar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                    <div class="opcoescpanel">
                        <h3>Consultar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/pesquisa.png" alt="Consultar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                
                </div>
                
                
                
            </section>
            <section id="Cpanelusuario" class="flutuacaocpanel">
                <figure id="imagem-perfil-secundario">
                    <img src="IMAGENS/userperfilmenor.png" alt="Usuário"/>
                </figure>
                <h2 id="nomeusuario">Nome do usuário</h2>
                <h2 class="titulocpanel">Romaneio</h2>
                <div class="paineldecontrole">
                    <div class="opcoescpanel">
                        <h3 class="centro">Cadastrar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/cadastrar.png" alt="Cadastrar Encomenda"/>
                        </figure>
                        
                    </div>
                    <div class="opcoescpanel">
                        <h3 class="centro">Alterar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/atualizar.png" alt="Atualizar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                    <div class="opcoescpanel">
                        <h3>Consultar</h3>
                        <figure class="imagensdopainel">
                            <img  src="IMAGENS/pesquisa.png" alt="Consultar Encomenda"/>
                        </figure>
                        
                    
                    </div>
                
                </div>
                
                
                
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