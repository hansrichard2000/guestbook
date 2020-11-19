@extends('layouts.app')
@section('content')
    <h1>List Event</h1>
    @auth
    <form method="GET" action="{{route('event.create')}}">
    <button class="btn btn-primary float-right mt-n5 mr-lg-5" href="{{route('event.create')}}">
            Tambah
    </button>
    </form>

    <form method="POST" action="{{route('event.create')}}">
        <button id="del" class="btn btn-danger mt-n5 float-right" href="delete.php">
            Hapus
        </button>
    </form>
    @endauth
    <hr>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Judul</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Tanggal Acara</th>
            <th scope="col">Owned by</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td><a href="@auth{{route('event.edit', $event)}}@endauth">{{$event->title}}</a></td>
                <td>{{$event->description}}</td>
                <td>{{$event->event_date}}</td>
                <td>{{$event->creator->name}}</td>
                <td>{{$event->created_at}}</td>
                <td>{{$event->updated_at}}</td>
                @auth
                <td>
                    <form action="{{route('event.destroy', $event)}}" method="post">
                    @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                   </form>
                </td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection




