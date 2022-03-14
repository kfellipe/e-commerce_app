<?php 
session_start();

include_once "../../Viewer/pages/partials/head.html";

?>
</head>
<body>
    <?php if(isset($_SESSION['logado'])){
        include_once "../../Viewer/pages/partials/headerLogado.html";
    } else  {
        include_once "../../Viewer/pages/partials/header.html";
    } 
    if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            echo "<div class='popup'>$message</div>";
            session_unset();
            session_destroy();
        }
    ?>

</body>
</html>