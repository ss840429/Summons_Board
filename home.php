

<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=description content="">
    <meta name=author content="">
    <link rel=icon href=/Content/AssetsBS3/img/favicon.ico>
    <title>サモンズボード</title>
    <link href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css rel=stylesheet>
    <link href=/Content/AssetsBS3/examples/justified-nav.css rel=stylesheet>
    <!--[if lt IE 9]><script src=~/Scripts/AssetsBS3/ie8-responsive-file-warning.js></script><![endif]-->
    <script src=/Scripts/AssetsBS3/ie-emulation-modes-warning.js></script>
    <!--[if lt IE 9]><script src=https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js></script><script src=https://oss.maxcdn.com/respond/1.4.2/respond.min.js></script><![endif]-->
    <style type="text/css">
    * {
        font-family: 'Microsoft JhengHei';
    }
    </style>

<?php
header('Content-type: text/html; charset=utf-8');
?>


</head>
<body>
    <div class=container>
        <div class=masthead>
            <h3 class=text-muted>サモンズボード　データベース</h3>
            <div role=navigation>
                <ul class="nav nav-justified">
                    <li class=active><a href=home.php>Home</a></li>
                        <li><a href=search.php>図鑑</a></li>
                            <li><a href=team.php>Team</a></li>
                                <li><a href='download.php'>Downloads</a></li>
                                    <li><a href=login.php>Manage</a></li>
                                        <li><a href=about.php>About</a></li></ul>
            </div>
        </div>
        <div class=jumbotron style="background-image:url('pic/kanban4.png');background-repeat:no-repeat;background-size:100% 100%">
            <h1>&nbsp;</h1>
            <p class=lead>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-lg btn-success" href='https://sb.gungho.jp/' role=button style="margin-bottom:-90px;margin-left:-90px">官方網站</a></p></div>
        <div class=row>
            <div class=col-lg-5>
                <h2>Welcome!</h2>
                <p class=text-danger>這是我們的資料庫期末專題，是一個召喚圖板圖鑑的查詢系統。</p>
                    <p>遊戲中大量的寵物資訊，對玩家而言是沒有辦法在短時間內快速熟識，也無法同時對多種寵物的能力進行分析比較。也因為目前的資料有許多都是日文資料，對玩家來說並不是相當便利。</br></p>
                    <p>因此我們希望能整理各種能力的關聯性，並建立能快速查詢各種寵物資訊的中文資料庫，使玩家能夠清楚地比較每種寵物進而做出明智的選擇。</p>
                        <p><a class="btn btn-primary" href=search.php role=button>Get Started &raquo;</a></p>
            </div>
            <div class=col-lg-6>
                <h2>News</h2>
                <?php  
                //擷取官方網頁資料
                $text=file_get_contents('http://sb.gungho.jp/member/');      
 
                preg_match_all('#src[^>]*#', $text, $match);      

                //第一筆
                preg_match('/member[^>]*/', $match[0][4], $match2);     
                echo   '<p><img src= "http://sb.gungho.jp/'."$match2[0]".'></p>';
                //第二筆
                preg_match('/member[^>]*/', $match[0][5], $match2); 
                echo   '<p><img src= "http://sb.gungho.jp/'."$match2[0]".'></p>';
                //第三筆
                //preg_match('/member[^>]*/', $match[0][5], $match2); 
                //echo   '<p><img src= "http://sb.gungho.jp/'."$match2[0]".'></p>';
 
                ?>  
                <!-- <img src='pic/new.jpg' height="100vh" >
                <img src='pic/new1.jpg' height="100vh"> -->
            </div>

        </div>
    </div>
    <script src=/Scripts/AssetsBS3/ie10-viewport-bug-workaround.js></script>
    <footer class=footer>
         </br><p style = "text-align:center">2016&copy; Wlogsky、Patato、Ryanooo </p></footer>
</body>
</html>
