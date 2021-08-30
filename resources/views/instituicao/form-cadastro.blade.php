@extends('_layout.layout_base')


@section('content')

<div class="form-flex inst">
    <div>
        <h2>Possui uma instituição e quer fazer parte do nosso projeto? </h2>
        <form action="/instituicao-cadastro" method="post">
            @csrf
            <div class="input-div">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">
                <div>
                    <span class="alerta-erro-span">@error('nome'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="input-div">
                <label for="nome">Cnpj:</label>
                <input type="text" name="cnpj" id="">
                <div>
                    <span class="alerta-erro-span">@error('cnpj'){{ $message }}@enderror</span>
                </div>
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <div>
                    <textarea name="descricao" id="" cols="30" rows="10" class="input-div"></textarea>
                </div>
                <div>
                    <span class="alerta-erro-span">@error('descricao'){{ $message }}@enderror</span>
                </div>
            </div>
            
            <input type="submit" value="Cadastrar" class="btn btn-principal">
        </form>
    </div>
</div>

@endsection

