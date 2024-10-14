function EnviarDadosUsuario() {

  let nome = document.getElementById("nome").value;
  let email = document.getElementById("email").value;
  let senha = document.getElementById("senha").value;

  if (!validaInfo(nome, email, senha)) return; // Validar informações

  console.log("nome: " + nome + "email: " + email + "senha: " + senha);
  let objForm = { nome: nome, email: email, senha: senha };
  let objJson = JSON.stringify(objForm);
  console.log("JSON: ", objJson);

  let xmlhttp = new XMLHttpRequest();

  console.log("1");
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      console.log("OK: " + this.responseText + "\n");
      console.log("2");
      document.getElementById("msg").innerHTML = this.responseText;

    } else if (this.readyState < 4) {
      console.log("3: " + this.readyState);
    } else {
      console.log("requisição falhou" + this.readyState);
    }
  };

  console.log("4");

  xmlhttp.open(
    "POST",
    "../php/cadastroUsuario.php", 
    true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  // enviando os dados para o back
  xmlhttp.send("nome=" + encodeURIComponent(nome) + "&email=" + encodeURIComponent(email) + "&senha=" + encodeURIComponent(senha));
  console.log("Informações enviadas");
  console.log("5");
  alert("Usuario criado");
}

function validaInfo(pnome, pemail, psenha) {
  let msg;

  if (pnome == "") msg += "Nome Não Fornecido";
  if (pemail == "") msg += "Email Não Fornecido";
  if (psenha == "") msg += "Insira uma Senha válida";

  if (msg) {
    alert(msg);
    return false;
  }
  return true;
}
