<?php

include "database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    var_dump($_POST); // Isso irá mostrar os dados recebidos

    // Recebe os dados do formulário
    $name = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $email = urldecode($_POST['email']);

    
    // Validando se todos os campos foram preenchidos
    if (empty($_POST['nome']) || empty($_POST['matricula']) || empty($_POST['email'])) {
        die("Erro: todos os campos devem ser preenchidos.");
    }

    // validando o email
    if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)){
        die("Erro: Email inválido.");
    }
    

    $sql = $conn->prepare("INSERT INTO alunos (nome, matricula, email) 
    VALUES (?, ?, ?)");

    $sql->bind_param("sis", $name, $matricula, $email);

    if ($sql->execute()) {
        echo "<br>Aluno cadastrado com sucesso";
    } else {
        echo "<br>Erro ao cadastrar aluno: " . $sql->error;
    }

    $sql->close();
    $conn->close();
}
