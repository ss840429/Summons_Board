<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=description content="">
    <meta name=author content="Wlogsky">
    <link rel=icon href="pic/icon.jpg">
    <title>サモンズボード</title>
    <link href=https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css rel=stylesheet>

    <script src="https://www.gstatic.com/firebasejs/3.5.2/firebase.js"></script>    <!-- FireBase -->
    <script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script src='https://cdn.firebase.com/js/client/2.1.1/firebase.js'></script>
    <style type="text/css">
        * { font-family: 'Microsoft JhengHei'; }
    </style>


</head>
<body>
    <div class='container'>
        <div class='masthead'>
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
        <div class='jumbotron' style="background-image:url('pic/kanban3.jpg');background-repeat:no-repeat;background-size:100% 100%">
            <h1>&nbsp;</h1>
            <p class=lead>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-lg btn-success" href='https://sb.gungho.jp/' role=button style="margin-bottom:-90px;margin-left:-90px">官方網站</a></p></p>
        </div>

        <div class=row>
            <div class=col-lg-6>

                <div id="login">
                    <label for="id">ID :&nbsp;</label>
                    <input type="text" id="id">
                    <button id="submit" type=button>Search</button>
                    &nbsp;
                    <div id='datatable'></div>

                        <script>
                            var pic = 'pic/';
                            var db = new Firebase('https://summonsboard-2c5f0.firebaseio.com/') ;
                            var LA = [];

                            var p = new Promise( done => {
                                db.child('pet').orderByKey().once('value', snap => {

                                    snap.forEach( e => {
                                        LA.push( {
                                            ID: e.val().ID,
                                            name: e.val().name
                                        });
                                    });

                                    done();
                                });
                            });

                            p.then( () => {

                                var content = `<table style="text-align: center; "border="1" width="400"><tr><td class="bodyText">
                                    <table width="400" border="1">
                                        <tr>
                                            <td>ID</td>
                                            <td>Name</td>
                                            <td>picture</td>
                                        </tr>`; 

                                LA.forEach((L, i) => {
                                    content += `<tr height="70">
                                        <td>${L.ID}</td>
                                        <td>${L.name}</td>
                                        <td>
                                            <a href= '#' onclick=TouchPic(${L.ID}) >
                                                <img
                                                    alt="${L.name}"
                                                    src="${pic}${L.ID}.gif"
                                                    style="height: 60px;" />
                                            </a>
                                        </td>
                                    </tr>`;

                                });                                

                                content += '</table>';

                                document.querySelector('#datatable').innerHTML = content;
                            
                            } );

                        </script>
                </div>
            </div>

            <div class='col-lg-6'>
                <table align="center" border="2" cellpadding="0" cellspacing="0" style="width: 500px;" width="360">
                    <colgroup><col span="5" style="text-align: center;" /></colgroup>
                    <tbody id='info'>
                        <script>
                            $("#submit").click( () =>{
                                var input_id = $("#id").value ;

                                if( input_id.length <= 0 ) console.log( "No Data input" ) ;
                                else{
                                    var content ;
                                    db.child('pet/'+input_id).once('value', e => {      // Get info of pet

                                        var info = e.val() ;
                                        if( info == null ) 
                                        {
                                            content = `找不到此寵物，請重新輸入ID查詢`;
                                            document.querySelector('#info').innerHTML = content;
                                            return ;
                                        }

                                        content =  `<tr height="23">
                                                        <td colspan="5" height="23" style="height:23px; width:360px; text-align:center;">
                                                        <span style="font-size:16px;">寵物資訊</span></td>
                                                    </tr>
                                                    <tr height="23">
                                                        <td height="23" style="height: 23px; width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">No.</span></td>
                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">${info.ID}</span></td>
                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">名稱</span></td>
                                                        <td colspan="2" style="width: 144px; text-align: center;">
                                                        <span style="font-size:16px;">${info.name}</span></td>
                                                    </tr>
                                                    <tr height="23">
                                                        <td height="23" style="height: 23px; width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">属性</span></td>
                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">${info.Property}</span></td>
                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">稀有度</span></td>
                                                        <td colspan="2" style="width: 144px; text-align: center;">
                                                        <span style="font-size:16px;">` ;

                                        for( var i = 0 ; i < info.Star ; ++i ) content += '☆' ;

                                        content += `</span></td>
                                                    </tr>
                                                    <tr height="23">
                                                        <td height="23" style="height: 23px; width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">Lv</span></td>
                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">99</span></td>
                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">COST</span></td>
                                                        <td colspan="2" style="width: 144px; text-align: center;">
                                                        <span style="font-size:16px;">${info.Cost}</span></td>
                                                    </tr>
                                                    <tr height="23">
                                                        <td height="23" style="height: 23px; width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">屬性一</span></td>
                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">${info.Type}
                                                        <img alt="《召喚圖板》寵物 ${info.Type}" src="${pic}${info.Type}.PNG" style="width:20px; height:20px;"/>
                                                        </span></td>
                                            
                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">最大HP</span></td>
                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">${info.HP}</span></td>
                                                        <td rowspan="2" style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">
                                                        <img alt="《召喚圖板》寵物 ${info.ID}" src="${pic}${info.ID}.gif" style="height:60px;"/>
                                                        </span></td>
                                                    </tr>`;


                                        content += `<tr height="23">
                                                        <td height="23" style="height: 23px; width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">屬性二</span></td>
                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">${info.Type2}
                                                        <img alt="《召喚圖板》寵物 ${info.Type2}" src="${pic}${info.Type2}.PNG" style="width: 20px; height: 20px;" />
                                                        </span></td>

                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">最大攻撃</span></td>
                                                        <td style="width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">${info.Attack}&times;3或4回</span></td>
                                                    </tr>

                                                    <tr height="23">
                                                        <td colspan="5" height="23" style="height: 23px; width: 360px; text-align: center;">
                                                        <span style="font-size:16px;">技能</span></td>
                                                    </tr>`;

                                                    document.querySelector('#info').innerHTML = content;

                                    // Skill Part 


                                            db.child('description/active/'+info.Active).once('value', as => {

                                            content  = `<tr height="23">
                                                            <td height="55" rowspan="2" style="height:55px;width:72px;text-align:center;">
                                                            <span style="font-size:16px;">主動技能</span></td>
                                                            <td colspan="3" style="text-align: center;">
                                                            <span style="font-size:16px;">${info.Active}</span></td>
                                                            <td style="width: 72px; text-align: center;">
                                                            <span style="font-size:16px;">回數：${as.val().Round}</span></td>
                                                            </tr>
                                                        <tr height="32">
                                                            <td colspan="4" height="32" style="height:32px;width:288px;text-align: center;">
                                                            <span style="font-size:16px;">${as.val().detail}</span></td>
                                                        </tr>`;

                                                        document.querySelector('#info').innerHTML += content;
                                            
                                            })

                                            db.child('description/leader/'+info.Leader).once('value' , ls =>{

                                            content  = `</tr>
                                                        <tr height="23">
                                                        <td height="55" rowspan="2" style="height: 55px; width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">隊長技能</span></td>
                                                        <td colspan="4" style="text-align: center;">
                                                        <span style="font-size:16px;">${info.Leader}</span></td>
                                                        </tr>
                                                        <tr height="32">
                                                        <td colspan="4" height="32" style="height: 32px; width: 288px; text-align: center;">
                                                        <span style="font-size: 16px;">${ls.val().detail}</span></td>
                                                        </tr>` ;

                                                        document.querySelector('#info').innerHTML += content;
                                            })
                                        

                                            content =  `<tr height="23">
                                                        <td height="92" rowspan="2" style="height: 46px; width: 72px; text-align: center;">
                                                        <span style="font-size:16px;">能力</span></td>
                                                        <td colspan="4" style="text-align: center;">
                                                        <span style="font-size:16px;">${info.SA}`;


                                                        if ( true /* SA != null */ ) {
                                                            content += `<img alt="《召喚圖板》寵物 ${info.SA}" src="${pic}${info.SA}.PNG" style="width: 20px; height: 20px;" />`;
                                                        }

                                            content += `</span></td></tr>` ;

                                            content += `<tr height="23">
                                                        <td colspan="4" style="text-align: center;">
                                                        <span style="font-size:16px;">${info.SA2}`;


                                                        if ( true /* SA != null */ ) {
                                                            content += `<img alt="《召喚圖板》寵物 ${info.SA2}" src="${pic}${info.SA2}.PNG" style="width: 20px; height: 20px;" />`;
                                                        }

                                            content += `</span></td></tr>` ;

                                            document.querySelector('#info').innerHTML += content ;                                          
                                    })
                                }
                            });
                        </script>               
                    </tbody>
                </table>
            </div>
        </div>  
    </div>

<script type="text/javascript">
    function TouchPic(a){
        $('#id').val(a);
        $('#submit').trigger('click');
    }

    var strUrl = location.search;
    var getPara, ParaVal;
    var aryPara = [];

    if (strUrl.indexOf("?") != -1) {
        var getSearch = strUrl.split("?");
        getPara = getSearch[1].split("&");
        for (i = 0; i < getPara.length; i++) {
            ParaVal = getPara[i].split("=");
            aryPara.push(ParaVal[0]);
            aryPara[ParaVal[0]] = ParaVal[1];
        }
        // console.log(aryPara['id']);
    
        TouchPic(aryPara['id'])
    }

</script>>

    <footer class=footer>
         </br><p style = "text-align:center">2016-2017&copy; Wlogsky </p></footer>
</body>
</html>


