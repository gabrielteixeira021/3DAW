<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $file_name = "lista_de_usuarios.txt"; // guardando o nome do arquivo a ser alterado
    $nome = $_POST["nome"]; // nome da disciplina
    $email = $_POST["email"]; // sigla da disciplina
    $senha = $_POST["senha"]; // carga horária da disciplina
    
    
    $file = fopen($file_name, 'a') or die("Não foi possível abrir/criar arquivo");
    
    $linha = $nome . ";" . $email . ";" . $senha . "\n";
    
    fwrite($file, $linha);
    fclose($file);
    echo "Usuario adicionado";
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
</head>
<body>

    <header>
        <ul>
            <li>
                <a href="listarPergunta.php">Listar Perguntas</a>
            </li>
            <li>
                <a href="cadastrarPergunta.php">Cadastrar Perguntas</a>
            </li>
            
        </ul>
    </header>

    <form action="cadastrarUsuario.php" method="post">

        NOME:<input type="text" name="nome">
        E-MAIL:<input type="text" name="email">
        SENHA:<input type="text" name="senha">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>