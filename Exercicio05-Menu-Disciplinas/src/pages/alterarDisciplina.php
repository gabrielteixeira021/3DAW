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
        echo "$nome;$sigla;$carga";
        fclose($myFile);
        $msg = $found ? "Disciplina encontrada" : "Disciplina não encontrada"; 
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Alterar Disciplina</title>    
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Alterar Disciplina</h1>
    <br>
    <header>
        <ul>
            <li><a href="../../index.html">Home</a></li>                      
        </ul>
    </header>

    <form action="alteraDados.php" method="POST">
        Nome: <input type="text" name="nome" value='<?php echo htmlspecialchars($nome); ?>'>
        <br><br>
        Sigla: <input type="text" name="sigla" value='<?php echo htmlspecialchars($sigla); ?>'>
        <br><br>
        Carga Horária: <input type="text" name="carga" value='<?php echo htmlspecialchars($carga); ?>'>
        <br><br>
        <input type="submit" id="Enviar" value="Salvar alterações">
    </form>
    <p><?php echo htmlspecialchars($msg); ?></p>
    <br>
</body>
</html>
