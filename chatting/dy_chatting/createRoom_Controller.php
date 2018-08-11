<?php
include "model.php";

class CreateRoom_Controller
{
    private $DB;

    function __construct()
    {
        $this->DB = new DB();
    }

    //채팅방 개설
    function CreateRoom()
    {
        if ($_POST['roomName'] != null) {
            $this->DB->insertRoom($_POST['roomName']);
            $result = $this->DB->findRoomID($_POST['roomName']);
            echo "<script>location.href='chatting.php?id=$result';</script>";
        }
        if ($_POST['roomName'] == null) {
            echo "<script>alert('채팅방명을 정하세요');</script>";
        }
    }
}

$obj = new CreateRoom_Controller();
$obj->CreateRoom();
?>

