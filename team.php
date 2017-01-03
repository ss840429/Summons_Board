<?php
            //連接MySQL伺服器
            $link=mysql_connect("localhost", "root", "0000");
            if(!$link) die("Unable to connect MySQL:".mysql_error());
            mysql_select_db("pets") or die("No database.");
            //使用 UTF8 編碼
            mysql_query('SET CHARACTER SET UTF8;');
?>


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
</head>

<?php
header('Content-type: text/html; charset=utf-8');
?>


<body>
    <div class=container>
        <div class=masthead>
            <h3 class=text-muted>サモンズボード　データベース</h3>
            <div role=navigation>
                <ul class="nav nav-justified">
                    <li class=active><a href=home.php>Home</a></li>
                        <li><a href=search.php>図鑑</a></li>
                            <li><a href=team.php>Team</a></li>
                                <li><a href=download.php>Downloads</a></li>
                                    <li><a href=login.php>Manage</a></li>
                                        <li><a href=about.php>About</a></li></ul>
            </div>
        </div>
        <div class=jumbotron style="background-image:url('pic/kanban3.jpg');background-repeat:no-repeat;background-size:100% 100%">
            <h1>&nbsp;</h1>
            <p class=lead>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-lg btn-success" href='https://sb.gungho.jp/' role=button style="margin-bottom:-90px;margin-left:-90px">官方網站</a></p></div>
        
<?php
    if (isset($_POST['property']))
    {
        foreach ($_POST['property'] as $selectedval)
            $selected[$selectedval] = "checked";
    }
    if (isset($_POST['type1']))
    {
        foreach ($_POST['type1'] as $selectedval)
            $selected[$selectedval] = "checked";
    }
    if (isset($_POST['type2']))
    {
        foreach ($_POST['type2'] as $selectedval)
            $selected[$selectedval] = "checked";
    }
    if (isset($_POST['HP']))
    {
            $HP = $_POST['HP'];
    }
    if (isset($_POST['ATK']))
    {
            $atk = $_POST['ATK'];
    }
?>

		<div class=row>
			<div class=col-lg-6>
                <form method = "POST">
    				<h2>進階搜尋</h2>
    				<p>Type:</p>
    				<input type="checkbox" value="攻擊type" name="type1[]" <?php echo $selected['攻擊type'] ?>>攻擊 TYPE
    				<input type="checkbox" value="平衡type" name="type1[]" <?php echo $selected['平衡type'] ?>>平衡 TYPE
    				<input type="checkbox" value="HP type"  name="type1[]" <?php echo $selected['HP type'] ?>>HP TYPE
    				<br>
    				<input type="checkbox" value="強襲type" name="type2[]" <?php echo $selected['強襲type'] ?>>強襲 TYPE
    				<input type="checkbox" value="技能type" name="type2[]" <?php echo $selected['技能type'] ?>>技能TYPE
    				<input type="checkbox" value="反擊type" name="type2[]" <?php echo $selected['反擊type'] ?>>反擊TYPE
    				<input type="checkbox" value="輔助type" name="type2[]" <?php echo $selected['輔助type'] ?>>輔助TYPE
    				<input type="checkbox" value="防禦type" name="type2[]" <?php echo $selected['防禦type'] ?>>防禦TYPE
    				<br>
    				<br>
    				<p>屬性:</p>
    				<input type="checkbox" value="火" name="property[]" <?php echo $selected['火'] ?>>火屬
    				<input type="checkbox" value="水" name="property[]" <?php echo $selected['水'] ?>>水屬
    				<input type="checkbox" value="木" name="property[]" <?php echo $selected['木'] ?>>木屬
    				<input type="checkbox" value="光" name="property[]" <?php echo $selected['光'] ?>>光屬
    				<input type="checkbox" value="暗" name="property[]" <?php echo $selected['暗'] ?>>暗屬
    				<br>
    				<br>
    				<p>數值搜尋:</p>
    				<div>HP大於：<br><input type="number" min ="0" name="HP" value="<?php echo $HP ?>"></div>
                    <div>攻擊大於：<br><input type="number" min ="0" name="ATK" value="<?php echo $atk ?>"></div>
    				<br>
    				<br>
    				<p>排序方式</p>
    				<input type="radio" name="sort" value="PID" checked="">ID
                    <input type="radio" name="sort" value="HP">HP
                    <input type="radio" name="sort" value="ATK">攻

                    <input type="hidden" name="action" value="submit">
                    <input type="submit" value="查詢">
                </form>
			</div>
            <div class=col-lg-6>
                <h2>搜尋結果</h2><h5>點擊圖片可看詳細資料</h5>
                <?php
                if($_POST["action"] == "submit")
                {
                    $sql_quest = "SELECT ID FROM pet WHERE 1";

                    $tmp = $_POST ["type1"] ;
                    if( count($tmp) != 0 )
                    {
                        $con= implode("' OR Type='", $tmp ) ;
                        $sql_quest .= (" AND (Type='".$con."')") ;    
                    }

                    $tmp = $_POST ["type2"] ;
                    if( count($tmp) != 0 )
                    {
                        $con= implode("' OR Type2='", $tmp ) ;
                        $sql_quest .= (" AND (Type2='".$con."')") ;    
                    }

                    $tmp = $_POST ["property"] ;
                    $flag += count($tmp) ;
                    if( count($tmp) != 0 )
                    {
                        $con= implode("' OR Property='", $tmp ) ;
                        $sql_quest .= (" AND (Property='".$con."')") ;    
                    }

                    $tmp = $_POST ["HP"] ;
                    if ($tmp != '')
                    $sql_quest .= (" AND HP > ".$tmp." ") ;

                    $tmp = $_POST ["ATK"] ;
                    if ($tmp != '')
                    $sql_quest .= (" AND Attack > ".$tmp." ") ;
            

                    if($_POST["sort"] == 'PID') $sql_quest .= " ORDER BY ID;" ;
                    else if($_POST["sort"] == 'HP') $sql_quest .= " ORDER BY HP;" ;
                    else if($_POST["sort"] == 'ATK') $sql_quest .= " ORDER BY Attack;" ;

                    //echo $sql_quest ;

                    $result = mysql_query($sql_quest);
                    while( $sin = mysql_fetch_object($result) ){
                        echo '<td><a href=search.php?id='.$sin->ID.'&action=submit><img alt="《召喚圖板》寵物 '.$sin->ID.'" src="pic/'.$sin->ID.'.gif" style="height: 60px;" /></a></td>';
                    }

                }
                mysql_close ($link);
                ?>
            </div>
        </div>
    </div>
    <script src=/Scripts/AssetsBS3/ie10-viewport-bug-workaround.js></script>
    <footer class=footer>
         </br><p style = "text-align:center">2016&copy; Wlogsky、Patato、Ryanooo </p></footer>
</body>
</html>
