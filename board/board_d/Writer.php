<?php include 'b_Style.php'?>

<form method="post" action="b_controller.php" style="padding: 3px">
    title <br>
    <input type="text" style="width: 900px;margin: 10px" name="WriteTitle">
    <textarea style="width: 900px; height: 600px; margin: 10px" name="WriteContents"></textarea><br>
    <div align="center">
        <input type="submit" value="입력">
        <input type="button" value="취소" onclick="location.href='b_controller.php'">
    </div>
</form>