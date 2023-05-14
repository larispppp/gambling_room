var rollButton = document.getElementById("rollButton");
var bet;
var interval = [];
let sum = 0;
let i = 1;
function check(x) {
  bet = document.getElementById("bet" + x).value;
  button = document.getElementById("button" + x);
  if (bet <= maxBet && bet > 0) {
    if (i == 3) {
      button.style.pointerEvents = "none";
      button.style.backgroundColor = "#6a6a6a";
      displayButton();
    } else {
      i++;
      button.style.pointerEvents = "none";
      button.style.backgroundColor = "#6a6a6a";
    }
  } else {
    Swal.fire("The Internet?", "That thing is still around?", "question");
  }
}
function displayButton() {
  rollButton.style.display = "inherit";
}
function diceRoll() {
  for (let i = 1; i <= nOfDice; i++) {
    interval.push(
      setTimeout(() => {
        source(i);
      }, i * 500)
    );
  }
}
function source(i) {
  let roll = Math.floor(Math.random() * 6 + 1);
  sum += roll;
  console.log(sum);
  let img = document.getElementById("img" + i);
  img.src = "assets/kocka" + roll + ".png";
}
