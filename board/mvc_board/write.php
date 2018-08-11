
<body>
<form action="controller.php?check=2" method="post">
    <input type="text" style="width: auto;" id="title" name="title"><br>
    <textarea name="contents"></textarea>
</form>
<input type="submit" value="작성" onclick="TitleCheck()">
</body>


<script>
    function TitleCheck() {
        var title = document.getElementById('title');

        if(title.value == ""){
            alert("제목을 입력해주세요");
        }
    }
</script>
