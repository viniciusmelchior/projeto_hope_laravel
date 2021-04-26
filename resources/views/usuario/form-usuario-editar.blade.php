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
        <label for="image_profile">alterar foto do Perfil</label>
        <input type="file" name="image_profile" id="usuario-imagem">
    </div>
    <div>
        <label for="nome">Nome</label>
        <input type="text" name="name" id="usuario-nome" value="{{ $LoggedUserInfo->name }}">
        <span>@error('name'){{ $message }}@enderror</span>
    </div>
    <div>
        <label for="nome">Email</label>
        <input type="email" name="email" id="usuario-email" value="{{ $LoggedUserInfo->email }}">
        <span>@error('email'){{ $message }}@enderror</span>
    </div>
    <div>
        <label for="nome">Idade</label>
        <input type="number" name="age" id="usuario-idade" min="18" max="130" value="{{ $LoggedUserInfo->age }}">
        <span>@error('age'){{ $message }}@enderror</span>
    </div>
    <input type="submit" value="Confirmar Alterações">
</form>