<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravekl 11 Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Laravel 11 CRUD Sistema
                <a href="/add/user" class="btn btn-success btn-sm float-end ">Cadastrar usuario</a>
            </div>
            @if (Session::has('success'))
                <span class="alert alert-success p-2">{{ Session::get('success') }}</span>
            @endif
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Data de Registro</th>
                        <th>Ultima atualização</th>
                        <th colspan="2">Ações</th>
                    </thead>
                    <tbody>
                        @if (count($all_users) > 0)
                            @foreach ($all_users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nome_completo }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->celular }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="/edit/{{$item->id}}" class="btn btn-primary btn-sm">Editar</a>
                                        <a href="/delete/{{$item->id}}" class="btn btn-danger btn-sm">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
