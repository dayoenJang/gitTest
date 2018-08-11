<form action="Page_login_main.php">
<?php
if(isset($_POST['submit'])){
    if($_POST['submit'] == '회원정보보기'){
        echo $_SESSION['name']."님이 로그인하셨습니다.<br>";
        echo "나이 : ". $_SESSION['age']."<br>";
        echo "회원등급 : ". $_SESSION['level']."<br>";
        echo "<html><input type='submit' value='로그아웃'></html>";
    }
}



?>
</form>
