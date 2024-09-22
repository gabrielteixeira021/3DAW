<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $file_name = "disciplina.txt"; // guardando o nome do arquivo a ser alterado
    $dnome = $_POST["disc"]; // nome da disciplina
    $dsigla = $_POST["sigla"]; // sigla da disciplina
    $dcarga = $_POST["cargaH"]; // carga horária da disciplina
    
    
    $file = fopen($file_name, 'a') or die("Não foi possível abrir/criar arquivo");
    
    $linha = $dnome . ";" . $dsigla . ";" . $dcarga . "\n";
    
    fwrite($file, $linha);
    fclose($file);
    echo "Disciplina adicionada";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Disciplina</title>
    <link rel="stylesheet" href="../css/style.css">      
</head>
<body>

    <header>            
        </ul>
            <li><a href="../../index.html">Home</a></li>
            <a href="buscarDisciplina.html"><li>Alterar Disciplina</li></a>
            <li><a href="listarDisciplina.php">listar Disciplinas</a></li>
            <li><a href="excluirDisciplina.html">Excluir Disciplina</a></li>
        </ul>
    </header>
    
    <div class="container">
        
        <div class="title">
            <h1>Incluir Disciplina</h1>
        </div>
    
        <div class="form">
        
            <form action="incluirDisciplina.php" method="post">
                
                <div class="form-container">    
                    <label for="disc">Nome</label>
                    <input type="text" name="disc" placeholder="Insira o nome da disciplina">
                </div>
    
                <div class="form-container">
                    <label for="sigla">Sigla</label>
                    <input type="text" name="sigla" placeholder="Insira a sigla">
                </div>

                <div class="form-container">
                    <label for="cargaH">Carga Horária</label>
                    <input type="text" name="cargaH" placeholder="Insira a carga horária">
                </div>
                
                <input type="submit" name="enviar" id="Enviar" value="Enviar">
                
            </form>
        </div>
    </div>
</body>
</html>