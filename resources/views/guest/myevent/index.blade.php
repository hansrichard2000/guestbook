@extends('layouts.usernav')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>My Event Application</h2>
            @auth
                <form method="GET" action="{{route('event.create')}}">
                    <button class="btn btn-primary float-right mt-n5 mr-lg-5" href="{{route('event.create')}}">
                        Tambah
                    </button>
                </form>
            @endauth
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Event Id</th>
                    <th scope="col">Event Title</th>
                    <th scope="col">Event Description</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Application status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
{{--                <tbody>--}}
{{--                @foreach ($events as $event)--}}
{{--                    <tr>--}}
{{--                        <td><a href="@auth/event/{{$event->id}}@endauth">{{$event->title}}</a></td>--}}
{{--                        <td>{{$event->description}}</td>--}}
{{--                        <td>{{$event->event_date}}</td>--}}
{{--                        <td>{{$event->creator->name}}</td>--}}
{{--                        <td>{{$event->created_at}}</td>--}}
{{--                        <td>{{$event->updated_at}}</td>--}}
{{--                        @auth--}}
{{--                            <td>--}}
{{--                                <div class="col">--}}
{{--                                    <form action="{{route('event.destroy', $event)}}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="_method" value="DELETE">--}}
{{--                                        <button type="submit" class="btn btn-danger">Hapus</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        @endauth--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
            </table>
        </div>
    </div>
@endsection
