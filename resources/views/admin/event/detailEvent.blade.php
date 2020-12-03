@extends('layouts.app')

@section('content')
    <h1>Detail Event</h1>
    <hr>
    <ul type="none">
        <li>Title : {{$event->title}}</li>
        <li>Description : {{$event->description}}</li>
        <li>Created by : {{$event->creator->name}}</li>
        <li>Total Attendee : {{$event->noa}}</li>
        <li>Event Date : {{$event->event_date}}</li>
        <li> @if($event->status == 0)
                <p class="text-danger">Close</p>
             @elseif($event->status == 1)
                <p class="text-success">Open</p>
             @endif
        </li>
    </ul>
    <br>
    <div class="row no-gutters">
        <div class="col md-10">
            <h1 class="h3 mb-0 font-weight-bold" style="margin-top: 0.2em;">Attendant List</h1>
        </div>
        <div class="col md-2">
            <button type="button" class="btn btn-dark btn-circle float-right" title="Add guest to this event"
                    data-toggle="modal"
                    data-target="#addGuest">Tambah</button>
            @include('admin.event.addGuest')
        </div>
    </div>
    <hr>
    <div class="table-responsive">
        @if(count($event->guests)>0)
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr class="text-center">
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
                <tbody>
                @foreach($event->guests as $guest)
                    <tr class="text-center">
                        <td>{{$guest->id}}</td>
                        <td>{{$guest->name}}</td>
                        <td>{{$guest->email}}</td>
                        <td>
                            @if($guest->pivot->is_approved == 0) <p class="text-warning">Pending</p>
                            @elseif($guest->pivot->is_approved == 1) <p class="text-success">Approved</p>
                            @else <p class="text-danger">Rejected</p>
                            @endif
                        </td>
                        <td width="150px">
                            <div class="row no-gutters">
                                @if($guest->pivot->is_approved == 0)
                                    <div class="col-md-6">
                                        <form action="{{route('admin.guest.approve', $guest->id)}}"
                                              method="POST">
                                            {{ csrf_field() }}
                                            <input name="event_id" type="hidden" value="{{$event->id}}">
                                            <button class="btn btn-success btn-circle text-light" title="Approve" type="submit">V</button>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{route('admin.guest.decline', $guest->id)}}"
                                              method="POST">
                                            {{ csrf_field() }}
                                            <input name="event_id" type="hidden" value="{{$event->id}}">
                                            <button class="btn btn-danger btn-circle text-light" title="Reject" type="submit">X</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
