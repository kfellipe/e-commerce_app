<?php

include_once "users.php";

class friends extends users {
    public function postFriends($idperson1, $idperson2){
        return mysqli_query($this->conn, "INSERT INTO friends(Id_Sender, Id_Receiver, Friend) VALUES($idperson1, $idperson2, false)");
    }
    public function getAllFriends($id){
        return mysqli_query($this->conn, "SELECT * FROM friends WHERE (Id_Sender = $id AND Friend = true) OR (Id_Receiver = $id AND Friend = true)");
    }
    public function getFriendsBySendRequest($id){
        return mysqli_query($this->conn, "SELECT * FROM friends WHERE Id_Sender = $id AND Friend = false");
    }
    public function getFriendsByReceiveRequest($id){
        return mysqli_query($this->conn, "SELECT * FROM friends WHERE Id_Receiver = $id AND Friend = false");
    }
    public function getFriendByFriendId($idSender, $idReceiver){
        return mysqli_query($this->conn, "SELECT * FROM friends WHERE (Id_Sender = $idSender AND Id_Receiver = $idReceiver) OR (Id_Receiver = $idSender AND Id_Sender = $idReceiver)");
    }
    public function getCheckFriend($idSender, $idReceiver){
        return mysqli_query($this->conn, "SELECT * FROM friends WHERE (Id_Sender = $idSender AND Id_Receiver = $idReceiver) OR (Id_Sender = $idReceiver AND Id_Receiver = $idSender)");
    }
    public function updateFriendRequest($idSender, $idReceiver){
        return mysqli_query($this->conn, "UPDATE friends SET Friend = true WHERE Id_Sender = $idSender AND Id_Receiver = $idReceiver");
    }
    public function deleteFriendRequest($idSender, $idReceiver){
        return mysqli_query($this->conn, "DELETE FROM friends WHERE Id_Sender = $idSender AND Id_Receiver = $idReceiver");
    }
    public function deleteFriend($idSender, $idReceiver){
        return mysqli_query($this->conn, "DELETE FROM friends WHERE (Id_Sender = $idSender AND Id_Receiver = $idReceiver) OR (Id_Receiver = $idSender AND Id_Sender = $idReceiver)");
    }
    public function deleteFriendByMember($id){
        return mysqli_query($this->conn, "DELETE FROM friends WHERE Id_Sender = $id OR Id_Receiver = $id");
    }
}
$friends = new friends();