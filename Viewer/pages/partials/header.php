<?php

if(isset($_COOKIE['logado'])){
    echo "
    <script>
    let meuperfil = 'meu-perfil';
    let Home = 'home';
    let meusanuncios = 'meus-anuncios';
    </script>
    <header>
    <div class='container-logo'><h1><a href='../home'>Logo</a></h1></div>
    <div class='container-site' style='cursor: default;'><h1>".$_SESSION['site']."</h1></div>
    <div class='container-dropdown'>
    <div class='menu' id='perfil'><ul><li>".$_COOKIE['logado']."</li><li><span style='font-size: 10pt'>R$ ".mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Credits']."</span></li></ul> 
    
    </div>
        <form action='../Controller/Router.php' method='POST' class='container-form_dropdown'>
            <button type='button' onclick='header(meuperfil)' name='meu-perfil' class='menu'>Perfil</button>
            <button type='button' onclick='header(Home)' name='home' class='menu'>Home</button>
            <input type='submit' value='Logout' name='submit' class='menu'>
        </form>
    </div>
</header>";
} else {
    $site = $_SESSION['site'];
    echo "
    <script>
    let login = 'login';
    let register = 'cadastrar-usuario';
    </script>
    <header>
    <div class='container-logo'><h1><a href='../home'>Logo</a></h1></div>
    <div class='container-site' style='cursor: default;'><h1>".$site."</h1></div>
    <div class='container-dropdown'>
        <div>
            <input type='submit' onclick='header(login)' value='Logar' class='menu'>
            <input type='submit' onclick='header(register)' value='Registrar' class='menu'>
        </div>
    </div>
</header>";
}