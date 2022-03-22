<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$conn = mysqli_connect("192.168.17.254", "root", "", "db");


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: grey;
            color: white;
        }
        table, th, td {
            border: 2px solid black;
            border-radius: 10px;
            background: rgba(0, 0, 0, .4);
            font-family: sans-serif;
            font-weight: bolder;
            font-size: 20pt;
            color: white;
        }
        th {
            padding: 20px;
            margin: 10px;
        }
        td {
            font-weight: normal;
        }
    </style>
</head>
<body>
    <h1><strong>Amigos</strong></h1>
    <table>
        
    <?php
    $cur = mysqli_query($conn, "SELECT * FROM users;");
    $fetch = mysqli_fetch_assoc($cur);
    do {
        echo $fetch['Name'];
    } while ($fetch = mysqli_fetch_assoc($cur));
    /*
{
    $query = $friends->getAllFriends($idLogado);
    $fetch = mysqli_fetch_assoc($query);
    $num = mysqli_num_rows($query);
    if($num > 0){
        do {
            if($fetch['Id_Person1'] == 1){
                if(mysqli_fetch_assoc($friends->getFriendByPersonId(1, $idLogado))['Request'] == true){
                    echo "<tr><th>".mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE Id_Person = ".$fetch['Id_Person2']))['Name']."</tr></th>";
                }
            } else {
                if(mysqli_fetch_assoc($friends->getFriendByPersonId(2, $idLogado))['Request'] == true){
                    echo "<tr><th>".mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE Id_Person = ".$fetch['Id_Person1']))['Name']."</tr></th>";    
                }
            }
        } while($fetch = mysqli_fetch_assoc($query));
    }
}
 */ ?>    </table>
    <h1>Todos os usuarios</h1>
    <table>
        <tr><th>Usuário</th><th>Amigos</th></tr>
    <?php /*
{
    $query = mysqli_query($conn, "SELECT * FROM users");
    $fetch = mysqli_fetch_assoc($query);
    $num = mysqli_num_rows($query);
    if($num > 0){
        do {
            $idUser = $fetch['Id_Person'];
            $idPerson1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM friends WHERE Id_Person1 = $idLogado AND Id_Person2 = $idUser"));
            $idPerson2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM friends WHERE Id_Person2 = $idLogado AND Id_Person1 = $idUser"));
            if($idPerson1 > 0 || $idPerson2 > 0){
                if($idPerson1 > 0){
                    $cur = mysqli_query($conn, "SELECT * FROM friends WHERE Id_Person1 = $idLogado AND Id_Person2 = $idUser");
                    if(mysqli_fetch_assoc($cur)['Request'] == false){
                        echo "<tr><td>".$fetch['Name']."</td><td>Solicitação</td></tr>";
                    } else {
                        echo "<tr><td>".$fetch['Name']."</td><td>Sim</td></tr>";
                    }
                } else {
                    $cur = mysqli_query($conn, "SELECT * FROM friends WHERE Id_Person2 = $idLogado AND Id_Person1 = $idUser");
                    if(mysqli_fetch_assoc($cur)['Request'] == false){
                        echo "<tr><td>".$fetch['Name']."</td><td>Solicitação</td></tr>";
                    } else {
                        echo "<tr><td>".$fetch['Name']."</td><td>Sim</td></tr>";
                    }
                }

            } else {
                echo "<tr><td>".$fetch['Name']."</td><td>Não</td></tr>";
            }
        } while($fetch = mysqli_fetch_assoc($query));
    }
}
    */ ?>
    </table>
    <h1>Testando banco de dados remoto</h1>
    
    <table>
        <?php /*
        $cur = mysqli_query($conn, "SELECT * FROM users");
        $num = mysqli_num_rows($cur);
        $fetch = mysqli_fetch_assoc($cur);
        if($num > 0){
            do {
                echo "<tr><th>".$fetch['Name']."</tr></th>";
            } while($fetch = mysqli_fetch_assoc($cur));
        }*/
    
    
        ?>
    </table>
</body>
</html>