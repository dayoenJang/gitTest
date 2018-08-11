<?php
/**
 * Created by PhpStorm.
 * User: 장다연 영진전문대
 * Date: 2017-11-27
 * Time: 오전 10:44
 */
?>

<table align="center" style="align-content: center; width: 900px">
    <tr>
        <td>번호</td>
        <td>제목</td>
        <td>사용자</td>
        <td>조회수</td>
        <td>날짜</td>
    </tr>

    <?php while ($result = mysqli_fetch_array($total)){?>
        <tr>
            <td><?php echo $result['board_id'];?></td>
            <td><?php echo $result['subject'];?></td>
            <td><?php echo $result['user_name'];?></td>
            <td><?php echo $result['hits'];?></td>
            <td><?php echo $result['reg_date'];?></td>
        </tr>
    <?php } ?>
</table>
<div align="center">
<form action="controller.php?check=1">
    <input type="submit" value="글쓰기" name="click_check">
</form>
</div>