<?php
    $title = "Заметки";
    require "block/start.php";
?>

<?php if($_COOKIE['auto'] == ""): ?>

<?php require "block/rrr.php"; ?>

<?php else: ?>

<div id="rt" class="but_nav">
    <button style="border-color:black;" onclick="new_zam()" class="but">Создать заметку</button>
</div><br><br><br>
<div id="hr"><hr></div>

<div id="all">

    <?php
        $log = $_COOKIE['auto'];

        $results = $mysql->query("SELECT * FROM `$log`");

        while($row = $results->fetch_assoc()){
            echo '<div class="ot_z"><div class="one asd"><b>Тема: </b><br>'.$row['tema']." </div><br><hr>";
            echo '<div class="two asd"><b>Описание: </b><br>'.$row['mess'].' </div><form action="real_ch.php" method="post"><input type="hidden" name="change" value="'.$row['id'].'"><input type="submit" class="four" name="qweasdrty" value="&#9998;"></form><form action="obrabotka/del.php" method="post"><input type="hidden" name = "deli" value="'.$row['id'].'"><input class="three" type="submit" name="del" value="&#128465;"></form></div>';
        }
    
    ?>




</div>







<?php endif ?>
<?php
    require "block/footer.php";
?>