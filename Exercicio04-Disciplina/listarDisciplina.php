<?php

$file_nm = "disciplina.txt";

$myfile = fopen($file_nm, 'r') or die("Erro ao abrir arquivo");

echo "<tr>";

while(!feof($myfile)){    
    echo fgets($myfile) . "<br>";
}
 
echo "</tr>";

fclose($myfile);