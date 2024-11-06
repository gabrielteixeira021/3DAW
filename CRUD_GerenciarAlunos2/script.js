document.addEventListener("DOMContentLoader", function () {
    const form = document.getElementById("formAluno");
    const tableAlunos = document.getElementById("tabelaAlunos").querySelector("tbody");

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        const formAluno = new formAluno(form);
        formAluno.append("action", form.id.valueOf ? "update" : "create");

        fetch("aluno.php", {
            method: "POST",
            body: formAluno,
        })

            .then(response => response.json())
            .then(data => {
                alert(data.status);
                form.reset();
                carregarAlunos();
            })
    });

    function carregarAlunos() {
        fetch("aluno.php", {
            method: "POST",
            body: new URLSearchParams({ action: "read" }),
        })
            .then(response => response.json())
            .then(alunos => {
                tableAlunos.innerHTML = "";
                alunos.forEach(aluno => {
                    const tr = document.createElement("tr");
                    tr.innerHTML = `            
            <td>${aluno.id}</td>
            <td>${aluno.nome}</td>
            <td>${aluno.matricula}</td>
            <td>${aluno.email}</td>
            <td>
            <button onclick="editarAluno(${aluno.id}, ${aluno.nome}, ${aluno.matricula}, ${aluno.email})">Editar</button>
            <button onclick="excluirAluno(${aluno.id})>Excluir</button>
            </td>
            `;
                    tableAlunos.appendChild(tr);
                });
            });
    };

    window.editarAluno = (id, aluno, email, matricula) => {
        form.id.value = id;
        form.nome.value = aluno;
        form.email.value = email;
        form.matricula.value = matricula;
    }

    window.excluirAluno = (id) => {
        if (confirm("Deseja realmente excluir?")) {
            fetch("aluno.php", {
                method: "POST",
                body: URLSearchParams({ action: "delete", id }),
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.status);
                    carregarAlunos();
                })
        }
    };

    carregarAlunos();
});