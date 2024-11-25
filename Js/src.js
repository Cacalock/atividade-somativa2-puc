const musicBtn = document.querySelector("#musica");
const musica = new Audio("/data/wet_hands.mp3");
const clickSound = new Audio(
    "https://unpkg.com/minecraft-framework-css@1.1.5/css/assets/random.click.ogg",
);

let musicState = false;

musicBtn.addEventListener("click", (event) => {
    musicState = !musicState;
    musicState ? musica.play() : musica.pause();
});

const btn = document.querySelectorAll(".btnSound");

btn.forEach((element) => {
    element.addEventListener("click", (event) => {
        clickSound.play();
    });
});

function block() {
    return sessionStorage.getItem("logado") === "true";
}
document.getElementById("login").addEventListener("click", function (event) {
    if (!block()) {
        event.preventDefault();
        alert("Por favor, faça login para acessar o questionário.");
    } else {
        window.location.href = "questionario.html";
    }
});
