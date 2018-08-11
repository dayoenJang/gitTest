<?php
$html = "<html>
<head><meta charset='utf-8'>
    <style>

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
        .text-box {
            margin: auto;
            border: 1px solid;
            padding: 10px;
            width: 980px;
            height: 445px;
            font-size: 20px;

        }

    </style>
</head>
<form action='Page_updatepush.php' method='post'>
<body>
<div class='my-box' align='center'>
    <h1>\"Jangdayoen-_-\"</h1>
    <hr>
    <p align='right'>
        <textarea style='height: 30px; width: 920px; font-size: 20px' id='Titles' name='Title'></textarea>
        <a onclick='move()' class='p-box'>MyPage</a></p>
    <hr>
    <textarea class='text-box' id='Text' name='Content'></textarea>
    <p align='right' class='p-box'>
        <input type='submit' value='저장' style='outline: none;'></a>
        <input type='button' value='취소' onclick='changePage()'></p></div>
</body>
</form>
</html>";
$board_id = $_GET['board_id'];
$_SESSION['board_id'] = $_GET['board_id'];
$userId = $_SESSION['id'];

$db_con = mysqli_connect('localhost', 'root', 'autoset', 'test');
$find = "select * from dy_board where board_id=$board_id";
$result = mysqli_query($db_con, $find);
while ($row = mysqli_fetch_array($result)) {
    $conT = $row['subject'];
    $Tit = $row['contents'];

}
$dom = new DOMDocument('1.0', 'utf-8');
@$dom->loadHTML($html);
$dom->getElementById('Titles')->nodeValue = $conT;
$dom->getElementById('Text')->nodeValue = $Tit;
echo @$dom->saveHTML();


?>