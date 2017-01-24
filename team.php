
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=description content="">
    <meta name=author content="">
    <link rel=icon href=/Content/AssetsBS3/img/favicon.ico>
    <title>サモンズボード</title>
    <link href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css rel=stylesheet>

    <script src="https://www.gstatic.com/firebasejs/3.5.2/firebase.js"></script>    <!-- FireBase -->
    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src='https://cdn.firebase.com/js/client/2.1.1/firebase.js'></script>

    <style type="text/css">
    * {
        font-family: 'Microsoft JhengHei';
    }
    </style>
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
                    <li><a href=download.php>Downloads</a></li>
                    <li><a href=login.php>Manage</a></li>
                    <li><a href=about.php>About</a></li>
                </ul>
            </div>
        </div>
        <div class=jumbotron style="background-image:url('pic/kanban3.jpg');background-repeat:no-repeat;background-size:100% 100%">
            <h1>&nbsp;</h1>
            <p class=lead>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-lg btn-success" href='https://sb.gungho.jp/' role=button style="margin-bottom:-90px;margin-left:-90px">官方網站</a></p></div>
        

		<div class=row>
			<div class=col-lg-6>
				<h2>進階搜尋</h2>
				<p>Type:</p>
				<input type="checkbox" value="攻擊type" name="Main_Type" >攻擊 TYPE
				<input type="checkbox" value="平衡type" name="Main_Type">平衡 TYPE
				<input type="checkbox" value="HP type" name="Main_Type">HP TYPE
				<br>
				<input type="checkbox" value="強襲type" name="Sec_Type">強襲 TYPE
				<input type="checkbox" value="技能type" name="Sec_Type">技能TYPE
				<input type="checkbox" value="反擊type" name="Sec_Type">反擊TYPE
				<input type="checkbox" value="輔助type" name="Sec_Type">輔助TYPE
				<input type="checkbox" value="防禦type" name="Sec_Type">防禦TYPE
				<br>
				<br>
				<p>屬性:</p>
				<input type="checkbox" value="火" name="Type">火屬
				<input type="checkbox" value="水" name="Type">水屬
				<input type="checkbox" value="木" name="Type" checked>木屬
				<input type="checkbox" value="光" name="Type" checked>光屬
				<input type="checkbox" value="暗" name="Type">暗屬
				<br>
				<br>
				<p>數值搜尋:</p>
				<div>HP大於：<br><input type="number" min ="0" id="HP" value="0"></div>
                <div>攻擊大於：<br><input type="number" min ="0" id="ATK" value="0"></div>
				<br>
				<br>
				<p>排序方式</p>
				<input type="radio" name="sort" value="ID" checked="">ID
                <input type="radio" name="sort" value="HP">HP
                <input type="radio" name="sort" value="Attack">攻

                <button id="submit">查詢</button>
			</div>
            <div class=col-lg-6>
                <h2>搜尋結果</h2><h5>點擊圖片可看詳細資料</h5>
                <div id='datatable'></div>

                <script>
                    var db = new Firebase('https://summonsboard-2c5f0.firebaseio.com/') ;
                    var result = []

                    $('#submit').click( () => {
                        // var p = new Promise( done => {

                            var orderKey = $('input[name=sort]:checked').val();
                            var orderdb = orderKey == 'ID' ? db.child('pet').orderByKey() : db.child('pet').orderByChild(orderKey, 'DESC');

                            orderdb.once('value', snap => {

                                snap.forEach( e => {
                                    console.log(e.val());
                                });    
                                    $('input:checkbox[name=Main_Type]:checked').each( (i, item) => { 
                                        console.log($(item).val());
                                    });

                                    $('input:checkbox[name=Sec_Type]:checked').each( (i, item) => { 
                                        console.log($(item).val());
                                    });

                                    $('input:checkbox[name=Type]:checked').each( (i, item) => { 
                                        console.log($(item).val());
                                    });

                                    var hpLimit  = $('#HP').val();
                                    var atkLimit = $('#ATK').val();


                                    console.log(hpLimit, atkLimit);

                                // });

                                // done();
                            });

                        // });


                    });



                </script>   

                <!-- <?php
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
                ?> -->
            </div>
        </div>
    </div>
    <script src=/Scripts/AssetsBS3/ie10-viewport-bug-workaround.js></script>
    <footer class=footer>
         </br><p style = "text-align:center">2016&copy; Wlogsky、Patato、Ryanooo </p></footer>
</body>
</html>
