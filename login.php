<?php
    session_start();
    //先判斷管理員是否登入，有登入就導向至管理系統
    if(isset($_SESSION["admin"]))
        header("Location: manage.php");
?>
<?php
header('Content-type: text/html; charset=utf-8');
?>

<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=description content="">
    <meta name=author content="Wlogsky">
    <link rel=icon href="pic/icon.jpg">
    <title>Login Page</title>
    <link href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css rel=stylesheet>

    <body>
        <div class=container>
            <div style="width:40%; width:500px; margin:0 auto;">
                <form class=form-signin role=form method="POST">
                    <h2 class=form-signin-heading>Please sign in</h2>
                    <label for=inputaccount class=sr-only>Account</label> 
                    <input type=text id=inputaccount class=form-control placeholder="Account" required autofocus name="id"> 
                    <label for=inputPassword class=sr-only>Password</label> 
                    <input type=password id=inputPassword class=form-control placeholder=Password required name="passwd">
                    <input type="hidden" name="action" value="submit">
                    <button class="btn btn-lg btn-primary btn-block" type=submit >Sign in</button>
                </form>
            </div>
        </div>

        <?php
                    if($_POST["action"] == "submit")
                    {
                        $id = $_POST["id"];
                        $passwd = $_POST["passwd"];
                        if($id == "admin" && $passwd == "admin")
                        {
                            $_SESSION["admin"] = $id;
                            echo '<meta http-equiv="REFRESH" CONTENT="0;url=manage.php">';
                        }
                        else
                            echo "<script>alert('帳密輸入錯誤!')</script>";
                    }
        ?>

        <footer class=footer>
            </br><p style = "text-align:center">2016&copy; Wlogsky、Patato、Ryanooo </p></footer>
    </body>
</head>
