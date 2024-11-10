<?php

include "database.php";



header('Content-Type: application/json');

$action = $_REQUEST['action'];

switch($action){
    
    case 'create':
        
        // Recebe os dados do formulário
        $name = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $email = urldecode($_POST['email']);

        // Validando se todos os campos foram preenchidos
        if (empty($_POST['nome']) || empty($_POST['matricula']) || empty($_POST['email'])) {
            die("Erro: todos os campos devem ser preenchidos.");
        }
        
        // validando o email
        if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
            die("Erro: Email inválido.");
        }

        // Inserindo o aluno na base de dados
        $sql = $conn->prepare("INSERT INTO alunos (nome, matricula, email) 
            VALUES (?, ?, ?)");
        
        $sql->bind_param("sis", $name, $matricula, $email);
        
        if ($sql->execute()) {
            echo "<br>Aluno cadastrado com sucesso";
        } else {
            echo "<br>Erro ao cadastrar aluno: " . $sql->error;
        }
        $sql->close();

        break;
        case 'read':
        
        // retorna a tabela
        $resultado = $conn->query("SELECT * FROM alunos");
        $alunos = [];

        while ($row = $resultado->fetch_assoc()) {
            $alunos[] = $row;
        }

        echo json_encode($alunos);

        break;
    case 'update':
        
        // guarda as informações atuais do aluno
        $matricula = $_POST['matricula'];
        $nome = $_POST['nome'];
        $email = urldecode($_POST['email']);
        
        $sql = $conn->prepare("UPDATE alunos SET nome = ?, email = ? WHERE matricula = ?");
        $sql->bind_param("ssi", $nome, $email, $matricula);

        if($sql->execute()){
            echo json_encode(["status" => "success", "message" => "Aluno atualizado com sucesso"]);
        }else{
            echo json_encode(["status" => "error", "message" => "Erro ao atualizar aluno"]);
        }
        
        break;
    case 'delete':
        
        // deleta o aluno
        $matricula = $_POST['matricula'];
        $sql = $conn->prepare("DELETE FROM alunos WHERE matricula = ?");
        $sql->bind_param("i", $matricula);

        if($sql->execute()){
            echo json_encode(["status" => "success", "message" => "Aluno deletado com sucesso"]);
        }else{
            echo json_encode(["status" => "error", "message" => "Erro ao deletar aluno"]);
        }

        $sql->close();

        break;
    case 'readOne':
        
        // retorna as informações de um aluno
        $matricula = $_GET['matricula'];
        $sql = $conn->prepare("SELECT * FROM alunos WHERE matricula = ?");
        $sql->bind_param("i", $matricula);
        $sql->execute();
        $resultado = $sql->get_result();

        if($row = $resultado->fetch_assoc()){
            echo json_encode($row);
        }else{
            echo json_encode(["status" => "error", "message" => "Aluno não encontrado"]);
        }

        $sql->close();

        break;
    default:
        
        echo "Ação inválida";

        break;
}

$conn->close();
