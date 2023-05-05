function new_zam(){
    document.getElementById('txt').insertAdjacentHTML('beforeend', "<form action=\"obrabotka/newzam.php\" method=\"post\"><input type=\"text\"  placeholder=\"Тема\" class=\"izm1\" name=\"tema\"><br><br><textarea  placeholder=\"Описание\" class=\"izm2\" name=\"message\"></textarea><br><br><input value=\"Создать\" type=\"submit\" class=\"otp\"></form>");
    document.getElementById('rt').style.display = "none";
    document.getElementById('all').style.display = "none";
    document.getElementById('hr').style.display = "none";
}
var n = 1;