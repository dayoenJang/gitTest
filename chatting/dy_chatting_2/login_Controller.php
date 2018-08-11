<?php
//include "model.php";
//
//class login_Controller
//{
//    private $DB;
//
//    function __construct()
//    {
//        $this->DB = new DB();
//    }
//
//    //로그인
//    function login()
//    {
//        if (isset($_POST['id']) && isset($_POST['pw'])) {
//
//            $id = $_POST['id'];
//            $pw = $_POST['pw'];
//
//            $result = $this->DB->login($id, $pw);
//            if ($result) {
//                $result = $this->DB->selectUserName($id);
//                $result = $result->fetch_array();
//
//                $_SESSION['name'] = $result[0];
//                $this->ChatRoomList();
//            } else {
//                echo "<script>location.href='../public_html/dy_chatting/login.php';
//                              alert('다시입력');
//                      </script>";
//            }
//        }
//    }
//}
//
//$obj =  new login_Controller();
//$obj->login();
//?>
<!---->
<!--<script>-->
<!--    location.href="chatlist.Controller.php";-->
<!--</script>-->
