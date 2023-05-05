<?php
    $title = "Изменение заметки";
    require "block/start.php";
?>
<?php 


$id = $_POST['change'];
$log = $_COOKIE['auto'];

$results = $mysql->query("SELECT * FROM `$log` WHERE `id` = '$id'");

$info1 = $results->fetch_assoc();


?>



<form action="obrabotka/change.php" method="post">

    <input class="izm1" type="text" name="ism1" value="<?php echo $info1['tema'] ?>"><br><br><br>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <textarea class="izm2" type="text" name="ism2"><?php echo $info1['mess'] ?></textarea><br><br>
    <input class="otp" type="submit" value="Сохранить изменения">

</form>



<?php
    require "block/footer.php"
?>