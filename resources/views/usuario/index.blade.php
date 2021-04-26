<!--<h1>Olá</h1>-->
{{-- <h1>Olá, {{ $LoggedUserInfo->name }}, seja bem vindo ao painel</h1> --}}

{{-- <div>
    <div>
        @if ($LoggedUserInfo->image_path != '')
            <img src="{{ asset('images/'.$LoggedUserInfo->image_path)}}" alt="" class="rounded-circle" width="150">
        @else
        <img src="{{ asset('images/sem-imagem.png')}}" alt="" style="width: 120px; height: 120px">
        @endif 
    </div>  
</div>
<div>
    <p>nome: {{ $LoggedUserInfo->name }} </p>
</div>
<div>
    <p>idade: {{ $LoggedUserInfo->age }}</p>
</div>
<div>
    <p>email: {{ $LoggedUserInfo->email }}</p>
</div>
<div>
    <p>saldo: R$ {{ $LoggedUserInfo->saldo }} </p>
</div>
<div>
    <p>total doado: #em construção# </p>
</div>
<div>
    <a href="">Minhas Doações</a>
</div>


<div>
    <h3>Fazer Doação</h3>
   <form action="">
       <div>
            <label for="valor">Valor da Doação</label>
            <input type="number" name="valor_doacao" id="input_doacao">
       </div>
       <div>
            <label for="instituicao">Instituição de Destino</label>
            <select name="instituicao" id="input_instituicao">
                <option value="1">Instituição A</option>
                <option value="2">Instituição B</option>
                <option value="3">Instituição C</option>
                <option value="4">Instituição D</option>
            </select>
       </div>
       <div>
        <input type="submit" value="Doar">
       </div>
   </form>
</div>


<div>
   <a href="/logout">logout</a>
</div>
<div>
    <a href="/">Home</a>
</div>
<div>
    <a href="/usuario-deletar">Deletar Conta</a>
</div> --}}

<!--ARQUIVO FINAL EDITADO-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('perfil/perfil.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="perfil.css">
    <title>Perfil {{ $LoggedUserInfo->name }}</title>
</head>
<body>
    <div class="topbar">
        <div class="container">
            <div>
                <a href="/logout">Logout</a>
                <a href="/">Home</a>
            </div> 
        </div>
    </div>
    <div class="container">
        <div class="main">
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="card-text-center sidebar">
                        <div class="card-body">
                            @if ($LoggedUserInfo->image_path != '')
                            <img src="{{ asset('images/'.$LoggedUserInfo->image_path)}}" alt="" class="rounded-circle" width="150">
                        @else
                            <img src="{{ asset('images/sem-imagem.png')}}" alt="" class="rounded-circle" width="150">
                        @endif 
                            <div class="mt-3">
                                <h3>{{ $LoggedUserInfo->name }}</h3>
                                <a href="{{route('minhas-doacoes')}}">Minhas Doações</a>
                                <a href="{{route('form-doacao')}}">Doar</a>
                                <a href="{{route('instituicao-form')}}">Cadastrar Instituição</a>
                                <a href="">Deletar Conta</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-1">
                    <div class="card mb-3 content">
                        <h1 class="m-3 pt-3">Sobre</h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Nome Completo</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    {{ $LoggedUserInfo->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Email</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    {{ $LoggedUserInfo->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Total Doado</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                   R$ {{ $LoggedUserInfo->total_doado }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Saldo</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    R$ {{ $LoggedUserInfo->saldo }}
                                </div>
                            </div>
                            </div>
                            <div>
                                <a href="/form-usuario-editar" class="btn btn-primary m-3">Editar Perfil</a>
                            </div>
                        </div>
                        <div class="card mb-3 content">
                            <h1 class="m-3">Doações Recentes</h1>
                            <div class="card-body">
                                @foreach ($doacoes as $doacao )
                                <div class="row">
                                    <div class="col md-3">
                                        <h5>{{$doacao->instituicoes->nome}}</h5>
                                    </div>
                                    <div class="col md-9 text-secondary">
                                        R$ {{$doacao->valor}} |
                                        em: {{$doacao->created_at}}
                                    </div>
                                </div>   
                                @endforeach
                                <a href="{{route('minhas-doacoes')}}" class="btn btn-primary mt-2">Ver Todas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

