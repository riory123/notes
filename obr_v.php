<?php
    
    $mysql = new mysqli("localhost", "root", "", "zametki");
    $mysql->query("SET NAME utf8");

    
    $log_u = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];

    $results = $mysql->query("SELECT * FROM `users` WHERE `login` = '$log_u'");

    if($results->num_rows == 0){
        $lv = "*Такого пользователя не существует";
        setcookie("lv",$lv,time()+4);
        header("Location: index.php");
        exit;
    }

    $pass = md5($pass."erbherbew234");

    $p = $results->fetch_assoc();

    if($p['pass'] == $pass){
        header("Location: index.php");
        setcookie("auto",$log_u,time()+14400,"/");
    } else {
        $np = "*Неверный пароль";
        setcookie("np",$np,time()+4);
        header("Location: index.php");
        exit;
    }


    $mysql->close();

?>