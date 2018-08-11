<?php

$db_con = mysqli_connect('localhost', 'root', 'autoset', 'test');
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $text = $_POST['text'];
    $afterText = explode(" ", $text);
    $afterText = implode("&nbsp", $afterText);
    $afterText = nl2br($afterText);
    $find = "select * from dy_board where subject = '$title'";
    $result = mysqli_query($db_con, $find);
    while ($row = mysqli_fetch_array($result)) {
        if ($row[4] == $title) {
            $row[4] = $row[4] . "(1)";
        }
    }
    if (mysqli_num_rows(mysqli_query($db_con, $find)) == 0) {
        $user_id = $_SESSION['id'];
        $user_name = $_SESSION['name'];
        $insert = "insert into dy_board(user_id, user_name, subject, contents) VALUES ('$user_id','$user_name','$title','$afterText');";
        $result = mysqli_query($db_con, $insert);
    }
}


?>
<script>
    window.location.replace('http://localhost/Page_listRead.php');
</script>
