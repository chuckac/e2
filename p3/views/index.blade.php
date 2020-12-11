@extends('templates.master')

@section('title')
Dragon Battle

@endsection

@section('content')

<br>
<br>
<div class='instructions'>
    <p>
        You' re an obnxious, intermediate-level wizard.
        <br>
        <br>
        It's time in your training to choose your power.
        When you've decided on the path you will take, <em>click submit</em> to roll your 20-sided die to battle the
        dragon.
        <br>
        <br>
        You were pretty much the worst student. You forgot to note the base power that each path holds, which is too bad
        for you it seems. That dragon really doesn't care and is going to attack!
        <br>
        <br>
        It's a new dragon every time: Blue, Black, Red, Grey, Fushsia, or Gold.
        Some of them are stronger than others, so I hope you roll a high enough power bonus to beat them!
        Luckily, as an obnoxious wizard, you can resurrect every time and keep battling by clicking refresh.
    </p>


    <br>

    <p><b>Good luck!</b> Uh oh....Sneak attack! The dragon has its own 20-sided die to add to its already
        powerful nature!</p>

    <br>


    <h2>Are you ready to battle your dragon?</h2>
    <br>
    <h3>Choose your path...<h3>

            <br>
</div>
<form method='POST' action='/play' class='form'>
    <input type='radio' name='pathchoice' value='ice' id='ice'><label for='ice'>Path of Cold Ice</label><br>
    <input type='radio' name='pathchoice' value='fire' id='fire'><label for='fire'>Path of Toasty
        Fire</label><br>
    <input type='radio' name='pathchoice' value='wind' id='wind'><label for='wind'>Path of the Gentle
        Breeze</label><br>
    <input type='radio' name='pathchoice' value='water' id='water'><label for='water'>Path of the Water
        Droplet</label><br>
    <input type='radio' name='pathchoice' value='heart' id='heart'><label for='heart'>Path of Peace &
        Love</label><br>
    <br>
    <button type='submit'>Select your path and roll your die (or just die)!</button>
    <br>
    <br>
    @if($app->errorsExist())
    <ul class='error alert alert-danger'>
        @foreach($app->errors() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
</form>

<div class='results'>
    @if($results)

    <p> The battle commenced and here is what happened...</p>
    <br>
    <br>
    <p>A {{ $results['dragon'] }} approaches from the distance and you begin to ready your spells!
        <br>
        <br>
        You attack with a {{ $results['playerattacktype'] }}, which when combined with your dice roll, hits for
        {{ $results['playerroll']}} attack points!
        <br>
        <br>
        You sense impending doom and hope luck favors you today, as the {{ $results['dragon'] }} bends the elements to
        its
        will and hits you with a {{ $results['dragonpowertype'] }} attack with {{ $results['dragonattack'] }} attack
        points!

        <br>
        <br>

        @if ($results['outcome'] = 'win')
        Well, well, well, look at what you were able to vanquish today. <b>Congratulations</b> on living to see another
        day!
        @elseif ($results['outcome'] = 'lose')
        Soooo... I think that you should have studied harder. Better luck in your next life.
        @else
        You tied. Either that's an exceptionally weak dragon, or you're just stupidly lucky. Go forth with your new
        dragon
        friend and conquer!
        @endif

        @endif
</div>
<br>
<br>
<b><a href='/history'>Game History</a></b>
<br>
<br>

@endsection