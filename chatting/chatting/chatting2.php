<!--
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
    <?php $room_id = $_GET['id'];?>

    $(document).ready(function () {
       updateData();
    });

    function updateData(){
        $.ajax({
            url: "chatting.php",
            type:"post",
            cache: false,
            success: function (data){
                $('#chatting').html(data);

            }
        });
        setTimeout("updateData()",500);
    }

</script>-->



<form action="controller.php?check=4&send=1&id=<?php echo $room_id;?>" method="post">
    <input type="text" name="contents" style="width: 500px">
    <input type="submit" value="보내기">
    <input type="button" value="나가기" onclick="move(<?php echo $room_id;?>)">
</form>

<script>
    /*function move(arg) {
        location.href="controller.php?check=4&exit=1&id="+arg;
    }*/
</script>
