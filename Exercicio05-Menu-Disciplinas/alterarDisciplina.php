<?php

$sigla = "";
$msg = "";
$nome = "";
$carga = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET')  {
    $sigla = $_GET["sigla"];
    $fileName = "disciplina.txt";

    if (!file_exists($fileName)) {
        $msg = "Arquivo não encontrado.";
    } else {
        $myFile = fopen($fileName, "r") or die("Erro ao abrir o arquivo.");
        $found = false; 

        while (!feof($myFile)) {
            $linha = fgets($myFile);
            $colunaDados = explode(";", $linha);
            if (trim($colunaDados[1]) == $sigla) {
                $nome = $colunaDados[0];
                $carga = $colunaDados[2];
                $found = true; // verifica se a disciplina existe
                break;
            }
        }
        fclose($myFile);
        $msg = $found ? "Disciplina encontrada" : "Disciplina não encontrada"; 
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sigla = $_POST['sigla'];
    $nome = $_POST['nome'];
    $carga = $_POST['carga'];

    $fileName = "disciplina.txt";
    $tempFile = 'disciplinas_temp.txt';

    if (!file_exists($fileName)) {
        $msg = "Arquivo não encontrado.";
    } else {
        $myFile = fopen($fileName, "r") or die("Não foi possível abrir o arquivo.");
        $temp = fopen($tempFile, "w") or die("Não foi possível criar o arquivo temporário.");

        while (!feof($myFile)) {
            $linha = fgets($myFile);
            $colunaDados = explode(";", $linha);

            if (trim($colunaDados[1]) == $sigla) {
                $newLinha = "$nome;$sigla;$carga\n";
                fwrite($temp, $newLinha);
            } else {
                fwrite($temp, $linha);
            }
        }
        fclose($myFile);
        fclose($temp);
        
        if (rename($tempFile, $fileName)) {
            $msg = "Disciplina atualizada com sucesso!";
        } else {
            $msg = "Erro ao atualizar a disciplina.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Alterar Disciplina</title>
</head>
<body>
    <h1>Alterar Disciplina</h1>
    <br>
    <header>
        <ul>
            <li><a href="incluirDisciplina.php">Incluir Disciplina</a></li>
            <li><a href="listarDisciplina.php">Listar Disciplina</a></li>        
        </ul>
    </header>

    <form action="alterarDisciplina.php" method="POST">
        Nome: <input type="text" name="nome" value='<?php echo htmlspecialchars($nome); ?>'>
        <br><br>
        Sigla: <input type="text" name="sigla" value='<?php echo htmlspecialchars($sigla); ?>'>
        <br><br>
        Carga Horária: <input type="text" name="carga" value='<?php echo htmlspecialchars($carga); ?>'>
        <br><br>
        <input type="submit" value="Alterar Disciplina">
    </form>
    <p><?php echo htmlspecialchars($msg); ?></p>
    <br>
</body>
</html>
