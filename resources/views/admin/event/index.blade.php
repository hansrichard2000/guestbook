@extends('layouts.app')
@section('content')
    <h1>List Event</h1>
    @auth
        @if(\illuminate\Support\Facades\Auth::user()->isAdmin() || \illuminate\Support\Facades\Auth::user()->isCreator())
            <form method="GET" action="{{route('admin.event.create')}}">
            <button class="btn btn-primary float-right mt-n5 mr-lg-5" href="{{route('admin.event.create')}}">
                    Tambah
            </button>
            </form>
        @endif
    @endauth
    <hr>
    <table class="table table-striped">
        <thead class="thead-dark text-center">
        <tr>
            <th scope="col">Event Id</th>
            <th scope="col">Judul</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Tanggal Acara</th>
            <th scope="col">Created by</th>
            <th scope="col">Total Attendant</th>
            <th scope="col">Event Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td><a href="@auth{{route('admin.event.show', $event->id)}}@endauth">{{$event->title}}</a></td>
                <td>{{$event->description}}</td>
                <td>{{$event->event_date}}</td>
                <td>{{$event->creator->name}}</td>
                <td>{{$event->noa}}</td>
                <td>
                    @if($event->status == 0)
                        <p class="text-danger">Close</p>
                    @elseif($event->status == 1)
                        <p class="text-success">Open</p>
                    @endif
                </td>
                @auth
                    @if(\illuminate\Support\Facades\Auth::user()->isAdmin() || \illuminate\Support\Facades\Auth::user()->isCreator())
                        <td>
                            <div class="col">
                                <form action="{{route('admin.event.edit', $event)}}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </div>
                            <div class="col">
                                <form action="{{route('admin.event.destroy', $event)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    @endif
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection




