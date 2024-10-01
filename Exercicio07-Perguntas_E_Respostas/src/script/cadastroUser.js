
function EnviarDadosUsuario(){

    
    let nome = document.getElementById("nome").value; 
    let email = document.getElementById("email").value;

    console.log("nome: " + nome + "email: " + email);
    let objForm = {"nome":nome, "email":email};

    let xmlhttp = new XMLHttpRequest();

    console.log("1");
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){

            console.log("2");
            document.getElementById("msg").innerHTML = this.responseText;            
        }
        else if(this.readyState<4){
            console.log("3" + this.readyState);
        }
        else{
            console.log("requisição falhou" + this.readyState);
        }
        console.log("4");

        xmlhttp.open("GET", "link");
    }
}