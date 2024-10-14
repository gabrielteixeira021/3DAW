<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

//  Escrevendo os dados do formulário em um arquivo de dados já existente
if (!file_exists("dadosUser.txt")) {
    $arqDisc = fopen("dadosUser.txt","w") or die("erro ao criar arquivo/escrever");
    $linha = "nome;email;senha\n";
    fwrite($arqDisc, $linha);
    fclose($arqDisc);
}

$arqDisc = fopen("dadosUser.txt","a") or die("erro ao abrir arquivo");

 $linha = $nome . ";" . $email . ";" . $senha . "\n";
 echo($linha);
 fwrite($arqDisc, $linha);
 fclose($arqDisc);    echo "<br>Usuario inserido com sucesso!";
}

?>