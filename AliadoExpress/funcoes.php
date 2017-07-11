

<?php

require_once "REPOSITORIOS/banco.php";

//
function busca_cep($cep){  
    $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');  
    if(!$resultado){  
        $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
    }  
    parse_str($resultado, $retorno);   
    return $retorno;  
} 

function selecionaselect()
{

}



function cadastracidadeeestado($cidade,$estado,$id)
{
    try{
            $pdo = Conectar();
            if($id ==0)
            {
                $comando = $pdo -> prepare("insert into CIDADE (NOME_CIDADE, UF_CIDADE) values(:NOME_CIDADE,:UF_CIDADE) ");
                
            
            }
            else
            {
                $comando = $pdo-> prepare("update cidade set nome_cidade = :NOME_CIDADE, uf_cidade = :UF_CIDADE where cod_cidade = :codcid");
                $parametro[":codcid"] = $id;
            }
            $parametro[":NOME_CIDADE"] = $cidade;
            $parametro[":UF_CIDADE"] =  $estado;
            $comando ->execute($parametro);
            Desconectar($pdo);
    }
    catch(Exception $e)
    {
        echo $e ->getMessage();
    }
}


function carregacidade($opvalue)
{
     $valordoselect="";
     $select ="";

    try{
        $pdo= Conectar();
        $comando =$pdo-> prepare("select * from cidade");
        $comando ->execute();
        $linha = $comando->fetch(PDO::FETCH_ASSOC);
        while($linha)
        {
            if($opvalue == $linha['COD_CIDADE'])
            {
                $select = "selected";
            }
            else
            {
                $select="";
            }
            $valordoselect .= "<option value='{$linha['COD_CIDADE']}' $select>{$linha['NOME_CIDADE']}</option>";
            $linha = $comando->fetch(PDO::FETCH_ASSOC);
        }
        Desconectar($pdo);

    }
    catch(Exception $e)
    {
        echo $e;
    }
    return $valordoselect;
}
if(isset($_POST["clioption"]))
{
    $CPF_CNPJ = "";
    
    $clioption="";
    $clioption= $_POST["clioption"];
    if($clioption =="J")
    {
        $checked2 = "checked";
        $checked = "";
        $CPF_CNPJ = "CNPJ";
        $RG_RAZ ="Razao Social";
        $nomefantasiainput = "<label>Nome Fantasia</label><br><input type='text' name='nomefantasia' /><br>";
    }
    else
    {
        $checked = "checked";
        $checked2 = "";
        $CPF_CNPJ = "CPF";
        $RG_RAZ ="RG";
        $nomefantasiainput="";
    }
    
}

function gerarInputs($qtde, $numeros){
    for($i = 1; $i <= $qtde; $i++){
        $valor = "";
        if (isset($numeros[$i - 1]))
        $valor = $numeros[$i - 1];
        $inputencomenda= "Número $i<br><input type='text' name='numero[]' value='$valor'/><br><br>";
        "<label>Código da encomenda</label><br>";
//<input type='text name="codencom" value="" /><button>+</button><br>
    }
}

function gerarOptionCidades($estado, $cidade){
    if (file_exists("cidades.txt")){
        $idcidade = "";
        $idarq = fopen("cidades.txt", "r");
        fgets($idarq);
        while (!feof($idarq)){
            $linha = fgets($idarq);
            $vet = explode("|", $linha);
            if(trim($vet[2]) == $estado){
                $sel = $vet[1] == $cidade ? "selected":"";
                if($sel == "selected")
                {
                    $idcidade = $vet[0];
                }
                echo "<option value='{$vet[1]}'$sel>{$vet[1]}</option>";
            }
        }
        fclose($idarq);
        return $idcidade;
    }
}
function gerarOptionEstados($estado=0){
    if (file_exists("estados.txt")){
        $idestado="";
        $idarq = fopen("estados.txt", "r");
        fgets($idarq);
        while (!feof($idarq)){
            $linha = fgets($idarq);
            $vet = explode("|", $linha);
            $sel = $vet[2] == $estado ? "selected":"";
            if($sel == "selected")
            {
                $idestado = $vet[0];
            }
            echo "<option value='{$vet[2]}'$sel>{$vet[1]}</option>";
        }
    
        fclose($idarq);
        return $idestado;
    }
}




?>
    