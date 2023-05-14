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
      </div>
      <div class=" playerBox">
        <?php
        echo "<h1>" . $_SESSION['username2'] . "</h1>";
        ?>
        <div class="diceSum">Call:
          <input type="number" id="bet2" class="number" name="bet2" value="1" min="1" max="<?php echo $maxBet ?>" required />
        </div>
        <button class="lockIn" id="button2" onclick="check(2)">Lock In</button>
      </div>
      <div class="playerBox">
        <?php
        echo "<h1>" . $_SESSION['username3'] . "</h1>";
        ?>
        <div class="diceSum">Call:
          <input type="number" id="bet3" class="number" name="bet3" value="1" min="1" max="<?php echo $maxBet ?>" required />
        </div>
        <button class="lockIn" id="button3" onclick="check(3)">Lock In</button>
      </div>
      <br></br>
    </div>
    <button id="rollButton" onclick="diceRoll()">Roll The Dice</button>
  </div>
  <script>
    const maxBet = <?php echo json_encode($maxBet); ?>;
    const nOfDice = <?php echo json_encode($nOfDice); ?>;
  </script>
  <script src="main.js"></script>
</body>

</html>