<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar novo usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Adicionar novo usuario
                @if (Session::has('fail'))
                    <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
                @endif
                <a href="/add/user" class="btn btn-success btn-sm float-end ">Cadastrar usuario</a>
            </div>
            <div class="card-body">
                <form action="{{route('AddUser')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nome Completo</label>
                        <input type="text" name="nome_completo" class="form-control" id="formGroupExampleInput" placeholder="Dogote seu nome completo">
                        @error('nome_completo')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Digite seu melhor email">
                      @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Celular</label>
                        <input type="text" name="celular" class="form-control" placeholder="Digite seu celular">
                      @error('celular')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control" placeholder="Digite sua senha">
                      @error('senha')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Confirmar Senha</label>
                        <input type="password" name="confirma_senha" class="form-control" placeholder="Confirme a sua senha">
                      {{-- @error('confirma_senha')
                            <span class="text-danger">{{$message}}</span>
                        @enderror --}}
                    </div>

                    <button class="btn btn-primary" type="submit">Salvar</button>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
