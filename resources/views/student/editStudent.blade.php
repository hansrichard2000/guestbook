@extends('layouts.html')

@section('judul')
    Edit Student
@endsection

@section('isi')
<h2>Edit Student</h2>
<form action="{{route('student.update', $student)}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="form-group">
        <label for="name">Name :</label>
    <input type="text" value="{{$student->name}}" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="nim">Nim :</label>
        <input type="text" value="{{$student->nim}}" class="form-control" id="nim" name="nim" required>
    </div>
    <div class="form-group">
        <label for="email">Email : </label>
        <input type="text" value="{{$student->email}}" class="form-control" id="email" name="email" required>
    </div>
    <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Submit">
</form>
<footer>
    Copyleft 2020 Hans Richard Alim Natadjaja
</footer>
@endsection
