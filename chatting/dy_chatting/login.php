<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>채팅 로그인</title>
</head>
<body>
<div align="center" style="border: solid black; width: 700px; height: 500px; margin: auto; margin-top: 100px">
    <h1 style="margin-top: 70px">로그인</h1>
    <form action="login_Controller.php" method="post" style="margin-top: 50px">

       ID<input type="text" name="id" style="width:200px;"><br>

       PW<input type="password" name="pw" style="margin-top: 10px;width:200px;"><br>

        <input type="submit" value="로그인" style="margin-top: 10px" >
    </form>
    <input type="button" value="회원가입" onclick="move()">
</div>
</body>
</html>

<script>
    function move() {
        location.href="bb.php";
    }
</script>