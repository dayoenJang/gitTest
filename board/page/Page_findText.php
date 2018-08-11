<?php
if (isset($_GET['numofpage'])) {
    $numofpage = $_GET['numofpage'];
} else {
    $numofpage = 1;
}
$find = $_GET['find'];
$db_con = mysqli_connect('localhost','root','autoset','test');
$limitNum = $numofpage * 5 - 5;
$insert = "select * from dy_board where subject = '$find'";
$result = mysqli_query($db_con, $insert);

if (isset($_SESSION['id'])) {
    $tableStart = "<html>
                    <head>
                        <style>
                        tr:hover{
                        background-color: lightgray;
                        }          
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
                    .a{
                    text-decoration: none;
                    color: #545454;
                    }
                    
                        </style>
                    </head>
                    <body>
                    <div></div>
                     <div class='my-box' align='center'>
                     <h1>\"Jangdayoen-_-\"</h1>
                     <hr>
                        
                        <p align='right' class='p-box'> <a onclick='move(7)'>logout</a>|
                        <a onclick='move(2)'>MyPage</a></p>
                       
                     <hr>
                      <table style='width: 1000px'  align = 'center'>
                        <thead>
                        <tr  style='background-color:darkgray' align='center'>
                            <td>순번</td>
                            <td>댓글</td>
                            <td> id </td>
                            <td>작성자명</td>
                            <td>제목</td>
                            <td>조회수</td>
                            <td>시간</td>
                        </tr>
                        </thead>
                        <tbody id='table'>
                        ";

    while ($row = mysqli_fetch_array($result)) {
        $tableStart .= "<tr align='center'>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td><a href='Page_read.php?row=$row[0]' class='a'>$row[4]</a></td>
                        <td>$row[6]</td>
                        <td>$row[7]</td>
                   </tr>";
    }
} else {
    $tableStart = "<html>
                    <head>
                        <style>
                        tr:hover{
                        background-color: lightgray;
                        }          
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
                    .a{
                    text-decoration: none;
                    color: #545454;
                    }
                    
                        </style>
                    </head>
                    <body>
                    <div></div>
                     <div class='my-box' align='center'>
                     <h1>\"Jangdayoen-_-\"</h1>
                     <hr>
                        
                        <p align='right' class='p-box'> <a onclick='move(1)'>login</a>|
                        <a onclick='move(2)'>MyPage</a></p>
                     <hr>
                      <table style='width: 1000px'  align = 'center'>
                        <thead>
                        <tr  style='background-color:darkgray' align='center'>
                            <td>순번</td>
                            <td>댓글</td>
                            <td> id </td>
                            <td>작성자명</td>
                            <td>제목</td>
                            <td>조회수</td>
                            <td>시간</td>
                        </tr>
                        </thead>
                        <tbody id='table'>
                        ";

    while ($row = mysqli_fetch_array($result)) {
        $tableStart .= "<tr align='center'>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td><a class='a'>$row[4]</a></td>
                        <td>$row[6]</td>
                        <td>$row[7]</td>
                   </tr>";
    }
}

$tableEnd = "</tbody>
                    </table>
                    </body>
               </html>";

echo $tableStart . $tableEnd;
echo "<html><p align='center'>";
$num_row = mysqli_num_rows(mysqli_query($db_con, 'select * from dy_board'));
$listNumber = $num_row / 5;
if ($listNumber != 1) {
    $listNumber = floor($listNumber) + 1;
}
if ($numofpage > 1) {
    $page = $numofpage - 1;
} else {
    $page = 1;
}

echo "<a style='cursor: pointer;' onclick='zzz($page)'>◀|</a>";
//페이지 수가 5보다 작거나 같을 때
if ($listNumber <= 5) {
    for ($i = 1; $i <= $listNumber; $i++) {
        if ($i == $numofpage) {
            echo "<a style='color : red ;cursor: pointer;' onclick='zzz($i)'>$i</a>";
        } else {
            echo "<a style='cursor: pointer;' onclick='zzz($i)'>$i</a>";
        }
        echo "|";
    }
} elseif ($listNumber - $numofpage < 2) {
//뒷페이지가 없을때
    for ($i = $numofpage - 2; $i <= $listNumber; $i++) {
        if ($i == $numofpage) {
            echo "<a style='color : red ;cursor: pointer;' onclick='zzz($i)'>$i</a>";
        } else {

            echo "<a style='cursor: pointer;' onclick='zzz($i)'>$i</a>";

        }
        echo "|";
    }
} elseif ($numofpage <= 3) {
    for ($i = 1, $count = 0; $count < 5; $i++, $count++) {
        if ($i == $numofpage) {
            echo "<a style='color : red ;cursor: pointer;' onclick='zzz($i)'>$i</a>";
        } else {

            echo "<a style='cursor: pointer;' onclick='zzz($i)'>$i</a>";

        }
        echo "|";
    }
} else {
    for ($i = $numofpage - 2; $i <= $numofpage + 2; $i++) {
        if ($i == $numofpage) {

            echo "<a style='color : red ;cursor: pointer;' onclick='zzz($i)'>$i</a>";
        } else {

            echo "<a style='cursor: pointer;' onclick='zzz($i)'>$i</a>";
        }
        echo "|";
    }


}
if ($numofpage < $listNumber) {
    $nextPage = $numofpage + 1;
} else {
    $nextPage = $listNumber;
}

echo "<a style='cursor: pointer;'onclick='zzz($nextPage)'>▶</a>";



echo "<br><input type='button' value='글쓰기' onclick='go()'></p></div></html>";
if (isset($_SESSION['id'])) {
    echo "<script> 
            function go(){
                location.href = 'http://localhost/Page_Writetemplate.php';
            }</script>";
}
?>