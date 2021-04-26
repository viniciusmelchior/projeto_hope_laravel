<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Instituições</title>
</head>
<body>
    <form action="/instituicao-cadastro" method="post">
        @csrf
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">
        </div>
        <div>
            <label for="nome">Cnpj:</label>
            <input type="text" name="cnpj" id="">
        </div>
        <div>
            <label for="descricao">Cnpj:</label>
            <textarea name="descricao" id="" cols="30" rows="10"></textarea>
        </div>
        
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>