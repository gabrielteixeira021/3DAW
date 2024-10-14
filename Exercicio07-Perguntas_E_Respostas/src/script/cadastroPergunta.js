function EnviarDadosPergunta() {

    let form = document.getElementById("formPergunta");
    let formData = new FormData(form);

    // convertendo formData para um objeto simples
    let objForm = {};
    formData.forEach((value, key) => {
        objForm[key] = value;
    });

    // converte o obj pra json
    let objJson = JSON.stringify(objForm);   
    console.log(objJson);

    let xmlhttp = new XMLHttpRequest();

    console.log("1");

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log("OK" + this.responseText + "\n");
        } else {
            if (this.readyState < 4) {
                console.log("3: " + this.readyState);
            } else {
                console.log("Requisição Falhou" + this.readyState);
            }
        }
    };

    console.log("4");

    xmlhttp.open("POST", "../php/cadastroPergunta.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(objJson);
    console.log("Informações enviadas");
    console.log("5");
    alert("Usuario criado");
}