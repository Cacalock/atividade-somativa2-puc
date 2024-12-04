const tbody = document.querySelector("#content");
console.log(tbody);
const listarQuestionarios = async () => {
    const dados = await fetch("../php/listarUsuarios.php");
    console.log(dados);
    const resposta = await dados.text();
    console.log(resposta);
    tbody.innerHTML = resposta;
};
listarQuestionarios();
