<html>
    <head>
        <title>Welcome Aboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{!! asset('/css/style.css') !!}">
    </head>
    <body class="container mt-5">
        <h1>List Event</h1>
        <form method="GET" action="{{route('student.create')}}">
        <button class="btn btn-primary float-right mt-n5 mr-lg-5" href="{{route('event.create')}}">
                Tambah
            </button>
        </form>

        {{-- <form method="POST" action="{{route('event.create')}}">
            <button id="del" class="btn btn-danger mt-n5 float-right" href="delete.php">
                Hapus
            </button>
        </form> --}}
        <hr>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tanggal Acara</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                <td><a href="{{route('student.edit', $student)}}">{{$student->name}}</a></td>
                    <td>{{$student->nim}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->created_at}}</td>
                    <td>{{$student->updated_at}}</td>
                    <td>
                    <form action="{{route('student.destroy', $student)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
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
