<html>
<form action="Page_login_result.php" method="post">
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

            /*회원가입 틀*/
            .my-bodybox {
                margin: auto;
                border: 1px solid;
                padding: 10px;
                width: 800px;
                height: 200px;
                letter-spacing: 2px;
                text-align: center;
            }

            /* bar */
            .p-box {
                line-height: 1px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
    <div class='my-box'>
        <h1 align="center">"Jangdayoen-_-"</h1>
        <hr>
        <p align='right' class='p-box' onclick="move()">login</p>
        <hr>

        <div class="my-bodybox"><br>
            id<input type="text" name="id"><br><br>
            PW<input type="text" name="PassWd"><br><br>
            Name<input type="text" name="Name"><br><br>
            age<input type="text" name="age"><br><br>
            <input type="submit" value="가입">
        </div>

    </div>
    </body>
</form>
</html>
<?php

?>