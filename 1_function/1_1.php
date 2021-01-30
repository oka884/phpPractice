<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>関数の利用</h1>

    <p>関数は自分がさせたい計算を予め入れておき、その後いつでも使えるようにするものです。</p>

    <p>例.1</p>
    <?php               //// num100など大きな数字での名付けは、その名付けが任意だとわかりやすいかなとそうしてます。
    function keisan( $num100, $num110, $num120){
      $ans200 = (($num100 - $num110) * $num120);
      return $ans200;
    }

    echo keisan( 3, 7, 10);   //// num100-num110*num120（ 3-7*10 ）の計算の結果が表示される。
    echo "<br>";
    echo keisan( 10, 2, 13);   //// num100-num110*num120（ 10-2*13 ）の計算の結果が表示される。
    ?>


    <br><br>
    <p>関数の中でif文などを使い条件分岐させることができる点も、関数が必要とされる理由です。</p>

    <p>例.2</p>
    <?php
    //10より大きければ10を、1~10の間ならその数を、それ以外(マイナスや文字など)なら1を返す関数です。
    function kirisage( $num250 ){
      if( $num250 > 10 ){
        return 10;
      } elseif ( $num250 >= 1 ){
        return $num250;
      } else {
        return 1;
      }
    }

    echo kirisage( 78462 );   //// 10より大きい数字を入れているので10が表示される。
    ?>


    <br><br>
    <p>例.2の操作になんの意味があるのか疑問に思うかもしれませんが、次のように使えます。</p>

    <p>例.3</p>
    <table border="1">
      <tr>
        <th>行番号</th>
        <th>列</th>
      </tr>
      <?php    //// ここでは恐ろしい回数の繰り返し処理を10回までに留めるような使い方をしています。
      for( $i = 0 ; $i < kirisage( 961485 ) ; $i++ ){
        ?>
        <tr>
          <td><?=$i+1?></td>
          <td></td>
        </tr>
        <?php
      }
      ?>
    </table>


  </body>
</html>
