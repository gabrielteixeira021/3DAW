<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $ID = $_GET['id'];
    $mostrar_linha = "";

    $file = fopen("dadosPerguntas.txt", 'r') or die("Não foi possível abrir o arquivo");
    
    while(!feof($file)){

        $linha = fgets($file);
        $colunaDados = explode(";", $linha);        

        if(trim($colunaDados[0]) == $ID){
            $mostrar_linha = $linha;
            break;
        }
    }
    echo $mostrar_linha;
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Uma pergunta</title>    
</head>
<body>

    <header>
        
        <ul>
            <li><a href="../pages/index.html">Home</a></li>                                    
        </ul>
    </header>

    <div class="container">
                
        <form action="listarUma.php" method="get">

            Insira o ID da pergunta:<br><input type="text" name="id">

            <input type="submit" value="Enviar">

        </form>
    </div>
</body>
</html>