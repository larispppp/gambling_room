var rollButton = document.getElementById("rollButton");
var bet;
var interval = [];
let sum = 0;
let i = 1;
let playerBets = [];
let winners = [];
let gameWinners = [];
let reroll = document.getElementById("reroll");
let lead = document.getElementById("lead");
let leaderboard = document.getElementById("leaderboard");

let p = 1;
function check(x) {
  bet = document.getElementById("bet" + x).value;
  button = document.getElementById("button" + x);
  if (bet <= maxBet && bet > 0) {
    if (i == 3) {
      playerBets[x - 1] = bet;
      button.style.pointerEvents = "none";
      button.style.backgroundColor = "#6a6a6a";
      displayButton();
    } else {
      playerBets[x - 1] = bet;
      i++;
      button.style.pointerEvents = "none";
      button.style.backgroundColor = "#6a6a6a";
    }
  } else {
    Swal.fire(
      "Error",
      "You entered a number, higher than the possible dice sum!",
      "question"
    );
  }
}
function displayButton() {
  rollButton.style.display = "inherit";
}
function diceRoll() {
  rollButton.style.display = "none";
  rollButton.style.backgroundColor = "#5200528d";
  for (let i = 1; i <= nOfDice; i++) {
    interval.push(
      setTimeout(() => {
        source(i);
      }, i * 1000)
    );
  }
}
function source(i) {
  let roll = Math.floor(Math.random() * 6 + 1);
  sum += roll;
  let img = document.getElementById("img" + i);
  img.src = "assets/kocka" + roll + ".png";

  for (let i = 0; i < playerBets.length; i++) {
    if (playerBets[i] == sum) {
      winners[i] = 1;

      document.getElementById("nowg" + (i + 1)).textContent =
        parseInt(document.getElementById("nowg" + (i + 1)).textContent) + 1;
    } else {
      winners[i] = 0;
    }
  }
  gameWinners.push(winners);
  if (p < nOfGames) {
    p++;
    reroll.style.display = "inherit";
  } else {
    lead.style.display = "inherit";
  }
}
function init() {
  reroll.style.display = "none";
  rollButton.style.pointerEvents = "auto";
  rollButton.style.display = "none";
  rollButton.style.backgroundColor = "";
  for (let i = 1; i <= 3; i++) {
    button = document.getElementById("button" + i);
    button.style.pointerEvents = "auto";
    button.style.backgroundColor = "";
  }
  for (let i = 1; i <= nOfDice; i++) {
    let img = document.getElementById("img" + i);
    img.src = "assets/kocke.gif";
  }

  sum = 0;
  i = 1;
  playerBets = [];
  winners = [];
}
function info() {
  Swal.fire({
    title: "Craps",
    text: "Craps is a dice game in which players bet on the outcomes of the roll of a pair of dice. Here you can compete against two of your friends to see who is the luckiest",
    icon: "question",
    background: "#848484",
    confirmButtonColor: "#80008075",
    color: "#1b1b1b",
  });
}
function leaderboards() {
  let p1w = parseInt(document.getElementById("nowg1").textContent);
  let p2w = parseInt(document.getElementById("nowg2").textContent);
  let p3w = parseInt(document.getElementById("nowg3").textContent);

  let pw = [
    { name: player1, value: p1w },
    { name: player2, value: p2w },
    { name: player3, value: p3w },
  ];

  pw.sort(function (a, b) {
    return a.value - b.value; // Sort by value in ascending order
  });
  document.getElementById("prvi").value = pw[0].name + " " + pw[0].value;
  document.getElementById("drugi").value = pw[1].name + " " + pw[1].value;
  document.getElementById("tretji").value = pw[2].name + " " + pw[2].value;
}
function leaderboardLoad() {
  let st = document.getElementById("stName");
  let nd = document.getElementById("ndName");
  let rd = document.getElementById("rdName");
  let first = document.getElementById("first");
  let second = document.getElementById("second");
  let third = document.getElementById("third");
  let gold = document.getElementById("gold");
  let silver = document.getElementById("silver");
  let bronze = document.getElementById("bronze");
  st.textContent = firstPlace;
  nd.textContent = secondPlace;
  rd.textContent = thirdPlace;
  bronze.style.top = "154px";
  gold.style.top = "13px";
  silver.style.top = "60px";
  first.style.height = "70%";
  second.style.height = "60%";
  third.style.height = "40%";
}
