<?php

$file_name = "disciplina.txt"; // guardando o nome do arquivo a ser alterado
$dnome = $_POST["disciplina"]; // nome da disciplina
$dsigla = $_POST["sigla"]; // sigla da disciplina
$dcarga = $_POST["carga"]; // carga horária da disciplina

//echo "Nome: " . $dnome . "<br>Sigla: " . $dsigla . "<br>Carga Horária: " . $dcarga;

// abre o arquivo para escrever algo no final(se não existir, cria o arquivo)
$myfile = fopen($file_name, 'a')  or die("Não foi possível abrir o arquivo");

//verifica se o arquivo está vazio
/*
if(filesize($file_name) == 0){
    $header = "nome;sigla;carga\n"; // Cabeçalho do arquivo
    fwrite($myfile, $header);    
}
*/
$linha = $dnome . ";" . $dsigla . ";" . $dcarga . "\n";

fwrite($myfile, $linha); // escrevendo uma nova linha contendo as informações da disciplina
fclose($myfile);
?>


<!--Utilização de Arquivo CSV-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Disciplinas</title>
    <link rel="stylesheet" href="./src/style.css">   
</head>
<body>

    <div class="container">

        <form action="index.php" method="post" name="Criar disciplina" id="Form">

            <div class="form-group">
                <label for="discNome">Disciplina:</label>
                <input type="text" name="disciplina" id="discNome" placeholder="Insira o nome da disciplina">
            </div>

            <div class="form-group">
            
                <label for="sigl">Sigla:</label>
                <input type="text" name="sigla" id="sigl" placeholder="Insira a sigla">
            </div>

            <div class="form-group">
                <label for="cargHoraria">Carga Horária:</label>
                <input type="text" name="carga" id="cargHoraria" placeholder="Insira a carga horária">
            </div>

            <div class="form-group">
                <label for="periodo">Período:</label>
                <input type="text" name="p" id="Periodo" placeholder="Insira o período a ser inserida a matéria">
            </div>
            <input type="submit" name="enviar" id="Enviar" value="Enviar">
        </form>
        
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