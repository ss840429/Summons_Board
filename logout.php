<?php
    session_start();
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