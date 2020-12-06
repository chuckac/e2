<!doctype html>
<html lang='en'>

<head>

    <link rel="stylesheet" href="main.css">
    <title>>Project 2: Dragon Battle!</title>
    <meta charset='utf-8'>

</head>

<body>

    <h1>Project 2</h1>

    <h2>Instructions</h2>

    <br>

    <ul>
        <li>You're an obnxious, intermediate level wizard. It's time in your training to choose your power.</li>
        <li>When you've decided on the path you will take, click submit to roll your 20-sided die to battle the dragon.
        </li>
        <li>You were pretty much the worst student. You forgot to note the base power that each path holds, which is
            too bad for you it seems. That dragon really doesn't care and is going to attack!</li>
        <li>It's a new dragon every time: Blue, Black, Red, Grey, Fushsia, or Gold. Some of them are stronger than
            others, so I hope you roll a high enough power bonus to beat them!</li>
        <li>Luckily, as an obnoxious wizard, you can resurrect every time and keep battling by clicking refresh.</li>
    </ul>

    <br>

    <p><b>Good luck!</b> Uh oh....Sneak attack! The dragon has its own 20-sided die to add to its already
        powerful nature!</p>

    <br>

    <h2>Are you ready to battle your dragon?</h2>

    <br>

    <form method='GET' action='process.php'>

        <input type='radio' name='pathchoice' value='ice' id='ice' checked><label for='ice'>Path of Cold Ice</label><br>
        <input type='radio' name='pathchoice' value='fire' id='fire'><label for='fire'>Path of Toasty Fire</label><br>
        <input type='radio' name='pathchoice' value='wind' id='wind'><label for='wind'>Path of the Gentle
            Breeze</label><br>
        <input type='radio' name='pathchoice' value='water' id='water'><label for='water'>Path of the Water
            Droplet</label><br>
        <input type='radio' name='pathchoice' value='heart' id='heart'><label for='heart'>Path of Peace &
            Love</label><br>
        <br>
        <button type='submit'>Select your path and roll your die (or just die)!</button>
    </form>

    <?php if($battlestarted) { ?>

    <h2>The Battle Begins!</h2>

    <ul>
        <li>A dragon approaches from the distance and you begin to ready your spells!</li>
        <li>Your path has a base power of <?php echo $pathpower; ?> and you rolled <?php echo $dicerollplayer; ?>!</li>
        <li>It's finally near enough that you can tell it is a <?php echo $dragontype; ?>
            approaching. It has a <?php echo $dragonattack; ?>
            attack!</li>
        <li>The crafty dragon has most certainly cheated and rolled a <?php echo $dicerolldragon; ?> to add to
            its
            already powerful
            <?php echo $dragonap; ?>
            attack points.
        </li>
        <li>You gave it your best with your <?php echo $wizardattack; ?> attack.</li>

        <h3>After that ferocious battle...</h3>

        <li>
            <?php if ($playeroutcome == 'lose') { ?>
            You lose!! Study your magic more.
            <?php } elseif ($playeroutcome == 'win') { ?>
            You win!! Your surprisingly good luck has let you live to see another day.
            <?php } else { ?>
            You tied. I didn't really know you could do that. Good luck with your new dragon best friend; you are
            equals.
            <?php } ?>

    </ul>
    <h3>Refresh your page to battle again!</h3>
    <?php } ?>
    </p>
</body>

</html>