<?php

    $sigla = "";
    $msg = "";
    $nome = "";
    $carga = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET')  {

    $sigla = $_GET["sigla"];
    $msg = "";
    echo " sigla: " . $sigla;
    $arqDisc = fopen("disciplinas.txt","r") or die("erro ao abrir arquivo");

    while(!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $colunaDados = explode(";", $linha);
        if $colunaDados[1] = $sigla {
            $nome = $colunaDados[0];
            $carga = $colunaDados[2];
            break;
        }
        fclose($arqDisc);
        $msg = "Deu tudo certo!!!";

    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $sigla = $_POST['sigla'];
        $nome = $_POST['nome'];
        $carga = $_POST['carga'];

        // arquivo temporário
        $tempFile = 'disciplinas_temp.txt';
        $arqDisc = fopen("disciplina.txt", "r") or die("Não foi possível abrir o arquivo");
        $temp = fopen($tempFile, "w") or die("Não foi possível abrir o arquivo");

        while(!feof($arqDisc)){
            $linha = fgets($arqDisc);
            $colunaDados = explode(";", $linha);

            if(trim($colunaDados[1])==$sigla){
                // escreve a linha atualizada no arquivo temporario
                fwrite($temp, "$nome;$sigla;$carga\n");
            }else{
                // Copia a linha antiga para o arquivo temporário
                fwrite($temp, $linha);
            }
            fclose($arqDisc);
            fclose($temp);

            rename($tempFile, "disciplina.txt");
            $msg = "Disciplina atualizada com sucesso!";
        }
    }

}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Alterar Disciplina</h1>
<br>
<header>

    <ul>
        <li><a href="../incluirDisciplina.php">Incluir Disciplina</a></li>
        <li><a href="../listarDisciplina.php">Listar Disciplina</a></li>        
    </ul>
</header>

<form action="./src/pages/alterarDisciplina.php" method="POST">

    Nome: <input type="text" name="nome" 
                value='<?php echo $nome ?>'>
    <br><br>
    Sigla: <input type="text" name="sigla"  
                value='<?php echo $sigla ?>'>
    <br><br>
    Carga Horaria: <input type="text" name="carga"  
            value='<?php echo $carga ?>'>
    <br><br>
    <input type="submit" value="Alterar Disciplina">
</form>
<p><?php echo $msg ?></p>
<br>
</body>
</html>