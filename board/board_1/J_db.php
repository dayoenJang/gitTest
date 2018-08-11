<?php
class DB{
    private $db_con;

    function __construct()
    {
        $this->db_con = mysqli_connect('localhost','root','autoset','test');
    }

    function insert($name,$subject, $contents){
        mysqli_query($this->db_con, "insert into dy_board (user_name, subject, contents) 
                                              VALUES ('$name', '$subject', '$contents')");
    }

    function select_total(){
        return mysqli_query($this->db_con, 'select * from dy_board order by board_id DESC limit 0,5');
    }

    function update($id, $subject, $contents, $hit){
        mysqli_query($this->db_con, "update dy_board set subject= '$subject', contents = '$contents', hits = '$hit' WHERE board_id = '$id'");
    }

    function read($id){
        return mysqli_query($this->db_con, "select * from dy_board WHERE board_id = '$id'");
    }

    function find($id,$pw)
    {
        $count = func_num_args();

        if ($count == 1) {
            return mysqli_query($this->db_con, "select * from dy_board WHERE userid = '$id'");
        }else{
            return mysqli_num_rows(mysqli_query($this->db_con, "select * from dy_board WHERE userid = '$id' AND password = '$pw'"));
        }
    }

    function delete($id,$pw){
        mysqli_query($this->db_con, "delete from dy_board where user_id = '$id' AND password = '$pw'");
    }
}
?>