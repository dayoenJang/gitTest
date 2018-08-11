<?php

class DB
{
    private $db_con;
    //DB연결
    function __construct()
    {
       $this->db_con = mysqli_connect("localhost", "root", "autoset", "test");
    }

    //insert
    function insert($name,$subject,$contents)
    {
        mysqli_query($this->db_con, "insert into dy_board (user_name, subject, contents) 
                                              VALUES ('$name', '$subject', '$contents')");
    }

    //update
    function update()
    {

    }

    //select
    function total_select()
    {
        return mysqli_query($this->db_con, "select * from dy_board");
    }

    function select($id){
        return mysqli_query($this->db_con,"select * from dy_board WHERE board_id = '$id'");
    }
    //delete
    function delete()
    {

    }

}


?>