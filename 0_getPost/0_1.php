<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>POSTで送られる配列を見てみる</h1>

    <br>

    <form action="0_1.php" method="post">
      <label><input type="text" name="aKotoba100">あ行の言葉</label><br>
      <label><input type="text" name="kKotoba150">か行の言葉</label><br>
      <label><input type="text" name="sKotoba1250">さ行の言葉</label><br>
      <label><input type="text" name="tKotoba6000">た行の言葉</label><br>
      <input type="submit" value="送信">
    </form>

    <br><br><br>


    <p>var_dump() 関数での配列全体の表示</p>

    <?php
    var_dump( $_REQUEST );
    ?>


    <br>
    <p>echo で配列の中の一件を見てみる</p>
    <?php
    echo $_REQUEST["aKotoba100"];
    ?>


  </body>
</html>
