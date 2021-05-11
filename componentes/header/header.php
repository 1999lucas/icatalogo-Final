<link href="/web-backend/icatalogo-parte1/componentes/header/header.css" rel="stylesheet" />
<header class="header">
    <figure>
        <img src="/web-backend/icatalogo-parte1/imgs/logo.png"" />
    </figure>
    <input type="search" placeholder="Pesquisar" />
    <nav>
        <ul>
            <a id="menu-admin">Administrar</a>
        </ul>
    </nav>
    <div class="container-login" id="container-login">
        <h1>Fazer Login</h1>
        <form method="POST" action="../componentes/header/acoesLogin.php">
            <input type="text" name="usuario" placeholder="Usuário" />
            <input type="password" name="senha" placeholder="Senha" />
            <button type="submit" value="enviar" name="enviar">Entrar</button>
            <div id="erro">ERRO: Usuário ou senha inválidos.</div>
        </form>
    </div>
</header>

<script lang="javascript">
document.querySelector("#menu-admin").addEventListener("click", toggleLogin);
function toggleLogin(){
    let containerLogin = document.querySelector("#container-login");
    if(containerLogin.style.opacity == 0) {
        containerLogin.style.opacity = 1;
        containerLogin.style.height = "200px";
    }else{
        containerLogin.style.opacity = 0;
        containerLogin.style.height = "0px";
    }
}

</script>