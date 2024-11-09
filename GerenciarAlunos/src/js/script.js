function EnviarDadosCadastro() {


    // Obtendo os valores dos inputs
    let nome = document.getElementById("nome").value;
    let matricula = document.getElementById("matricula").value;
    let email = document.getElementById("email").value;

    // Verificar se todos os campos estão preenchidos
    if (!nome || !matricula || !email) {
        document.getElementById("msg").innerHTML = "Preencha todos os campos.";
        return;
    }

    // adicionando no objForm
    let objForm = new FormData(); 
    objForm.append("nome", nome);
    objForm.append("matricula", matricula);
    objForm.append("email", email);

    console.log(objForm);

    let xmlhttp = new XMLHttpRequest();    

    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("msg").innerHTML = xmlhttp.responseText;

        }
    };

    xmlhttp.open("POST", "../php/aluno.php?action=create", true);
    xmlhttp.send(objForm);
    console.log("Informações Enviadas");
}
