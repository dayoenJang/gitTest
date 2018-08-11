<html>
<head>

    <title>로그인</title>
</head>
<body>
<div align="center" style="border: solid black; width: 700px; height: 500px; margin: auto; margin-top: 100px">
    <h1 style="margin-top: 70px">로그인</h1>
    <form action="controller.php?check=1" method="post" style="margin-top: 50px">

        <label for="exampleInputName2">ID</label>
        <input type="text" name="id" class="form-control" style="width:200px;"><br>

        <label for="exampleInputName2">PW</label>
        <input type="password" name="pw" style="margin-top: 10px;width:200px;" class="form-control"><br>

        <input type="submit" value="로그인" style="margin-top: 10px" >
    </form>
</div>
</body>
</html>