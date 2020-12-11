@extends('templates.master')

@section('title')
Battle Details

@endsection

@section('content')
<br>
<br>
<div class='instructions'>
    <b>
        <h2>Battle Details</h2>
    </b>
    <br>
    <br>
    Player Path: {{ $battle['playerpath'] }} <br>
    Player Combined Attack Power: {{ $battle['playerroll'] }} <br>
    Dragon Battled: {{ $battle['dragon'] }} <br>
    Dragon Combined Attack Power: {{ $battle['dragonattack'] }} <br>
    Player Outcome: {{ $battle['outcome'] }} <br>
    Time: {{ $battle['time'] }} <br>
</div>

@endsection