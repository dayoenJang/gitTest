<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>

        .my-box_head {
            margin: auto;
            border: 1px solid;
            padding: 10px;
            width: 1000px;
            letter-spacing: 2px;
        }

        .my-box_body {
            margin: 7px;
            border: 1px solid;
            padding: 10px;
            width: 960px;
            letter-spacing: 2px;
        }

        .title {
            background: pink;
            height: 130px;
            margin: 7px;
        }

        .bar {
            background: palevioletred;
            margin: auto;
            width: 987px;
        }

        .content {
            width: 950px;
            height: 500px;
        }
    </style>
</head>
<body>
<div class='my-box_head'>

    <?php if (isset($_SESSION['id'])) {
        ?>
        <div align="right">
            안녕하세요 <?php echo $_SESSION['name'] ?>님
            <button type="button" class="btn btn-default" onclick="location.href ='http://localhost/index.php/blog/log_out'">log-out</button>
        </div>
        <?php
    } else {
        ?>
        <form action="http://localhost/index.php/blog/login" method="post">
            <div align="right">
                ID : <input type="text" name="id"> P.W : <input type="text" name="pw">
                <button type="submit" class="btn btn-default">log-in</button>
            </div>
        </form>

    <?php } ?>
    <h1 align="center" class='title'>
        <br>ジャンダのブログ
    </h1>
    <form action="http://localhost/index.php/blog/search" method="post">
        <div align="right" style="margin-bottom: 1%">
            <select name="select" id="select">
                <option value="1">작성자</option>
                <option value="2">제목</option>
                <option value="3">내용</option>
                <option value="4">전체</option>
            </select>
            <input type="text" name="find">
            <button type="submit" class="btn btn-default">검색</button>
        </div>
    </form>


