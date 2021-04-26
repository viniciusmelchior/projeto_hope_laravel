@extends('_layout.layout_base')


@section('content')

<div class="form-flex editar">
    <div>
        <h1>Editar Perfil</h1>
        <form action="{{route('salvarEdicao')}}" method="POST" enctype="multipart/form-data">
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
        
            <div>
                <div class="input-div">
                    <label for="image_profile">Alterar foto do Perfil</label>
                </div>
                <input type="file" name="image_profile" id="usuario-imagem" class="input-div">
            </div>
            <div class="input-div">
                <label for="nome">Nome</label>
                <input type="text" name="name" id="usuario-nome" value="{{ $LoggedUserInfo->name }}">
                <div class="alerta-erro-span">
                    <span>@error('name'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="input-div">
                <label for="nome">Email</label>
                <input type="email" name="email" id="usuario-email" value="{{ $LoggedUserInfo->email }}">
                <div class="alerta-erro-span">
                    <span>@error('email'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="input-div">
                <label for="nome">Idade</label>
                <input type="number" name="age" id="usuario-idade" min="18" max="130" value="{{ $LoggedUserInfo->age }}">
                <div class="alerta-erro-span">
                    <span>@error('age'){{ $message }}@enderror</span>
                </div>
            </div>
            <input type="submit" value="Confirmar" class="btn btn-principal">
        </form>
    </div>
</div>

@endsection
