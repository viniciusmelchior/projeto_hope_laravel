<h1 style="text-align: center;">Painel Administrativo</h1>
<hr>

<div>
    <h3>Usuários</h3>
    @foreach ($users as $user )
        <p>{{$user->id}}- {{$user->name}}</p>
    @endforeach
    <hr>
</div>
<div>
    <h3>Instituições</h3>
    @foreach ($instituicoes as $instituicao )
        <p>{{$instituicao->id}}- {{$instituicao->nome}}</p>
    @endforeach
    <hr>
</div>
<div>
    Doações
    @foreach ($doacoes as $doacao )
        <p>{{$doacao->id}}, {{$doacao->instituicoes->nome}}</p>
    @endforeach
    <hr>
</div>