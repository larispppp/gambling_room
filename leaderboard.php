<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Craps</title>
    <script src="main.js"></script>
</head>

<body onload="leaderboardLoad()">
    <div id="leaderboard">
        <img src="assets/bronze.png" id="bronze" alt="bronze" width="10%" height="auto" style="position: absolute;
    left: 100px;
    top: 0px; transition: top 2.5s ease-in-out;">
        <div id="third">
            <div id=rdName></div>
        </div>
        <img src="assets/gold.png" id="gold" alt="gold" width="10%" height="auto" style="position: absolute;
    top: 0px; transition: top 1.5s ease-in-out;">
        <div id="first">
            <div id=stName></div>
        </div>
        <img src="assets/silver.png" id="silver" alt="silver" width="10%" height="auto" style="position: absolute;
    left: 620px;
    top: 0px; transition: top 2s ease-in-out;">
        <div id="second">
            <div id=ndName></div>
        </div>
    </div>
    <script>
        const firstPlace = "<?php echo $_POST['prvi']; ?>";
        const secondPlace = "<?php echo $_POST['drugi']; ?>";
        const thirdPlace = "<?php echo $_POST['tretji']; ?>";
    </script>
</body>

</html>