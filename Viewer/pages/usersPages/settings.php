<?php 
include_once "$root/Model/users.php";

$_SESSION['site'] = "Configurações";
include_once "$root/Controller/validateController.php";
include_once "$root/Viewer/pages/partials/head.html";
?>
<link rel="stylesheet" href="../Viewer/css/usersCss/settings.css">
</head>
<body>
    

    <?php 
    include_once "$root/Viewer/pages/partials/header.php";
    ?>
    <main>
        <aside>
            <div class="menu">Customizar cores</div>
            <div class="menu">Atualizar dados</div>
            <div class="menu">Segurança</div>
        </aside>
        <section class="container-view">
            <div class="view color-custom" style="display: block">
            
                <iframe src="/Viewer/pages/usersPages/settings/color-custom.php" width="100%" height="100%" frameborder="0"></iframe>
                
            </div>
            <div class="view update-user">
                <iframe src="/Viewer/pages/usersPages/settings/update-user.php" width="100%" height="100%" frameborder="0"></iframe>
            </div>
            <div class="view setting-user">
                <iframe src="/Viewer/pages/usersPages/settings/security-user.php" width="100%" height="100%" frameborder="0"></iframe>
            </div>
        </section>
    </main>
    
<script src="../Viewer/js/settings.js"></script>
</body>
</html>