const tbody = document.querySelector("#content");
const listarQuestionarios = async () => {
    const dados = await fetch("../php/listarQuestinarios.php");
    const resposta = await dados.text();
    tbody.innerHTML = resposta;
};
listarQuestionarios();
