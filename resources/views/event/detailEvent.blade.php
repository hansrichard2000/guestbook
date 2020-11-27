@extends('layouts.app')

@section('content')
    <h1>Detail Event</h1>
    <hr>
    <ul type="none">
        <li>Title : {{$events->title}}</li>
        <li>Description : {{$events->description}}</li>
        <li>Created by : {{$events->creator->name}}</li>
        <li>Total Attendee : {{$events->noa}}</li>
        <li>Event Date : {{$events->event_date}}</li>
        <li> @if($events->status == 0)
                <p class="text-danger">Close</p>
             @elseif($events->status == 1)
                <p class="text-success">Open</p>
             @endif
        </li>
    </ul>
    <br>
    <h1>Attendee List</h1>
    <hr>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">
                Id
            </th>
            <th scope="col">
                Guest Name
            </th>
            <th scope="col">
                Guest Email
            </th>
            <th scope="col">
                Status
            </th>
            <th scope="col">
                Action
            </th>
        </tr>
        </thead>
{{--        <tbody>--}}
{{--            @foreach($users as $user)--}}
{{--            <tr>--}}
{{--                --}}
{{--            </tr>--}}
{{--        </tbody>--}}
    </table>
@endsection
