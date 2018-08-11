<?php
include "model.php";
class ChatList_Controller
{
    private $DB;


    function __construct()
    {
        $this->DB = new DB();
    }


    //채팅방 리스트
    function ChatRoomList()
    {
        $result = $this->DB->roomlist();
        include "chatlist.php";
    }
}
$obj = new ChatList_Controller();
$obj->ChatRoomList();

?>

