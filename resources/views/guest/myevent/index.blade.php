@extends('layouts.usernav')

@section('content')
    <div class="card">
        <div class="card-header py-3">
            <div class="row no-gutters">
                <div class="col md-10">
                    <h1 class="h3 mb-0 font-weight-bold" style="margin-top: 0.2em;">My Event Application</h1>
                </div>
                <div class="col md-2">
                    <button type="button" class="btn btn-dark btn-circle float-right" title="Create New Event" data-toggle="modal"
                            data-target="#addmodal">Tambah</button>
                    @include('guest.myevent.create')
                </div>
            </div>
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
                <tbody>
                @foreach ($attends as $event)
                    <tr class="text-center">
                        <td>{{$event->id}}</td>
                        <td>{{$event->title}}</td>
                        <td><a type="button" class="text-primary" data-toggle="modal"
                               data-target="#showModal-{{$event->id}}">Read</a></td>
                        @include('guest.myevent.showDesc')
                        <td>{{$event->event_date}}</td>
                        <td>
                            @if($event->pivot->is_approved == 0) <p class="text-warning">Pending</p>
                            @elseif($event->pivot->is_approved == 1) <p class="text-success">Approved</p>
                            @else<p class="text-danger">Rejected</p>
                            @endif
                        </td>
                        <td width="150px">
                            <div class="row no-gutters">
                                <div class="col-md-12">
                                    <form action="{{route('user.myevent.destroy', $event->id)}}" method="POST">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn-circle"
                                                title="Withdrawal from application"
                                                type="submit"
                                                @if($event->pivot->is_approved != 0) disabled @endif>
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
