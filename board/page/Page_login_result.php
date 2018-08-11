<form action="Page_Write.php" method="post">
<!--<form action="Page_listRead.php" method="post">-->
<?php
if(isset($_POST['UserID']) && isset($_POST['UserPassword'])){
    $id = $_POST['UserID'];
    $password  = $_POST['UserPassword'];
    $db_con = mysqli_connect('localhost', 'root', 'autoset','test');
    $find = "select * from customer where id = '$id' and password = '$password'";
    $result = mysqli_query($db_con, $find);
    if(mysqli_num_rows(mysqli_query($db_con, $find)) == 0){
        echo "<script>
                    alert('ID나 PassWd가 맞지 않습니다.');
                    location.href='Page_login_main.php';
              </script>";

    }else{
        while ($row = mysqli_fetch_array($result)) {
            if($row[0] == $id && $row[1] == $password){
                $_SESSION['id'] = $row[0];
                $_SESSION['name'] = $row[2];
                echo "<script>
                        alert('zzz');
                        location.href='Page_listRead.php'
                      </script>";
            }
        }
    }

}else{
    $id = $_POST['id'];
    $PW = $_POST['PassWd'];
    $Name = $_POST['Name'];
    $age = $_POST['age'];

    $db_con = mysqli_connect('localhost', 'root', 'autoset', 'test');
    $insert = "insert into customer (id, password, name, age) VALUES ('$id','$PW','$Name',$age);";
    mysqli_query($db_con,$insert);
    echo "<script>
            location.href='http://localhost/Page_login_main.php';
          </script>";
}
?>

</form>
