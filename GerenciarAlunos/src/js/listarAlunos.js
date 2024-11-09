document.addEventListener("DOMContentLoaded", function () {
    listarAluno();
});

function listarAluno() {

    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {

        if (this.readyState === 4 && this.status === 200) {

            try {

                console.log(this.responseText);                 // exibe a resposta json como texto

                const alunos = JSON.parse(this.responseText);   // converte o obj json em um objeto javascript

                atualizaTabela(alunos);         // atualiza a tabela

                console.log(alunos);            // exibe o json como objeto

            } catch (e) {
                console.error("Erro ao processar os dados: ", e);
                document.getElementById("msg").textContent = "Erro ao carregar os dados dos alunos";
            }

        } else if (this.readyState === 4) {
            console.error("Erro na requisição " + this.status);
            document.getElementById("msg").textContent = "Erro ao carregar os dados dos alunos: status != 200";
        }
    };

    xmlhttp.open("GET", "../php/aluno.php?action=read", true);
    xmlhttp.send();
}


function atualizaTabela(alunos) {

    const table = document.getElementById("tabelaAluno").querySelector("tbody");
    table.innerHTML = ""; // limpa o corpo da tabela

    alunos.forEach(aluno => {   // cria uma linha para cada aluno

        const tr = document.createElement("tr");

        ["id", "nome", "matricula", "email"].forEach(campo => {
            const td = document.createElement("td");    // cria a célula correspondente para cada informação 
            td.textContent = aluno[campo] || "N/A";    // atribui um conteúdo de texto na célula            
            tr.appendChild(td); // coloca a célula na linha de dados atual 
        });

        // Coluna para o botão de edição
        const tdEditar = document.createElement("td");
        const btnEditar = document.createElement("button");
        btnEditar.textContent = "Editar";
        btnEditar.onclick = () => {
            editarAluno(aluno.matricula);  // chama a função passando matricula
        }
        tdEditar.appendChild(btnEditar);    // jogando o botão dentro da célula 
        tr.appendChild(tdEditar);   // adiciona na linha atual

        // Coluna para o botão de exclusão
        const tdExcluir = document.createElement("td");
        const btnExcluir = document.createElement("button");
        btnExcluir.textContent = "Excluir";
        btnExcluir.onclick = () => {
            deletarAluno(aluno.matricula);
        }
        tdExcluir.appendChild(btnExcluir);
        tr.appendChild(tdExcluir);

        table.appendChild(tr); // adiciona essa linha à tabela
    });
}

function deletarAluno(matricula) {

    console.log(matricula);

    const confirmar = confirm("Tem certeza que deseja excluir este aluno?");

    if (!confirmar) return;

    const xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "../php/aluno.php?action=delete", true);       
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");      

    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            listarAluno();  // atualiza a lista após a exclusão
        } else if (this.readyState === 4) {
            console.error("Erro ao deletar aluno: " + this.status);
        }
    }
    xmlhttp.send("matricula=" + encodeURIComponent(matricula));     // envia a matricula pro backs
}



function editarAluno(matricula) {

    console.log(matricula);
    
    window.location.href = `../pages/editarAluno.html?matricula=${encodeURIComponent(matricula)}`;
}
