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

<div>
    <table style="width: 100%; text-align: center; border-top: 1px solid black;border-bottom: 1px solid black; border-collapse: collapse;">
        <tr>
            <td style="width: 20%">글번호</td>
            <td style = "width: 60%">제목</td>
            <td style = "width 10%" >조회수</td>
        </tr>
        <tr>
            <td style="width: 20%"><?php echo $board_id?></td>
            <td style = "width: 60%"><?php echo $title?></td>
            <td style = "width 10%" ><?php echo $seeCount?></td>
        </tr>
  <!--      <tr>
            <td colspan="3"></td>
        </tr>-->
    </table>
</div>
<div style="height: 200px; width: 100%; border:1px solid black; margin-top: 10px; text-align: center">
    <?php echo $body?>
</div>
<div align="center" style="margin-top: 10px">
<input type="button" value="수정" onclick="move()">
<input type="button" value="목록">
</div>

<script>
    function move(){
        location.href="update.php?id=<?php echo $board_id ?>"
    }
</script>
