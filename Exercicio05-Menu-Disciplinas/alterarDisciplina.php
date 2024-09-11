<php



?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Disciplina</title>    
    <link rel="stylesheet" href="./src/style.css">   
</head>
<body>

    <header>
        <img src="" alt="">
        <li>
            <ul><a href="index.html">Home</a></ul>
            <ul><a href="criarDisciplina.php">Criar Disciplina</a></ul>
            <ul><a href="listarDisciplina.php">Listar Disciplina</a></ul>
        </li>
    </header>
    
    
    <div class="container">


        
        <div class="title">
            <h1>Alterar Disciplina</h1>
        </div>

        <div class="form">

            <form action="alterarDisciplina.php" method="post">
                
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