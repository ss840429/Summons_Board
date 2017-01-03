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
        <div class=jumbotron style="background-image:url('pic/kanban2.jpg');background-repeat:no-repeat;background-size:100% 100%">
            <h1>&nbsp;</h1>
            <p class=lead>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-lg btn-success" href='https://sb.gungho.jp/' role=button style="margin-bottom:-90px;margin-left:-90px">官方網站</a>
            </p>
        </div>

        <div class=row>
            <div class=col-lg-3>
                <a href='https://play.google.com/store/apps/details?id=jp.gungho.bm'>
                <img alt='Google Play下載' height='68' id='Image1_img' src='pic/googleplay.png' width='198' />
                </a>
                <a href='https://itunes.apple.com/jp/app/summons-board/id778344884?l=jp&mt=8'>
                <img alt='Apple Store下載' height='70' id='Image1_img' src='pic/appstore.png' width='200' />
                </a>
                </br></br>
                <img src='pic/icon.png' height="150vh" />
            </div>
            
            <div class=col-lg-9>
                4×4マスの召喚盤の上で、モンスターを操って勝利をつかめ！キミの頭脳を熱くする、思考の戦略バトル「サモンズボード」 </br>
                ------------------------------------------------------------------------------------------------------------------------------ </br>
                「サモンズボード」のダウンロードは無料！ 一部有料コンテンツもご利用いただけますが、最後まで無料でお楽しみいただくことが可能です。 </br>
                ▼基本ルールはターン制バトル！ </br>
                ①モンスターをスライド操作で移動させよう！  </br>
                &nbsp;→モンスターごとに移動できる方向が決まっているぞ。 </br>
                ②上手に敵に近づき攻撃しよう！  </br>
                &nbsp;→モンスターの移動出来る方向がそのまま攻撃できる方向だぞ！動かしたモンスター以外にも攻撃できるモンスターがいたら一斉に攻撃するぞ！ </br>
                ③同時に沢山の味方モンスターで攻撃しよう！ </br>
                &nbsp;→1度に沢山の味方モンスターで同じモンスターを攻撃すると「コンボ攻撃」が発動！1体で攻撃するより沢山のダメージを与えられるぞ！ </br>
                ▼獲得したモンスターで自分なりのチームを組もう！  </br>
                敵を倒すとポーンをゲット！ダンジョンをクリアするとモンスターが仲間になるぞ！  </br>
                移動攻撃方向やスキルなどモンスターによってそれぞれ違うモンスターの能力を見極め、あなただけの最強チームを編成しよう！  </br> </br>

                ▼モンスター育成  </br>
                モンスターを育成するとモンスターがパワーアップ！  </br>
                さらにモンスターを育成すると進化するモンスターも…！  </br>
                強力なモンスターを育ててバトルを有利に進めよう！  </br> </br>

                ▼一致団結ギルド結成！  </br>
                ゲーム内で知り合った友達とギルドを結成！  </br>
                一緒にギルドを育てるとギルドメンバー全員のモンスターが強くなるよ！  </br>
                友達と一緒にギルドを育てて手強い敵モンスターをやっつけよう！  </br> </br>

                ▼ランバトで自分の力を試しちゃおう！ </br> 
                自分の育てたモンスターでお手軽ランキングバトル勝負ができるよ！  </br>
                ランキングバトルの相手はなんとあなたと同じ冒険者！  </br>
                育成した自慢のモンスターで簡単腕試しをしちゃおう！ 

            </div>
        </div>
    </div>
    
    <script src=/Scripts/AssetsBS3/ie10-viewport-bug-workaround.js></script>

    <footer class=footer>
            
             </br><p style = "text-align:center">2016&copy; Wlogsky、Patato、Ryanooo </p></footer>
</body>
</html>
