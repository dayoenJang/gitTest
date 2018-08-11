<html>
<head>
    <title>게시글 목록</title>
    <?php
    include "titleStyle.php";
    include "J_db.php";
    $DB = new DB();
    ?>
</head>
<body>
<table style="width: 100%; text-align: center; border-top: 1px solid black;border-bottom: 1px solid black; border-collapse: collapse;">
    <tr>
        <td>번호</td>
        <td>이름</td>
        <td>제목</td>
        <td>조회수</td>
        <td>날짜</td>
    </tr>
    <?php
     $total = $DB->select_total();
    while($i = mysqli_fetch_array($total)){?>
         <tr>
         <td><a href="read.php?id=<?php echo $i[0];?>"><?php echo $i[0];?></a></td>
         <td><a href="read.php?id=<?php echo $i[0];?>"><?php echo $i[2];?></a></td>
         <td><a href="read.php?id=<?php echo $i[0];?>"><?php echo $i[3];?></a></td>
         <td><a href="read.php?id=<?php echo $i[0];?>"><?php echo $i[5];?></a></td>
         <td><a href="read.php?id=<?php echo $i[0];?>"><?php echo $i[6];?></a></td>
         </tr>
     <?php } ?>
</table>
</body>
</html>
