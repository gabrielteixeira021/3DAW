<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Disciplinas</title>
    <link rel="stylesheet" href="./src/style.css">   
</head>
<body>

    <header>
        <img src="" alt="">
        <li>
            <ul><a href="index.html">Home</a></ul>
            <ul><a href="criarDisciplina.php">Criar Disciplina</a></ul>
            <ul><a href="alterarDisciplina.php">Alterar Disciplina</a></ul>
        </li>
    </header>

    <div class="container">
                
        <h1>Listar disciplinas</h1>
        <table>

            <tr><th>nome</th><th>sigla</th><th>carga</th></tr>
            <?php
            $arqDisc = fopen("disciplina.txt","r") or die("erro ao abrir arquivo");
            
            while(!feof($arqDisc)) {
                    $linha = fgets($arqDisc);
                    $colunaDados = explode(";", $linha);
            
            // <tr><td><?php echo $colunaDados[0] </td>
                    echo "<tr><td>" . $colunaDados[0] . "</td>" .
                        "<td>" . $colunaDados[1] . "</td>" .
                        "<td>" . $colunaDados[2] . "</td></tr>";
                }
            
            fclose($arqDisc);                
            ?>
            
        </table>
    </div>
</body>
</html>