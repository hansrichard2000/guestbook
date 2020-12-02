@extends('layouts.usernav')

@section('content')
    <h1 class="text-center mt-1 mb-1">Ongoing Event</h1>
    <br>
    <div class="card w-75 align-content-center shadow p-5 mb-5 bg-white rounded" style="margin-left: 10%">
        @foreach($events as $event)
            <div class="row row-cols-2 mt-3 mb-3">
                <div class="col" >
                    <img src="/images/images.jpg">
                </div>
                <div class="col" style="margin-left: -7rem">
                    <ul type="none">
                        <li><strong>{{$event->title}}</strong></li>
                        <li>{{$event->event_date}}</li>
                        <li>{{$event->creator->name}}</li>
                        <br>
                        @auth
                        <li>
                            <form method="" action="">
                                <button class="btn btn-primary">
                                    Request to join
                                </button>
                            </form>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        @endforeach
    </div>

@endsection
