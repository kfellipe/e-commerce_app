<?php 
session_start();
$_SESSION['site'] = "Página não encontrada!";

?>
<!DOCTYPE html>
<html lang="pt-br" onclick="home()">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['site']; ?></title>
    <link rel="shortcut icon" href="https://img.icons8.com/ios-glyphs/30/000000/user--v1.png" type="image/x-icon">
    <link rel="stylesheet" href="../Viewer/css/default.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <style>
        #error {
            margin-top: 30vh;
            display: flex;
            justify-content: center;
            align-items: center;
            border-top: 3px solid black;
            border-bottom: 3px solid black;
            background: rgba(255, 255, 255, .5 );
            padding-top: 50px;
            padding-bottom: 50px;
            text-shadow: 0px 0px 10px rgba(0, 0, 0, .5);
            flex-direction: column;
        }
        html {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <main>
        <div id="error">
            <h1>Página não encontrada!</h1>
            <p>(Clique para voltar pra Home)</p>
        </div>
    </main>
    <script>
        function home(){
            location.href = "../";
        }
    </script>
</body>
</html>