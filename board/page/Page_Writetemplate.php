<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        /*내용 box*/
        .text {
            width: 1000px;
            height: 550px;
        }

        /*가장 큰 틀 box*/
        .my-box {
            margin: auto;
            border: 1px solid;
            padding: 10px;
            width: 1000px;
            letter-spacing: 2px;
        }a

        /* bar */
        .p-box {
            line-height: 1px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<form action="Page_Write.php" method="post">
    <div class='my-box'>
        <h1 align="center">"Jangdayoen-_-"</h1>
        <hr>
        <?php
        if(isset($_SESSION['id'])){
            echo "<p align='right' class='p-box' onclick='move(7)'>logout</p>";

        }else{
            echo "<p align='right' class='p-box' onclick='move(1)'>login</p>";
        }

        ?>
        <hr>
        제목<br><input type="text" id="textTitle" name="title" value="" style="width: 1000px"><br>
        내용<br><textarea class="text" id="text" name="text"></textarea><br>
        <p align="center"><input type="submit" value="확인" OnClick="return check(value)">
            <input type="button" value="취소" onclick="check(value)">
        </p></div>

    <script>
        function check(arg) {
            if (arg == '확인') {
                var title = document.getElementById("textTitle");
                if (title.value == "") {
                    alert("제목을 입력하세요");
                    return false;
                }
            } else {
                location.href = 'http://localhost/Page_listRead.php';
            }

        }
        function move(arg) {
            if (arg == 1) {
                location.href = 'http://localhost/Page_login_main.php';
            } else if (arg == 7) {
                location.href = 'http://localhost/Page_logout.php';
            }
            }
    </script>

</form>
</body>
</html>
