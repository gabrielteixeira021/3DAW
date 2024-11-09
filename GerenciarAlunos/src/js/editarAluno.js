document.addEventListener("DOMContentLoaded", function (){
    
    const urlParams = new URLSearchParams(window.location.search);

    const matricula = urlParams.get("matricula");

    if(matricula){
        fetchAlunoData(matricula);        
    }
});

function fetchAlunoData(matricula) {

    const xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        
        if(this.readyState === 4 && this.status === 200){
            
            try{
                
                const aluno = JSON.parse(this.responseText); 
                // atribuindo os dados do aluno ao valor de seu respectivo campo no formulario
                document.getElementById("id").value = aluno.id;
                document.getElementById("nome").value = aluno.nome;
                document.getElementById("matricula").value = aluno.matricula;
                document.getElementById("email").value = aluno.email;

            } catch (e){

                console.error("Erro ao processar os dados do aluno: ", e);
                document.getElementById("msg").textContent = "Erro ao carregar os dados do aluno";
            }
        }
    }
    
    xmlhttp.open("GET", `../php/aluno.php?action=readOne&matricula=${encodeURIComponent(matricula)}`, true);
    xmlhttp.send();
}