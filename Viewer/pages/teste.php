<?php 
date_default_timezone_set('UTC');
$conn = mysqli_connect("localhost", "root", "", "testes");
$fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM lang WHERE Lang = 'pt' AND Page = 'home'"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $fetch['Title'] ?></title>
    <style>
        body, html {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            background: cyan;
        }
        header {
            width: 100%;
            height: 10vh;
            background: yellow;
            display: flex;
            justify-content: flex-end;
        }
        header > button {
            height: 100%;
            width: 120px;
            background: rgba(0, 0, 0, .7);
            color: white;
        }
        main {
            background: blue;
            width: 100%;
            height: 60vh;
        }
    </style>
</head>
<body>
<header>
        <?php 
        $content = explode("/", $fetch['Header']);
        foreach($content as $button) {
            echo "<button>$button</button>";
        }
        ?>
        <br>
        
</header>
<main>
<?php 


$content = explode("/", $fetch['Content']);
foreach($content as $button){

            echo "<button>$button</button>";
}
    
    ?>
</main>
<?php 
        echo getenv("REMOTE_ADDR");
        ?>

</body>
</html>