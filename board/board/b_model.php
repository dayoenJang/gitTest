<?php


class db{
    private $db_con;
    //DB객체가 생성되자마자 DB를 연결한다.
    function __construct(){
        $this->db_con = mysqli_connect('localhost', 'root', 'autoset', 'test');
    }


    function update($board_id, $subject, $contents){
        $update_D = "UPDATE dy_board Set subject = '$subject', contents = '$contents' WHERE board_id = $board_id";
        mysqli_query($this->db_con, $update_D);
    }

    //새로운 정보를 입력한다.
    function insert($id, $name, $subject, $contents){
        $WriteInsert = "insert into dy_board (user_id, user_name, subject, contents) VALUES ('$id', '$name', '$subject', '$contents')";
        mysqli_query($this->db_con, $WriteInsert);
    }

    function select(){
        $arg_num = func_num_args();
        if($arg_num == 0){
            $_SESSION['listCount'] = count(mysqli_query($this->db_con,"select * from dy_board"));
            return mysqli_query($this->db_con,"select * from dy_board");
        }elseif($arg_num == 1){
            return mysqli_query($this->db_con,"select * from dy_board WHERE board_id = 1");
        }
    }

    function delete(){

    }


}


?>