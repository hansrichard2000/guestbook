@extends('layouts.html')

@section('judul')
    Edit Data
@endsection

@section('isi')
<h2>Edit Data</h2>
<form action="{{route('event.update', $event)}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="form-group">
        <label for="title">Title :</label>
    <input type="text" value="{{$event->title}}" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="description">Description :</label>
        <input type="text" value="{{$event->description}}" class="form-control" id="description" name="description">
    </div>
    <div class="form-group">
        <label for="event_date">Event Date : </label>
        <input type="date" value="{{$event->event_date}}" class="form-control" id="event_date" name="event_date">
    </div>
    <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Submit">
</form>
<footer>
    Copyleft 2020 Hans Richard Alim Natadjaja
</footer>
@endsection
