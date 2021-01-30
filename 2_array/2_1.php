<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>配列への追加と上書き</h1>

    <?php
    /// 配列の作成
    $alphabet = array( "a", array( "b-a", "b-b", "b-c", "b-d"), "c", "d", "e");
    ?>
    <p>作った配列の確認</p>
    <?php
    var_dump($alphabet);    /// 配列を表示させる
    ?>


    <?php
    /// ここから配列への操作。 コメントアウトをひとつひとつ取って確認できる。


    /// 配列への追加
    $alphabet[] = 100;
//     $alphabet[1][] = 150;


    /// 配列への上書き
//     $alphabet[3] = 200;
//     $alphabet[1][2] = 250;

//     $alphabet[1] = 300;
//     $alphabet = 350;    /// ←配列ではなくなる。 var_dump() 関数では表示されない。

//     $alphabet[1] = [400];
//     $alphabet = [450];
    ?>


	<p>操作した後の配列の確認</p>
    <?php
    var_dump($alphabet);    /// 配列を表示させる
    ?>

  </body>
</html>
