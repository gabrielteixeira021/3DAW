function EnviarDadosUsuario() {
  let nome = document.getElementById("nome").value;
  let email = document.getElementById("email").value;
  let senha = document.getElementById("senha").value;
  validaInfo(nome, email, senha);

  console.log("nome: " + nome + "email: " + email + "senha: " + senha);
  let objForm = { nome: nome, email: email, senha: senha };

  let xmlhttp = new XMLHttpRequest();

  console.log("1");
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log("2");
      document.getElementById("msg").innerHTML = this.responseText;
    } else if (this.readyState < 4) {
      console.log("3" + this.readyState);
    } else {
      console.log("requisição falhou" + this.readyState);
    }
  };
  console.log("4");

  xmlhttp.open(
    "GET",
    "../php/cadastroUsuario.php?nome=" +
      nome +
      "&email=" +
      email +
      "&senha=" +
      senha
  );

  xmlhttp.send();
  console.log("Informações enviadas");
  console.log(5);
  alert("Usuario criado");
}

function validaInfo(pnome, pemail, psenha) {
  let msg;
  if (pnome == "") msg = "Nome Não Fornecido";
  alert(msg);
  if (pemail == "") msg = "Email Não Fornecido";
  alert(msg);
  if (psenha == "") msg = "Insira uma Senha válida";
  alert(msg);
}
