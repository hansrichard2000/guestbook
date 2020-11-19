@extends('layouts.html')

@section('judul')
    Tambah Student
@endsection

@section('isi')
<h2>Masukkan Student</h2>
<form action="{{route('student.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name :</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="nim">Nim :</label>
        <input type="text" class="form-control" id="nim" name="nim" required>
    </div>
    <div class="form-group">
        <label for="email">Email : </label>
        <input type="text" class="form-control" id="email" name="email" required>
    </div>
    <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Submit">
</form>
<footer>
    Copyleft 2020 Hans Richard Alim Natadjaja
</footer>
@endsection
