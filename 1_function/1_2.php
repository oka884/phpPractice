<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>formからの入力を関数へ入れてみる</h1>


    <p>例.3でやった操作と同じことをformから入力を受け取る形でやってみましょう。</p>

    <p>例.4</p>

    <?php
    //まず同じ関数を作っておきます。
    function kirisage( $num300 ){
      if( $num300 > 10 ){
        return 10;
      } elseif ( $num300 >= 1 ){
        return $num300;
      } else {
        return 1;
      }
    }
    ?>

    <!-- htmlで書くformです。 -->
    <form action="1_2.php" method="post">
      <input type="text" name="hogeNumber350">
      <input type="submit" value="確定">
    </form>



    <?php  //// エラー回避のために関数が存在するかどうかを確認しています。
    if ( isset( $_REQUEST["hogeNumber350"] )){

      //// formから送られてきたpostを変数に代入します。
      $receiveNumber400 = $_REQUEST["hogeNumber350"];
      ?>

      <br>
      <table border="1">
        <tr>
          <th>行番号</th>
          <th>列</th>
        </tr>
        <?php    //// 入力内容がどのようなものでも、1～10回の繰り返しになるようにします。
        for( $i = 0 ; $i < kirisage( $receiveNumber400 ) ; $i++ ){
          ?>
          <tr>
            <td><?=$i+1?></td>
            <td></td>
          </tr>
          <?php
        }
        ?>
      </table>
      <?php
    } else { ?>
      <p>入力されていません。</p>
      <?php
    }
    ?>

  </body>
</html>
