<form action="Page_updatepush.php" method="post">
    <?php
    header('P3P: CP="NOI CURa ADMa DEVa TAIa OUR DELa BUS IND PHY ONL UNI COM NAV INT DEM PRE"');

    $SessionId = $_SESSION['id'];
    $readnum = $_GET['row'];
    $db_con = mysqli_connect('localhost', 'root', 'autoset', 'test');
    $find = "select * from dy_board where board_id = '$readnum'";

    $result = mysqli_query($db_con, $find);

    echo "<html>
            <head>
                <style type='text/css'>
                    /*가장 큰 틀 box*/
                    .my-box {
                        margin: auto;
                        border: 1px solid;
                        padding: 10px;
                        width: 1000px;
                        letter-spacing: 2px;
                    }
                    /* bar */
                    .p-box{
                        line-height: 1px;
                        cursor: pointer;
                    }                                    
                    .text-box{
                        margin: auto;
                        border: 1px solid; padding:10px;
                        width: 980px;
                        height: 400px;
                    }
                    .a{
                    text-decoration: none;
                    color: #545454;
                    }
                </style>
            </head>
            <div class='my-box' align='center'>
             <h1>\"Jangdayoen-_-\"</h1><hr><h3>";
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['board_id'] = $row[0];
        $board_id = $_SESSION['board_id'];
        $userId = $row[2];
        $userName = $row[3];
        $title = $row[4];
        $body = $row[5];
        $seeCount = $row[6]+1;
    }
    echo $title . "<hr>";
    echo "<div class='text-box'>" . $body . "</div><hr>";


    if ($userId == $SessionId) {
        echo "</h3><p align='right'><a href='Page_update.php?board_id=$board_id' class='a'>수정 </a>|
              <a href='Page_updatepush.php?delete=$board_id'  class='a'>삭제 </a>|";
    }

    echo "<h4>댓글</h4>";

    $find = "select * from page_board_pid where board_pid = $board_id";
    $result = mysqli_query($db_con, $find);
    if(mysqli_num_rows($result) != 0){
        echo "<table border='1' style=' border:solid;'>";
        while ($row = mysqli_fetch_array($result)){
            echo "<tr style='width:200px;'><td>$row[1]</td>";
            echo "<td style='width: 700px;'>$row[2]</td>";
            echo "<td><input type='submit' value='X'> </td></tr>";
        }
        echo "</table>";
    }


    echo "<input type='text' name='comment' style='width:850px;'><input type='submit' value='달기'><br>";
    echo "<a href='Page_listRead.php'  class='a'>리스트보기</a></p>";
    echo "</div></html>";


    $insert = "UPDATE dy_board SET hits = $seeCount WHERE board_id = $board_id";
    mysqli_query($db_con,$insert);

    ?>
</form>
