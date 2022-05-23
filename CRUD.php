<?php
// 設定資料庫主機
$db_host = "localhost";
$db_username = "alvina";
$db_password = "host";
$db_name = "class";
//連線資料庫
$db_link = @new mysqli($db_host,$db_username, $db_password,$db_name);
//錯誤處理
if ($db_link->connect_error != ""){
    echo"資料庫連接失敗！";
}else{
    //設定字元集與編碼
    $db_link->query("SET NAME'utf8'");
}
