<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar perguntas</title>    
</head>
<body>

    <header>        
        <ul>
        <li><a href="../pages/index.html">Home</a></li>                                    
        </ul>
    </header>
    
    <div class="container">
                
        <h1>Listar perguntas</h1>
        <table>

            <tr><th>ID</th><th>Pergunta</th><th>alternativa A</th><th>Alternativa B</th><th>Alternativa C</th><th>alternativa D</th><th>Gabarito</th></tr>

            <?php
            // abrindo o documento apenas para leitura
            $file = fopen("dadosPerguntas.txt", 'r') or die("Não foi possível abrir o arquivo");
            
            // percorrendo todo o documento
            while(!feof($file)){
                
                $linha = fgets($file); // obtendo a linha atual do documento
                
                // verifica se a linha não está vazia
                if(!empty(trim($linha))){
                    $colunaDados = explode(";", $linha); // "explodir para conseguir as três colunas de informação do dado"

                    // verifica a coluna de dados está completa
                    if(count($colunaDados) >= 7){

                        // criando as linhas e colunas, e printando os dados dentro
                        echo "<tr><td>" . $colunaDados[0] . "</td>" . // id
                        "<td>" . $colunaDados[1] . "</td>" .  // pergunta
                        "<td>" . $colunaDados[2] . "</td>" . // altA
                        "<td>" . $colunaDados[3] . "</td>" . //altB
                        "<td>" . $colunaDados[4] . "</td>" . // altC
                        "<td>" . $colunaDados[5] . "</td>"  .  // altD                        
                        "<td>" . $colunaDados[6] . "</td><tr>"; // altCorreta
                    }
                }                
            }
            fclose($file);
            ?>
            
        </table>
    </div>
</body>
</html>




    
</body>
</html>