<html>
    <head>
        <title>게시글 작성</title>
        <?php
       include "titleStyle.php";
        ?>
    </head>
    <body>
        <div align="center" style="margin-top: 3px;">
          <form action="writepage.php" method="post" onsubmit="J_click()">
            <input type="text" id="title" name="title" style="width: 800px"><br>
            <textarea id = contents name="contents" style="margin-top: 3px; width: 800px; height: 400px"></textarea><br>
            <input type="submit" value="작성" style="margin-top: 3px">
          </form>
        </div>
    </body>
</html>
<?php
    include  "J_db.php";
    $DB = new DB();



?>

<script>
    function J_click(){
        var title = document.getElementById("title");
        var contents =  document.getElementById("contents");

        if(title.value ==""){
            alert("제목을 입력해주세요");
        }else{
           <?php $DB-> insert("dayoen", $_POST['title'], $_POST['contents']);?>
        }
    }
</script>


