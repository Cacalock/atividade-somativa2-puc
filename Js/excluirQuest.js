const onClick = async (bool) => {
    console.log("chamado 2");
    if (bool) {
        const form = document.getElementById("form-quest");
        form.submit();
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
