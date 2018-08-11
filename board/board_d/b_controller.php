<?php

include 'b_model.php';



class main {
    private $DB;
    function __construct()
    {
        $this->DB = new DB();
    }

    function write(){
        include 'Writer.php';
    }

    function write_insert(){
        if(isset($_POST['WriteTitle'])){
            if($_POST['WriteTitle'] != null){
                $this -> DB -> insert('ekdus','jangdayoen',$_POST['WriteTitle'], $_POST['WriteContents']);
                $this -> list_look();
            }else{

                echo "<script>history.back();alert('제목이 없습니다. 다시 입력하세요');</script>";
            }
        }
    }

    function list_look(){
        include 'TitleHead.php';
        $total = $this -> DB -> select();
        if(isset($_GET['click_check'])){
            if($_GET['click_check'] == '글쓰기')
                $this->write();
        } else {
            include "list.php";
        }
        include 'TitleFoot.php';
    }
}
$a = new main();
$a ->list_look();
if(isset($_POST['WriteTitle'])){
    $a->write_insert();
}

?>