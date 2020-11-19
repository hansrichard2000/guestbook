@extends('layouts.html')

@section('judul')
    Tambah Data
@endsection

@section('isi')
<h2>Masukkan Data</h2>
<form action="{{route('event.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title :</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="description">Description :</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="form-group">
        <select name="created_by" class="custom-select">
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name."(". $user->email . ')'}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="event_date">Event Date : </label>
        <input type="date" class="form-control" id="event_date" name="event_date">
    </div>
    <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Submit">
</form>
<footer>
    Copyleft 2020 Hans Richard Alim Natadjaja
</footer>
@endsection
