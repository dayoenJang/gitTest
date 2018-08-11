<html>
<head>
    <title>게시글 수정</title>
    <?php
    include "titleStyle.php";
    include  "J_db.php";
    $DB = new DB();
    $result = $DB->read($_GET['id']);

    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['board_id'] = $row[0];
        $board_id = $_SESSION['board_id'];
        $title = $row[3];
        $body = $row[4];
        $seeCount = $row[5]+1;
    }
    ?>
</head>
<body>
<div align="center" style="margin-top: 3px;">
    <form action="update.php" method="post" onsubmit="J_click()">
        <input type="text" id="title" name="title" style="width: 800px" value="<?php echo $title?>"><br>
        <textarea id = contents name="contents" style="margin-top: 3px; width: 800px; height: 400px"><?php echo $body?></textarea><br>
        <input type="submit" value="수정" style="margin-top: 3px">
        <input type="submit" value="취소" style="margin-top: 3px">
    </form>
</div>
</body>
</html>

<script>
    function J_click(){
        var title = document.getElementById("title");
        var contents =  document.getElementById("contents");

        if(title.value ==""){
            alert("제목을 입력해주세요");
        }else{
            <?php $DB-> update($_GET['id'], $_POST['title'], $_POST['contents'], $seeCount)?>
            location.href
        }
    }
</script>