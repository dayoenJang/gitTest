<?php
include "model.php";
class Board{
    private $DB;
    function __construct()
    {
        $this->DB = new DB();
        if(isset($_GET['check'])){
            $this->Check($_GET['check']);
        }else{
            $this->list_look();
        }
    }

    function insert(){
        include "board_head.php";
        include "write.php";
        $this->DB->insert($_POST['title'], $_POST['contents']);
    }

    function update(){

    }

    function list_look(){
        include "board_head.php";
        $total = $this->DB->total_select();
        include "list.php";
    }

    function read(){
        include "board_head.php";
        $select = $this->DB->select();
    }

    function Check($check){
        switch($check){
            //글쓰기
            case 1:
                $this->insert();
                break;
            //글읽기
            case 2:
                $this->read();
                break;
            //리스트
            case 3:
                $this->list_look();
                break;
            //글수정
            case 4:
                $this->update();
                break;

        }
    }
}

$obj = new Board();



?>