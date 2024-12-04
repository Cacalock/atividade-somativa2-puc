const onClick = async (bool) => {
    console.log("chamado 2");
    if (bool) {
        window.location.href = "php/deletarUsuario.php";
    }
};

const config = () => {
    console.log("chamado 1");
    document
        .getElementById("yes")
        .addEventListener("click", () => onClick(true));
    document
        .getElementById("no")
        .addEventListener("click", () => onClick(false));
};
config();
