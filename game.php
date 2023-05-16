<?php
session_start();
$_SESSION['username1'] = $_POST['u1'];
$_SESSION['username2']  = $_POST['u2'];
$_SESSION['username3']  = $_POST['u3'];
$nOfGames = $_POST['nOg'];
$nOfDice = $_POST['nOd'];
$maxBet = $nOfDice * 6;
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Craps</title>
</head>

<body>
  <div id="wrapper">

    <div id="diceBoard">
      <?php
      switch ($nOfDice) {
        case (1):
          echo "<img src=\"assets/kocke.gif\" id=\"img1\"alt=\"dice\" width=\"15%\" height=\"auto\" />";
          break;
        case (2):
          echo "<img src=\"assets/kocke.gif\" id=\"img1\"alt=\"dice\" width=\"15%\" height=\"auto\" />";
          echo "<img src=\"assets/kocke.gif\" id=\"img2\"alt=\"dice\" width=\"15%\" height=\"auto\" />";
          break;
        case (3):
          echo "<img src=\"assets/kocke.gif\" id=\"img1\"alt=\"dice\" width=\"15%\" height=\"auto\" />";
          echo "<img src=\"assets/kocke.gif\" id=\"img2\"alt=\"dice\" width=\"15%\" height=\"auto\" />";
          echo "<img src=\"assets/kocke.gif\" id=\"img3\"alt=\"dice\" width=\"15%\" height=\"auto\" />";
          break;
      }
      ?>
    </div>
    <div id="gameBoard">
      <div class="playerBox">
        <?php
        echo "<h1>" . $_SESSION['username1'] . "</h1>";
        ?>
        <div class="diceSum">Call:
          <input type="number" id="bet1" class="number" name="bet1" value="1" min="1" max="<?php echo $maxBet ?>" required />
        </div>
        <button class="lockIn" id="button1" onclick="check(1)">Lock In</button>
        <span class="won">Won Bets: <span id="nowg1">0</span></span>
      </div>
      <div class=" playerBox">
        <?php
        echo "<h1>" . $_SESSION['username2'] . "</h1>";
        ?>
        <div class="diceSum">Call:
          <input type="number" id="bet2" class="number" name="bet2" value="1" min="1" max="<?php echo $maxBet ?>" required />
        </div>
        <button class="lockIn" id="button2" onclick="check(2)">Lock In</button>
        <span class="won">Won Bets: <span id="nowg2">0</span></span>
      </div>
      <div class="playerBox">
        <?php
        echo "<h1>" . $_SESSION['username3'] . "</h1>";
        ?>
        <div class="diceSum">Call:
          <input type="number" id="bet3" class="number" name="bet3" value="1" min="1" max="<?php echo $maxBet ?>" required />
        </div>
        <button class="lockIn" id="button3" onclick="check(3)">Lock In</button>
        <span class="won">Won Bets: <span id="nowg3">0</span>
      </div>

    </div>
    <div id="bottom">
      <button id="rollButton" onclick="diceRoll()">Roll The Dice</button>
      <button id="reroll" onclick="init()">Reroll The Dice</button>

      <form id="lead" method="post" action="leaderboard.php">
        <input id="prvi" name="prvi" type="text" style="display:none">
        <input id="drugi" name="drugi" type="text" style="display:none">
        <input id="tretji" name="tretji" type="text" style="display:none">
        <button id="leadSubmit" onclick="leaderboards()">Leaderboards</button>
      </form>
    </div>
  </div>
  <script>
    const maxBet = <?php echo json_encode($maxBet); ?>;
    const nOfDice = <?php echo json_encode($nOfDice); ?>;
    const nOfGames = <?php echo json_encode($nOfGames); ?>;
    const player1 = <?php echo json_encode($_SESSION['username1']); ?>;
    const player2 = <?php echo json_encode($_SESSION['username2']); ?>;
    const player3 = <?php echo json_encode($_SESSION['username3']); ?>;
  </script>
  <script src="main.js"></script>

</body>

</html>