@extends('_layout.layout_base')

@section('content')
<main class="main-doe-ja">  
    <div class="tela-cadastro-login">
        <div>
            <h3>Já possui conta?</h3>
            <form action="/login" method="post">
                @csrf

                <div class="alerta-erro">
                    @if (Session::get('fail'))
                        <div>
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                </div>

                 <div class="input-div">
                     <input type="email" name="email" id="input-email" placeholder="Digite seu email" value="{{old('email')}}">
                     <div>
                        <span class="alerta-erro-span">@error('email') {{ $message }}@enderror</span>
                     </div>
                 </div>

                 <div class="input-div">
                    <input type="password" name="password" id="input-password" placeholder="Digite sua senha">
                    <div>
                        <span class="alerta-erro-span">@error('password') {{ $message }}@enderror</span>
                    </div>
                 </div>

                 <div>
                 <input type="submit" value="Login" class="btn-principal">
                 </div>
            </form>
        </div>
        <hr>
        <div>
            <h3>Não possui conta?</h3>
            <a href="/form-usuario-cadastro">Registre-se agora</a>
        </div>
    </div>      
    <div class="container1">
        <div>
            <img src="imagens/fmpg.jpeg">
        </div>
        <div>
            <img src="imagens/fmpg1.png">
        </div>
        <div>
            <img src="imagens/fmpg2.png">
        </div>
        <div>
            <img src="imagens/fmpg4.png">
        </div>
    </div>
</main>

@endsection