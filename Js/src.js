const musicBtn = document.querySelector("#musica");

const musica = new Audio("/data/wet_hands.mp3");
const clickSound = new Audio(
  "https://unpkg.com/minecraft-framework-css@1.1.5/css/assets/random.click.ogg"
);

let musicState = false;

musicBtn.addEventListener("click", (event) => {
  musicState = !musicState;
  musicState ? musica.play() : musica.pause();
});

const btn = document.querySelectorAll("#btnSound");

btn.forEach((element) => {
  element.addEventListener("click", (event) => {
    clickSound.play();
  });
});
