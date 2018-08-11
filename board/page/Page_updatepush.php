<?php
$db_con = mysqli_connect('localhost', 'root', 'autoset', 'test');
if(isset($_GET['delete'])){
    $board_id=$_GET['delete'];
    mysqli_query($db_con,"delete from dy_board where board_id=$board_id");
    echo "<script>
                location.href='Page_listRead.php';
          </script>";

} else if(isset($_POST['X'])){



}else if(isset($_POST['comment'])){
    $board_id = $_SESSION['board_id'];
    $commentUser = $_SESSION['name'];
    $comment = $_POST['comment'];
    $insert = "insert into page_board_pid (board_pid, user_name, contents) VALUES ($board_id,'$commentUser','$comment')";
    @$result = mysqli_query($db_con,$insert);
    while(@$row = mysqli_fetch_array($result)){
        echo $row[0];
        echo $row[1];
        echo $row[2];
    }
    echo "<script>
               location.href='Page_read.php?row=$board_id';
          </script>";
}else {
    $title = $_POST['Title'];
    $Content = $_POST['Content'];
    $board_id=$_SESSION['board_id'];
  //  echo $title.$Content.$board_id;
    $find = "UPDATE dy_board SET contents= '$Content', subject = '$title' WHERE board_id=$board_id";
    mysqli_query($db_con,$find);
    echo "<script>
               location.href='Page_listRead.php';
          </script>";
}


?>

