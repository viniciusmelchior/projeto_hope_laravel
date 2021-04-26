@extends('_layout.layout_base')

@section('content')
<div class="tela-registro">
    <form action="{{route('registra-usuario')}}" method="POST">
        @csrf

        <div>
            @if (Session::get('success'))
                <div>
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::get('fail'))
            <div>
                {{ Session::get('fail') }}
            </div>
        @endif
        </div>

        <div class="tela-registro-boas-vindas">
            <p>Para contribuir com o Projeto Hope preencha os dados abaixo e visite o seu painel administrativo</p>
        </div>

        <div class="input-div">
            <label for="nome">Nome</label>
            <input type="text" name="name" id="usuario-nome" value="{{old('name')}}">
            <div>
                <span class="alerta-erro-span">@error('name'){{ $message }}@enderror</span>
            </div>
            
        </div>
        <div class="input-div">
            <label for="nome">Email</label>
            <input type="email" name="email" id="usuario-email" value="{{old('email')}}">
            <div>
                <span class="alerta-erro-span">@error('email'){{ $message }}@enderror</span>
            </div>
        </div>
        <div class="input-div">
            <label for="nome">Senha</label>
            <input type="password" name="password" id="usuario-senha">
            <div>
                <span class="alerta-erro-span">@error('password'){{ $message }}@enderror</span>
            </div>
        </div>
        <div class="input-div">
            <label for="nome">Idade</label>
            <input type="number" name="age" id="usuario-idade" min="18" max="130" value="{{old('age')}}">
            <div>
                <span class="alerta-erro-span">@error('age'){{ $message }}@enderror</span>
            </div>
        </div>
        <div class="input-div">
            <label for="cpf">cpf</label>
            <input type="text" name="cpf" id="input-cpf" value="{{old('cpf')}}">
            <div>
                <span class="alerta-erro-span">@error('cpf'){{ $message }}@enderror</span>
            </div>
        </div>
        <input type="submit" value="Confirmar" class="btn-principal">
    </form>
</div>
@endsection