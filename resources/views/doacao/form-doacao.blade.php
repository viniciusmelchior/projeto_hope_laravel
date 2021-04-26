<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doação</title>
</head>
<body>
    <form action="{{route('doar')}}" method="post">
        @csrf
        <div>
            <label for="instituicao"></label>
            <select name="instituicao" id="">
                @foreach ($instituicoes as $instituicao )
                    <option value="{{$instituicao->id}}">{{$instituicao->nome}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="valor">Valor da Doação</label>
            <input type="number" name="valor" id="">
        </div>
        <div>
            <input type="submit" value="Confirmar Doação">
        </div>
    </form>
</body>
</html>