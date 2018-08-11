<?php
include "model.php";
$room_id = $_GET['id']; ?>
<div align="center">
    <div style="border: solid; width:1000px;" align="center">
        <table id='chattingList'>
            <script>
                setInterval(function ajax() {
                    //값을 불러와 저장시킬 테이블을 가지고 온다.
                    var chatting = document.getElementById('chattingList');
                    var httpreq = new XMLHttpRequest();
                    httpreq.onreadystatechange = function () {
                        //값을 가지고와 저장시킨다.
                        if (httpreq.readyState == 4 && httpreq.status == 200) {
                            chatting.innerHTML = "";
                            chatting.innerHTML += httpreq.responseText;
                        }
                    };
                    //포스트 방식으로 값을 보낸다.
                    httpreq.open("POST", "chatting_Controller.php", true);
                    httpreq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    httpreq.send("id=" +<?php echo $_GET['id']; ?>);
                }, 500);
            </script>
        </table>
    </div>
</div>
<script>
    function ajax2() {
        var contents = document.getElementById('contents');
        var textreq = new XMLHttpRequest();
        textreq.onreadystatechange = function () {
            if (textreq.readyState == 4 && textreq.status == 200) {
            }
        };
        textreq.open("POST", "chatting_Controller.php", true);
        textreq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        textreq.send("id=" + <?php echo $_GET['id'] ?>+"&contents=" + contents.value);
        contents.value = "";
    }

    function move() {
        location.href = "chatting_Controller.php?exit=1&id=" +<?php echo $_GET['id'] ?>;
    }

</script>
<div style="margin-top: 20px" align="center">
    <input type="text" name="contents" id="contents" style="width: 500px">
    <input type="button" value="보내기" onclick="ajax2()">
    <input type="button" value="나가기" onclick="move()">
</div>
</body>
</html>
