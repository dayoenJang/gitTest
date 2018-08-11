<table name="chatting">
    <?php
    if(!empty($result)){
        foreach ($result as $key => $value)
        {
            echo "<tr><td>";
            echo $value['name'];
            echo ") </td><td>";
            echo $value['contents'];
            echo "</td></tr><br>";
        }
    }
    ?>
</table>






