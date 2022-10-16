<?php
//Atribui o XML a uma variavel
$string = "<?xml version='1.0' encoding='UTF-8'?>
<signos>
    <signo>
        <dataInicio>21/03</dataInicio>
        <dataFim>20/04</dataFim>
        <signoNome>Aries</signoNome>
        <descricao>Lorem ipsum dolor sit amet.</descricao>
    </signo>
    <signo>
        <dataInicio>21/04</dataInicio>
        <dataFim>20/05</dataFim>
        <signoNome>Touro</signoNome>
        <descricao>Lorem ipsum dolor sit amet.</descricao>
    </signo>
    <signo>
        <dataInicio>21/05</dataInicio>
        <dataFim>20/06</dataFim>
        <signoNome>Gemeos</signoNome>
        <descricao>Lorem ipsum dolor sit amet.</descricao>
    </signo>
    <signo>
        <dataInicio>21/06</dataInicio>
        <dataFim>22/07</dataFim>
        <signoNome>Cancer</signoNome>
        <descricao>Lorem ipsum dolor sit amet.</descricao>
    </signo>
    <signo>
        <dataInicio>23/07</dataInicio>
        <dataFim>22/08</dataFim>
        <signoNome>Leao</signoNome>
        <descricao>Lorem ipsum dolor sit amet.</descricao>
    </signo>
    <signo>
        <dataInicio>23/08</dataInicio>
        <dataFim>22/09</dataFim>
        <signoNome>Virgem</signoNome>
        <descricao>Lorem ipsum dolor sit amet.</descricao>
    </signo>
    <signo>
        <dataInicio>23/09</dataInicio>
        <dataFim>23/10</dataFim>
        <signoNome>Libra</signoNome>
        <descricao>Lorem ipsum dolor sit amet.</descricao>
    </signo>
    <signo>
        <dataInicio>23/10</dataInicio>
        <dataFim>21/11</dataFim>
        <signoNome>Escorpiao</signoNome>
        <descricao>Lorem ipsum dolor sit amet.</descricao>
    </signo>
    <signo>
        <dataInicio>22/11</dataInicio>
        <dataFim>21/12</dataFim>
        <signoNome>Sargitario</signoNome>
        <descricao>Lorem ipsum dolor sit amet.</descricao>
    </signo>
    <signo>
        <dataInicio>22/12</dataInicio>
        <dataFim>20/01</dataFim>
        <signoNome>Capricornio</signoNome>
        <descricao>Lorem ipsum dolor sit amet.</descricao>
    </signo>
    <signo>
        <dataInicio>21/01</dataInicio>
        <dataFim>19/02</dataFim>
        <signoNome>Aquario</signoNome>
        <descricao>Lorem ipsum dolor sit amet.</descricao>
    </signo>
    <signo>
        <dataInicio>19/02</dataInicio>
        <dataFim>20/03</dataFim>
        <signoNome>Peixes</signoNome>
        <descricao>Lorem ipsum dolor sit amet.</descricao>
    </signo>
</signos>";
//Data informada pelo cliente e convertida para manipulação
$data = $_POST['data'];
$ddd = strtotime($data);
$data = date('m-d', $ddd);
//Pega o ano atual do calendario e atribui a uma variavel
$ano = date('Y');
//Ajusta a data para o ano Atual
$data = $ano . '-' . $data;
//TimeSleep para manipulaçao
$dddd = strtotime($data);
//Atribui a variaveis separadamente o dia e o mes informado pelo cliente
$diaCliente = date('d', $dddd);
$mesCliente = date('m', $dddd);
//Abrindo arquivo xml
$xml = new SimpleXMLElement($string);
?>
<!--Esgtrutura html-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qual o seu signo?</title>
</head>
<body>
    <div>
        <h2>Qual o seu signo?</h2>
        <?php 
            //Logica para checar as datas
            foreach($xml->signo as $signo0):
                //Atribui a data inicio e data fim a uma variavel
                $dataInicio = (string)$signo0->dataInicio;
                $dataFim = (string)$signo0->dataFim;
                //Ajusta data inicio e data fim para o ano atual
                $dataInicio = str_replace('/', '-', $dataInicio);
                $dataFim = str_replace('/', '-', $dataFim);
                $dataInicio = $dataInicio . '-' .$ano;
                $dataFim = $dataFim . '-' .$ano;             
                //Time sleep data inicio e data fim
                $toTimeInicio = strtotime($dataInicio);
                $toTimeFim = strtotime($dataFim);
                //Atribui data inicio, data fim, mes inicio e mes final a uma variavel
                $diaSignoInicio = date('d', $toTimeInicio);
                $diaSignoFim = date('d', $toTimeFim);
                $mesSignoInicio = date('m', $toTimeInicio);
                $mesSignoFim = date('m', $toTimeFim);
                //Checagem para ver entre qual datas esta a data informada pelo cliente
                if(($diaCliente >= $diaSignoInicio && $mesCliente == $mesSignoInicio) || ($diaCliente <= $diaSignoFim && $mesCliente == $mesSignoFim)){
                    ?> <span>Seu signo: <?php echo $signo0->signoNome . '</br>'; ?>
                       <span>Descriçao: <?php echo $signo0->descricao . '</br>';
                }            
            endforeach;
            echo '</br>'
        ?>
        <!--Botao para voltar a pag da data-->
        <form action="index.html">
            <input type="submit" value="Voltar">
        </form>
        </div>
</body>
</html>
