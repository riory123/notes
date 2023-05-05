<?php
    
    $mysql = new mysqli("localhost", "root", "", "zametki");
    $mysql->query("SET NAME utf8");

    $log = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $name_use = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $passw = $_POST['pass'];



    if(strlen($log)<4 || strlen($log)>20){
        header("Location: index.php");
        $ll = "*Недопустимая длина логина";
        setcookie("no_log",$ll,time()+4);
        exit;
    }

    if(strlen($name_use)<2 || strlen($name_use)>15){
        header("Location: index.php");
        $nn = "*Недопустимая длина имени";
        setcookie("no_name",$nn,time()+4);
        exit;
    }

    if(strlen($passw)<5 || strlen($passw)>31){
        header("Location: index.php");
        $pp = "*Недопустимая длина пароля";
        setcookie("no_pass",$pp,time()+4);
        exit;
    }

    $results = $mysql->query("SELECT * FROM `users` WHERE `login` = '$log'");

    if($results->num_rows == 1){
        $yes = "*Такой пользователь уже существует";
        setcookie("yes",$yes,time()+4);
        header("Location: index.php");
        exit;
    }

    $passw = md5($passw."erbherbew234");


    $mysql->query("INSERT INTO `users` (`login`,`name`,`pass`) VALUES('$log','$name_use', '$passw')");

    $mysql->query("CREATE TABLE `$log` (

        id INT(5) NOT NULL AUTO_INCREMENT,
        tema VARCHAR(50) NOT NULL,
        mess TEXT NOT NULL,
        PRIMARY KEY(id)

    )");



    $mysql->close();
    header("Location: zam.php");

?>