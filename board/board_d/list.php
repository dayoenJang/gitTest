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

<table>
    <tr>
        <?php for( $i = 0 ; $i < floor($_SESSION['listCount'] / 5)  ; $i++ ){?>
            <td><?php $i+1 ?></td>
        <?php }?>
    </tr>
</table>

<form action="b_controller.php">
    <input type="submit" value="글쓰기" name="click_check">
</form>