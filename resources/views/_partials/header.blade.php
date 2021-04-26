<header>
    <a href="/"><img class="logo" src="imagens/logo.png"></a>
    <nav id="menu">
    
        <ul>
            <li><a href="/">Home</a></li>
            @if (session()->has('LoggedUser'))
                <li><a href="/usuario-painel">Painel</a></li>
            @else
                <li><a href="/doe-ja">Doe já</a></li>
            @endif
            <li><a href="/parcerias">Parcerias</a></li>
            <li><a href="/sobre-nos">Sobre nós</a></li>
        </ul>
        <input type="text" placeholder="Buscar" id="input-busca"><hr>
    </nav>   
</header>