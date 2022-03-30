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
                                    $letter = str_split(mysqli_fetch_assoc($users->getUserById($fetch['Id_Sender']))['Name']);
                                    $letter = strtoupper($letter[0]);
                                    echo "<table class='container-friend_profile'>
                                    <tr><th><div class='friend-img' style='background-image: radial-gradient(".mysqli_fetch_assoc($users->getUserById($fetch['Id_Sender']))['Pred_Color']." 30%, rgba(0, 0, 0, 0)70%' title='".mysqli_fetch_assoc($users->getUserById($fetch['Id_Sender']))['Name']."'><a class='letter' href='perfil/".$fetch['Id_Sender']."'>".$letter."</a></div></th></tr>
                                    <tr><th><a href='perfil/".$fetch['Id_Sender']."'><span>".mysqli_fetch_assoc($users->getUserById($fetch['Id_Sender']))['Name']."</span></a></tr></th>
                                    </table>";
                                    $amigos = true;
                                }
                            } else {
                                if($fetch['Friend'] == true){
                                    $letter = str_split(mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Name']);
                                    $letter = strtoupper($letter[0]);
                                    echo "<table class='container-friend_profile'>
                                    <tr><th><div class='friend-img'><div class='friend-img' style='background-image: radial-gradient(".mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Pred_Color']." 30%, rgba(0, 0, 0, 0)70%' title='".mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Name']."'><a class='letter' href='perfil/".$fetch['Id_Receiver']."'>".$letter."</a></div></th></tr>
                                    <tr><th><a href='perfil/".$fetch['Id_Receiver']."'><span>".mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Name']."</span></a></tr></th>
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
                    <div class="title">
                        <h3><ins>Enviados</ins></h3>
                    </div>
                    <div class="content">
                        <?php 
                        $cur = $friends->getFriendsBySendRequest($idLogado);
                        $fetch = mysqli_fetch_assoc($cur);
                        $num = mysqli_num_rows($cur);
                        if($num > 0){
                            do {
                                $letter = str_split(mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Name']);
                                $letter = strtoupper($letter[0]);
                                echo "<script> let perfil".$fetch['Id_Receiver']." = 'perfil/".$fetch['Id_Receiver']."'; </script>
                                <form action='../Controller/Router.php' method='POST'>
                                <div class='container-friend_profile'>
                                    <div class='friend-img' style='background-image: radial-gradient(".mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Pred_Color']." 30%, rgba(0, 0, 0, 0)70%' title='".mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Name']."'>
                                    <a class='letter' href='perfil/".$fetch['Id_Receiver']."'>".$letter."</a>
                                    </div>
                                    <a href='perfil/".$fetch['Id_Receiver']."'><span>".mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Name']."</span></a>
                                    <div class='buttons'>
                                        <input type='submit' name='submit' class='btns-action' value='Cancelar'>
                                    </div>
                                    <input type='hidden' name='id-user' value='".$fetch['Id_Receiver']."'>
                                </div>
                                </form>";
                            } while($fetch = mysqli_fetch_assoc($cur));
                        }
                
                        ?>
                    </div>
                </div>
                <div class="content-receive">
                    <div class="title">
                        <h3><ins>Recebidos</ins></h3>
                    </div>
                    <div class="content">
                        <?php 
                        $cur = $friends->getFriendsByReceiveRequest($idLogado);
                        $fetch = mysqli_fetch_assoc($cur);
                        $num = mysqli_num_rows($cur);
                        if($num > 0){
                            do {
                                $letter = str_split(mysqli_fetch_assoc($users->getUserById($fetch['Id_Sender']))['Name']);
                                $letter = strtoupper($letter[0]);
                                echo "<script>let perfil".$fetch['Id_Sender']." = 'perfil/".$fetch['Id_Sender']."';</script>
                                <form action='../Controller/Router.php' method='POST'>
                                <div class='container-friend_profile'>
                                <div class='friend-img' style='background-image: radial-gradient(".mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Pred_Color']." 30%, rgba(0, 0, 0, 0)70%' title='".mysqli_fetch_assoc($users->getUserById($fetch['Id_Receiver']))['Name']."'>
                                <a class='letter' href='perfil/".$fetch['Id_Receiver']."'>".$letter."</a>
                                    </div><a href='perfil/".$fetch['Id_Sender']."'>
                                    <span>".mysqli_fetch_assoc($users->getUserById($fetch['Id_Sender']))['Name']."</span></a>
                                    <div class='buttons'>
                                        <input type='submit' name='submit' class='btns-action' value='Aceitar'>
                                        <input type='submit' name='submit' class='btns-action' value='Rejeitar'>
                                    </div>
                                    <input type='hidden' name='id-user' value='".$fetch['Id_Sender']."'>
                                </div>
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