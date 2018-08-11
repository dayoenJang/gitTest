<?php
include "model.php";

class bb_Controller
{
    private $DB;

    function __construct()
    {
        $this->DB = new DB();
    }

    function UserInsert()
    {
        //회원가입
        if ($_POST['id'] == null || $_POST['pw'] == null || $_POST['name'] == null) {
            echo "<script>alert('다시 입력하세요');
                            history.back();</script>";
        } else {
            $result = $this->DB->InsertUser($_POST['id'], $_POST['pw'], $_POST['name']);
            if ($result) {
                echo "<script>location.href='login.php';</script>";
            } else {
                //중복확인
                echo "<script>alert('다른 아이디를 사용해주세요');
                            history.back();</script>";
            }
        }
    }
}

$obj = new bb_Controller();
$obj->UserInsert();
?>



