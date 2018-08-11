<?php
include "model.php";

class login_Controller
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
                echo "<script>location.href='chatlist_Controller.php'</script>";
            } else {
                echo "<script>location.href='dy_chatting/login.php';
                              alert('다시입력');
                      </script>";
            }
        }
    }

}

$obj = new login_Controller();
$obj->login();

?>


