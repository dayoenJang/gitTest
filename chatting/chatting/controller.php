<?php
include "model.php";

class controller
{
    private $DB;

    function __construct()
    {
        $this->DB = new DB();

    }

    //로그인
    function login()
    {
        if (isset($_POST['id']) && isset($_POST['pw'])) {

            $id = $_POST['id'];
            $pw = $_POST['pw'];

            $result = $this->DB->login($id, $pw);
            if ($result) {
                $result = $this->DB->selectUserName($id);
                $result = $result->fetch_array();

                $_SESSION['name'] = $result[0];
                $this->ChatRoomList();
            } else {
                echo "<script>location.href='login.php';
                              alert('다시입력');
                      </script>";
            }
        }
    }

    //채팅방 개설
    function CreateRoom()
    {
        include "roomName.php";
        if (isset($_GET['create']) && $_POST['roomName'] != null) {
            $this->DB->insertRoom($_POST['roomName']);
            $this->DB->findRoomID($_POST['roomName']);
            echo "<script>location.href='controller.php?check=4';</script>";
        }
        if (isset($_GET['create']) && $_POST['roomName'] == null) {
            echo "<script>alert('채팅방명을 정하세요');</script>";
        }
    }

    //채팅방 리스트
    function ChatRoomList()
    {
        $result = $this->DB->roomlist();
        include "chatlist.php";
    }


    //채팅
    function chatting()
    {

        if(isset($_SESSION['room_id'])){
            $_GET['id'] = $_SESSION['room_id'];
        }

        $this->DB->participant($_GET['id'], 1);
        $this->DB->MasterTurn($_GET['id']);
        //echo "<script> setInterval('calMethod()',1000);</script>";
        $result = $this->DB->selectChatting($_GET['id']);

        include "chatting2.php";
        include "chatting.php";
                if (isset($_GET['send']) && isset($_POST['contents'])) {
                    if ($_POST['contents'] != null)
                        $this->DB->chattingInsert($_GET['id'], $_POST['contents']);
                }
        if (isset($_GET['exit'])) {
            $this->DB->participant($_GET['id'], 2);
            echo "<script>location.href='controller.php?check=3';</script>";
        }
    }
}

$obj = new controller();

if (isset($_GET['check'])) {
    switch ($_GET['check']) {
        case 1:-
            $obj->login();
            break;
        case 2:
            $obj->CreateRoom();
            break;
        case 3:
            $obj->ChatRoomList();
            break;
        case 4:
            $obj->chatting();
            break;
    }
}

?>


<!--<script>
    function calMethod() {
        $.ajax({
            cache: false,
            url: 'model.php',
            success: function (data) {
                $('#엘리먼트아이디').html(data);
            }
        });
    }
</script>-->
