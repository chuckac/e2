<!doctype html>
<html lang='en'>

<head>

    <Title>Project 1</title>
    <meta charset='utf-8'>

</head>

<body>

    <h1>Project 1</h1>
    <h2>Mechanics</h2>
    <br>
    <ul>
        <li>Player 1, an obnxious paladin, rolls their 20-sided die in order to battle the dragon! This roll determines
        </li>
        your attack power.</li>
        <li>It's a new dragon every time: Blue, Black, Red, or Gold. Some of them are stronger than others, so I
            hope you roll something high enough to beat them!</li>
        <li>Luckily, as an obnoxious paladin, you can resurrect every time and keep battling by clicking refresh. Good
            luck!</li>
        <li> But wait! Sneak attack...the dragon has its own 20-sided die to add to its already powerful nature!</li>
    </ul>
    <p>
    <h2>Battle your dragon!</h2>
    <ul>
        <li>You rolled <?php echo $dicerollplayer; ?>!</li>
        <li>But wait, a <?php echo $battledragon['dragontype']; ?>
            approaches. It has a <?php echo $battledragon['attacktype']; ?>
            attack!</li>
        <li>The crafty dragon has most certainly cheated and rolled a <?php echo $dicerolldragon; ?> to add to its already powerful
            <?php echo $battledragon['attackpower']; ?>
            attack points.
        </li>
        <li>You <?php echo $playeroutcome; ?> <?php echo $playeraccolade; ?>
        </li>
    </ul>
    <h3>Refresh your page to battle again!</h3>
    </p>

</body>

</html>