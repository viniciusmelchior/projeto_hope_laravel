<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Minhas Doações</title>
</head>
<body>
    <div class="container">
       <div class="p-5 bg-light">
            <h1 class="text-center">Minhas Doações</h1>
       </div>

       <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Instituição De Destino</th>
            <th scope="col">Valor</th>
            <th scope="col">Data/Horário</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($doacoes as $doacao )
          <tr>
            <td>{{$doacao->instituicoes->nome}}</td>
            <td>R$ {{$doacao->valor}}</td>
            <td>{{$doacao->created_at}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <a href="{{route('usuario-painel')}}" class="btn btn-dark">Voltar</a>
    </div>
</body>
</html>