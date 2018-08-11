<?php

class user
{
    const host = "localhost";
    const user = "root";
    const password = "autoset";
    const database = "dy_chatting";
}

class DB extends user{

    private $DB_conn;

    //DBMS 연결
    function __construct()
    {
        $this->DB_conn = mysqli_connect(user::host,user::user,user::password,user::database);
    }

    //로그인
    function login($id, $pw)
    {
        $result = $this->DB_conn->query("select * from user WHERE id = '$id' AND pw = '$pw'");
        $result =  mysqli_num_rows($result);
        if($result == 1){
            return true;
        }else{
            return false;
        }
    }

    //채팅방 리스트
    function roomList()
    {
        return $this->DB_conn->query("select * from chatroom");
    }

    //채팅방 개설
    function insertRoom($name)
    {
        $master = $_SESSION['name'];
        $this->DB_conn->query("insert into chatroom (name, master,people) VALUES ('$name', '$master', 0)");
        $result = $this->DB_conn->query("select room_id from chatroom WHERE name = '$name'");
        $result = $result -> fetch_array();
        $this->MasterTurn($name,$result[0]);
    }

    //방장 순서
    function MasterTurn($room_id)
    {
        $master = $_SESSION['name'];
        $this->DB_conn->query("insert into master (room_id, name) VALUES ($room_id, '$master')");
    }

    function selectUserName($id)
    {
        return $this->DB_conn->query("select name from user WHERE id = '$id'");
    }

    //채팅 목록
    function selectChatting($id)
    {
        return $this->DB_conn->query("select * from dy_chatting_2 WHERE room_id = $id");
    }

    //채팅 입력
    function chattingInsert($id, $contents)
    {
        $user = $_SESSION['name'];
        $this->DB_conn->query("insert into dy_chatting_2 (room_id, name, contents) VALUES ($id, '$user','$contents')");
    }

    //참여자 수 변경
    function participant($id, $arg)
    {
        $userName = $_SESSION['name'];
        if($arg == 1){
            @$check = mysqli_num_rows($this->DB_conn->query("select name from master WHERE room_id = $id AND name = '$userName'"));
            if($check == 0 ){
                $result = $this->DB_conn->query("select people from chatroom WHERE room_id = $id");
                $result = $result -> fetch_array();
                $this->DB_conn->query("update chatroom set people=$result[0]+1 where room_id = $id ");
            }
        }
        //방을 나갔을 때
        elseif($arg == 2){
            $result = $this->DB_conn->query("select * from master WHERE room_id = $id order by master_id ");
            $result = $result -> fetch_array();
            $result = $result[2];

            $this->DB_conn->
                query("delete from master where room_id = $id and name = '$userName'");
            $down = $this->DB_conn->query("select people from chatroom WHERE room_id = $id");
            $down = $down -> fetch_array();
            $this->DB_conn->query("update chatroom set people=$down[0]-1 where room_id = $id ");
            //방장이 나갔을 때
            if($result == $userName){
                $result = $this->DB_conn->query("select * from master WHERE room_id = $id order by master_id ");
                $result = $result -> fetch_array();
                $result = $result[2];
                $this->DB_conn->query("update chatroom set master='$result' where room_id = $id ");
            }

            $result = $this->DB_conn->query("select people from chatroom WHERE room_id = $id");
            $result = $result ->fetch_array();
            $result = $result[0];

            if($result == 0){
                $this->DB_conn->query("delete from chatroom where room_id = $id ");
                $this->DB_conn->query("delete from dy_chatting_2 where room_id = $id ");
            }

        }
    }

    function findRoomID($name)
    {
        $result = $this->DB_conn->query("select room_id from chatroom WHERE name = '$name'");
        $result = $result -> fetch_array();
        $result = $result[0];
        $_SESSION['room_id'] = $result;
        $_SESSION['kk'] = $name;

    }
}


?>