<html>
    <head>
        <title>Welcome Aboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{!! asset('/css/style.css') !!}">
    </head>
    <body class="container mt-5">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <a class="navbar-brand" href="/">Hans EO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link" href="/event">Event List <span class="sr-only">(current)</span></a>
                <a class="nav-link active" href="/user">User List</a>
                <a class="nav-link" href="#">Pricing</a>
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </div>
            </div>
          </nav>
        <br>
        <h1>List Users</h1>
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
        <hr>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Event List</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach ($user->events as $event)
                        {{ $event->title }}
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <footer>
            Copyleft 2020 Hans Richard Alim Natadjaja
        </footer>
    </body>
</html>
