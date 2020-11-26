@extends('layouts.app')

@section('content')
        <h1>List Guest</h1>
        <hr>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Event List</th>
                <th scope="col">Login Status</th>
                <th scope="col">Account Status</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if($user->role_id == 3)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach ($user->events as $event)
                                {{ $event->title }}
                                @endforeach
                            </td>
                            <td>
                                @if($user->is_login == 0)
                                    <p class="text-danger">Logged Out</p>
                                @elseif($user->is_login == 1)
                                    <p class="text-success">Logged In</p>
                                @endif
                            </td>
                            <td>
                                @if($user->is_verified == 0)
                                    <p class="text-danger">Disabled</p>
                                @elseif($user->is_verified == 1)
                                    <p class="text-success">Enabled</p>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>

        </table>
        <footer>
            Copyleft 2020 Hans Richard Alim Natadjaja
        </footer>
@endsection
