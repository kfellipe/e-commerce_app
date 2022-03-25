<?php 

$_SESSION['site'] = "Meus Amigos";

include_once "$root/Model/friends.php";
include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../Viewer/css/usersCss/myfriends.css">
</head>
<body>
<?php

include_once "$root/Viewer/pages/partials/header.php";
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    echo "<div class='popup'>$message</div>";
    unset($_SESSION['message']);
}
?>
<main>
        <section class="container-friends">
            <div class="title">
                <h1>Amigos</h1>
            </div>
            <div class="content">
                <?php 
                    $idLogado = mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Id_Person'];
                    $cur = $friends->getAllFriends(mysqli_fetch_assoc($users->getUserByName($_COOKIE['logado']))['Id_Person']);
                    $fetch = mysqli_fetch_assoc($cur);
                    $num = mysqli_num_rows($cur);
                    if($num > 0){
                        do {
                            if($fetch['Id_Receiver'] == $idLogado){
                                if($fetch['Friend'] == true){
                                    echo "<table class='container-friend_profile'>
                                    <tr><th><div class='friend-img'><img width='auto' height='100%' src='../Viewer/img/user.png' alt='#' title='".mysqli_fetch_assoc($users->getUserById($fetch['Id_Sender']))['Name']."' onclick='profile(".$fetch['Id_Sender'].")'></div></th></tr>
                                    <tr><th>".mysqli_fetch_assoc($users->getUserById($fetch['Id_Sender']))['Name']."</tr></th>
                                    </table>";
                                    $amigos = true;
                                }
                            } else {
                                if($fetch['Friend'] == true){
                                    echo "<table class='container-friend_profile'>
                                    <tr><th><div class='friend-img'><img width='auto' height='100%' src='../Viewer/img/user.png' alt='#' title='".mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Name']."' onclick='profile(".$fetch['Id_Receiver'].")'></div></th></tr>
                                    <tr><th>".mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Name']."</tr></th>
                                    </table>";
                                    $amigos = true;
                                }
                            }
                        } while($fetch = mysqli_fetch_assoc($cur));
                    } else {
                        $amigos = false;
                    }
                    if($amigos == false){
                        echo "<p><ins>Nenhum amigo ainda!</ins></p>";
                    }
                
                ?>
            </div>
        </section>
        <section class="container-friends_requests">
            <div class="title">
                <h1>Solicitações pendentes</h1>
            </div>
            <div class="content">
                <div class="content-send">
                    <div class="content-title">
                        <h3><ins>Enviados</ins></h3>
                    </div>
                    <div class="content-send">
                    <?php 
                    $cur = $friends->getFriendsBySendRequest($idLogado);
                    $fetch = mysqli_fetch_assoc($cur);
                    $num = mysqli_num_rows($cur);
                    if($num > 0){
                        do {
                            echo "<form action='../Controller/Router.php' method='POST'>
                            <table class='container-friend_profile'>
                            <tr><th>
                                <div class='friend-img' style='width: 75px; height: 50px;' title='".mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Name']."'>
                                    <img src='../Viewer/img/user.png' width='auto' height='100%' alt='#' onclick='profile(".$fetch['Id_Receiver'].")'>
                                </div>
                            </th></tr>
                            <tr><th>".mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Name']."</th></tr>
                            <tr><th>
                                <input type='submit' name='cancel-friend-request' class='btns-action' value='Cancelar'>
                            </th></tr>
                            <input type='hidden' name='id-user' value='".$fetch['Id_Receiver']."'>
                        </table>
                        </form>";
                        } while($fetch = mysqli_fetch_assoc($cur));
                    }
            
                    ?>
                    </div>
                </div>
                <div class="content-receive">
                    <div class="content-title">
                        <h3><ins>Recebidos</ins></h3>
                    </div>
                    <div class="content-receive">
                        <?php 
                        
                        $cur = $friends->getFriendsByReceiveRequest($idLogado);
                        $fetch = mysqli_fetch_assoc($cur);
                        $num = mysqli_num_rows($cur);
                        if($num > 0){
                            do {
                                echo "<form action='../Controller/friendsController/requestController.php' method='POST'>
                                <table class='container-friend_profile'>
                                <tr><th>
                                    <div class='friend-img' style='width: 75px; height: 50px;' title='".mysqli_fetch_assoc($users->getUserById($fetch['Id_Sender']))['Name']."'> 
                                        <img src='../Viewer/img/user.png' width='auto' height='100%' alt='#' onclick='profile(".$fetch['Id_Sender'].")' onclick='".$fetch['Id_Receiver']."'>
                                    </div>
                                </th></tr>
                                <tr><th>
                                    <input type='submit' name='accept-friend-request' class='btns-action' value='Aceitar'>
                                </th></tr>
                                <tr><th>
                                    <input type='submit' class='btns-action' name='reject-friend-request' value='Recusar'>
                                </th></tr>
                                <input type='hidden' id='id-user' name='id-user' value='".$fetch['Id_Sender']."'>
                            </table>
                            </form>";
                            } while($fetch = mysqli_fetch_assoc($cur));
                        }?>
                    </div>
                </div>
            </div>
        </section>
</main>
<script>
    function profile(x){
        location.href = "../perfil/"+x;
    }
</script>
</body>
</html>