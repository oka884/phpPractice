<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>オブジェクトにしないとメソッドが使えない話・DateTimeクラス編</h1>

    <p>PHPに既にあるクラス DateTime を使って日付を取得する動作を見てみましょう。<br>
    この操作はMySQLからデータを取得する操作とそっくりなので、とても大切です。</p>

    <?php

    // 既存の DateTime というクラスに定義されている
    // ->format という時間を取得するメソッドを使うために、オブジェクトをまず作っています。

    $myDateTime100 = new DateTime();

    echo $myDateTime100->format( "Y-m-d h:i" );   // 年-月-日 時:分 で表示してくれる

    ?>

    <br><br>
    <p>オブジェクトを作る際にタイムゾーンの情報を引数で渡すとよりそっくりになります。</p>

    <?php

    $myDateTime200 = new DateTime( "America/New_York" );

    echo $myDateTime200->format( "Y-m-d h:i" );

    ?>

    <br><br>
    <p>メソッドを使うためにオブジェクトを作る。しつこいくらいですが抑えておきましょう。</p>






    <br><br><br><br><br>

    <!-- <p>完全に余談ですが、3_2.php でやったのと同じで date()関数 というものを使うと関数で同じことができます。</p> -->

    <?php
    //echo date( "Y-m-d h:i" );    //一行
    ?>


  </body>
</html>
