<?php

include "validInfo.php";

var_dump($_POST);

if (validaData($_POST['nome'], $_POST['email'], $_POST['matricula'])) {

    echo "Informações válidas";

    include "database.php";

    $action = $_POST['action'] ?? '';

    switch ($action) {

        case 'create':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $matricula = $_POST['matricula'];

            $stmt = $conn->prepare("INSERT INTO alunos (nome, matricula, email) VALUES(?, ?, ?)");
            $stmt->bind_param("sis", $nome, $matricula, $email);
            $stmt->execute();
            echo "Aluno adicionado com sucesso";
            break;

        case 'read':

            $result = $conn->query("SELECT * FROM alunos");
            $alunos = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($alunos);
            break;

        case 'update':

            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $matricula = $_POST['matricula'];

            $stmt = $conn->prepare("UPDATE alunos SET nome = ?, matricula = ?, email = ? WHERE id = ?");
            $stmt->bind_param("ssii", $nome, $email, $matricula, $id);
            $stmt->execute();

            echo "Aluno Atualizado com sucesso";
            break;

        case 'delete':
            $id = $_POST['id'];

            $stmt = $conn->prepare("DELETE FROM alunos WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            echo json_encode(["status" => "Aluno excluído com sucesso"]);
            break;

        default:

            echo json_encode(["status" => "Ação não encontrada/inválida"]);
            break;
    }

    $conn->close();
} else {
    echo "<br>Informações inválidas";
}
