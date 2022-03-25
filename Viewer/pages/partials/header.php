<?php

if(isset($_COOKIE['logado'])){
    echo "
    <script>
    let meu_perfil = 'meu-perfil';
    let home = 'home';
    let meus_anuncios = 'meus-anuncios';
    </script>
    <header>
    <div class='container-logo'><h1><a href='../home'>Logo</a></h1></div>
    <div class='container-site' style='cursor: default;'><h1>".$_SESSION['site']."</h1></div>
    <div class='container-dropdown'>
    <div class='menu' id='perfil'><ul><li>".$_COOKIE['logado']."</li><li><span style='font-size: 10pt'>R$ ".mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Credits']."</span></li></ul> 
    
    </div>
        <form action='../Controller/Router.php' method='POST' class='container-form_dropdown'>
            <input type='submit' onclick='header(meu_perfil)' value='Perfil' name='meu-perfil' class='menu'>
            <button type='button' onclick='header(home)' name='home' class='menu'>Home</button>
            <button type='butotn' onclick='header(meus_anuncios)' name='meus-anuncios' class='menu'>Meus Anuncios</button>
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