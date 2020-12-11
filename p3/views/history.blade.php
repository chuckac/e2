@extends('templates.master')

@section('title')
Round History

@endsection

@section('content')

<h2>Game History</h2>

<div class='instructions'>
    @foreach($battles as $battle)
    <a href='/battles?id={{ $battle['id'] }}'>{{ $battle['time'] }}
        <br>
        @endforeach
</div>
@endsection