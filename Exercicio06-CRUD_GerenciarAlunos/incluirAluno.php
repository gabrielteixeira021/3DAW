<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $file_name = "lista_alunos.txt"; 
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"]; 
    $matricula = $_POST["matricula"]; 
    
    
    $file = fopen($file_name, 'a') or die("Não foi possível abrir/criar arquivo");
    
    $linha = $nome . ";" . $cpf . ";" . $matricula . "\n";
    
    fwrite($file, $linha);
    fclose($file);    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>incluir Aluno</title>
    <link rel="stylesheet" href="../css/style.css">      
</head>
<body>

    <header>            
        </ul>
            <li><a href="../../index.html">Home</a></li>
            <a href="buscarAluno.html"><li>Alterar Aluno</li></a>
            <li><a href="listarAluno.php">listar Aluno</a></li>
            <li><a href="excluirAluno.html">Excluir Aluno</a></li>
        </ul>
    </header>
    
    <div class="container">
        
        <div class="title">
            <h1>Incluir Disciplina</h1>
        </div>
    
        <div class="form">
        
            <form action="incluirAluno.php" method="post">                            
                    
                NOME:<input type="text" name="nome" placeholder="Insira o nome do aluno">
            
                CPF:<input type="text" name="cpf" placeholder="Insira o cpf do aluno">
                                    
                MATRICULA:<input type="text" name="matricula" placeholder="Insira a matricula">                
                
                <input type="submit" name="enviar" id="Enviar" value="Enviar">
                
            </form>
        </div>
    </div>
</body>
</html>