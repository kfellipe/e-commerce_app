<?php

if(isset($_SESSION['logado'])){
    echo "
    <header>
    <div class='container-logo'><h1><a href='../home'>Logo</a></h1></div>
    <div class='container-site' style='cursor: default;'><h1>".$_SESSION['site']."</h1></div>
    <div class='container-dropdown'>
    <div class='menu' id='perfil'>".$_SESSION['logado']." 
    <div class='arrow'> <img src='../../Viewer/img/rightArrow.png' width='15px' height='15px' alt='testando'> </div>
    </div>
        <form action='../Controller/Router.php' method='POST' class='container-form_dropdown'>
            <input type='submit' value='Perfil' name='meu-perfil' class='menu'>
            <input type='submit' value='Home' name='home' class='menu'>
            <input type='submit' value='Meus Anuncios' name='meus-anuncios' class='menu'>
            <input type='submit' value='Logout' name='logout' class='menu'>
        </form>
    </div>
</header>";
} else {
    $site = $_SESSION['site'];
    echo "<header>
    <div class='container-logo'><h1><a href='../home'>Logo</a></h1></div>
    <div class='container-site' style='cursor: default;'><h1>".$site."</h1></div>
    <div class='container-dropdown'>
        <form action='../Controller/Router.php' method='POST'>
            <input type='submit' name='login' value='Logar' class='menu'>
            <input type='submit' name='register' value='Registrar' class='menu'>
        </form>
    </div>
</header>";
}