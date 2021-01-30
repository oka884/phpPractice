<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>配列と連想配列の比較</h1>

    <?php
    /// 配列の作成  //1_1.phpと同じ配列と、そこでは値に入れたものを添字にした配列を作っています。
    $alphabetA = array( "a", array( "b-a", "b-b", "b-c", "b-d"), "c", "d", "e");

    $alphabetB = array( "a"=>"あめんぼ", "b"=>array( "b-a"=>"ばなな", "b-b"=>"ばたばた", "b-c"=>"きげんぜん", "b-d"=>"ばどみんとん"), "c"=>"かめら", "d"=>"どらやき", "e"=>"えど");
    ?>
    <p>作った配列の確認</p>

    <p>ふつうの配列</p>
    <?php
    var_dump($alphabetA);    /// 配列を表示させる
    ?>

    <br>
    <p>連想配列</p>
    <?php
    var_dump($alphabetB);    /// 配列を表示させる
    ?>

    <br>
    <p>1_1.phpでは値に入れたものを添字にして配列を作っています。</p>


    <br>
    <p>echoでの表示</p>
    <?php
    echo $alphabetB["b"]["b-d"];   /// echo でそのひとつを指定して表示させる
    ?>



  </body>
</html>
