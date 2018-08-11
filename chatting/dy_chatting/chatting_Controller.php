<?php
include "model.php";

class chatting_Controller
{
    private $DB;

    function __construct()
    {
        $this->DB = new DB();
    }

    //채팅
    function chatting()
    {
        @$room_id = $_GET['id'];
        if (isset($_POST['id'])) {
            $room_id = $_POST['id'];
        }

        $this->DB->participant($room_id, 1);
        $this->DB->MasterTurn($room_id);
        $result = $this->DB->selectChatting($room_id);
        echo $_SESSION['name']."님이 입장하셨습니다.";
        echo "<br>------------------------------------------------";
        if (!empty($result)) {
            //ajax로 받아 온 값을 테이블에 저장시켜 출력시킨다.
            foreach ($result as $key => $value) {
                echo "<tr><td>{$value['name']}</td>";
                echo " <td>{$value['contents']}</td></tr>";
            }
        }
        //보내기 버튼을 눌렀을 때 보낼 값이 있는지 확인하고 값을 DB에 값을 저장시킨다.
        if (isset($_POST['contents'])) {
            if ($_POST['contents'] != null)
                $this->DB->chattingInsert($_POST['id'], $_POST['contents']);
        }
    }

}
//나가기 버튼을 눌렀을 때
if (isset($_GET['exit'])) {
    $DB = new DB();
    $DB->participant($_GET['id'], 2);
    echo "<script>location.href='chatlist_Controller.php';</script>";
} else {
    $obj = new chatting_Controller();
    $obj->chatting();
}

?>






