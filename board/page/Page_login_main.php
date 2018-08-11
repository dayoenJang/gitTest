<html>
<head>
    <style>
        /*가장 큰 틀 box*/
        .my-box {
            margin: auto;
            border: 1px solid;
            padding: 10px;
            width: 1000px;
            letter-spacing: 2px;
        }
        /*로그인 틀*/
        .my-bodybox{
            margin: auto;
            border: 1px solid;
            padding: 10px;
            width: 800px;
            height:200px;
            letter-spacing: 2px;
            text-align: center;
        }
        /* bar */
        .p-box{
            line-height: 1px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<form action="Page_login_result.php" method="post">
    <div class='my-box'>
        <h1 align="center">"Jangdayoen-_-"</h1>
        <hr>
        <p align='right' class='p-box' onclick="move()">list</p>
        <hr>
        <div class="my-bodybox"><br><br><br>
            ID:<input type="text" name="UserID"><br>
            PS:<input type="text" name="UserPassword"><br>
            <input type="submit" value="로그인">
            <input type="button" onclick="changePage()" value="회원가입"></a>
        </div>
    </div>
</form>
</body>
</html>

<script>
    function changePage() {
        location.href="Page_login_userCreate.php";
    }

    function move() {
        location.href="Page_listRead.php";
    }
</script>
<?php
?>

