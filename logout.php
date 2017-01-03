<?php
    session_start();
    //先判斷管理員是否登入，有登入就導向至管理系統
    if(isset($_SESSION["admin"]))
    {
        unset($_SESSION["admin"]);
        header("Location:home.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登出中......</title>
</head>
<body>

</body>
</html>