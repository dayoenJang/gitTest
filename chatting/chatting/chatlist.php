
<body>
<div align="center">
<form action="controller.php?check=2" method="post">
<table style="border: solid; text-align: center; width: 90%"  >
    <tr>
        <td>번호</td>
        <td>채팅방이름</td>
        <td>방장</td>
        <td>인원</td>
        <td>개설일자</td>
    </tr>
    <?php foreach ($result as $key => $value){?>
        <tr>

            <td style="width:10%;"><?php echo $value['room_id']; ?></td>
            <td style="width:40%;"><a href="controller.php?check=4&id=<?php echo $value['room_id']; ?>"><?php echo $value['name']; ?></a></td>
            <td style="width:15%;"><?php echo $value['master']; ?></td>
            <td style="width:10%;"><?php echo $value['people']; ?></td>
            <td style="width:25%;"><?php echo $value['date']; ?></td>

        </tr>
    <?php }?>
</table>

    <input type="submit" value="방개설" style="margin-top: 30px" >
    </form>
</div>
</body>
