<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Disciplinas</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>

    <header>
        <img src="" alt="">
        <ul>
            <li><a href="../../index.html">Home</a></li>
            <li><a href="incluirDisciplina.php">Incluir Disciplina</a></li>
            <li><a href="buscarDisciplina.html">Alterar Disciplina</a></li>
            <li><a href="excluirDisciplina.html">Excluir Disciplina</a></li>
        </ul>
    </header>

    <div class="container">
                
        <h1>Listar disciplinas</h1>
        <table>

            <tr><th>Nome</th><th>Sigla</th><th>Carga</th></tr>

            <?php
            // abrindo o documento apenas para leitura
            $myfile = fopen("disciplina.txt", 'r') or die("Não foi possível abrir o arquivo");
            
            // percorrendo todo o documento
            while(!feof($myfile)){

                $linha = fgets($myfile); // obtendo a linha atual do documento
                
                // verifica se a linha não está vazia
                if(!empty(trim($linha))){
                    $colunaDados = explode(";", $linha); // "explodir para conseguir as três colunas de informação do dado"

                    // verifica se há pelo menos 3 elementos no array
                    if(count($colunaDados) >= 3){

                        // criando as linhas e colunas, e printando os dados dentro
                        echo "<tr><td>" . $colunaDados[0] . "</td>" .
                        "<td>" . $colunaDados[1] . "</td>" . 
                        "<td>" . $colunaDados[2] . "</td><tr>";
                    }
                }
                
            }
            fclose($myfile);
            ?>
            
        </table>
    </div>
</body>
</html>
