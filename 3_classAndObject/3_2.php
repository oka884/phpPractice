<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>クラスと関数を比較しクラスの特徴を掴む</h1>

    <p>関数と比較することで、クラスはオブジェクトを作らないと使えない特徴を掴みましょう。</p>
    <p>底辺が13、高さが7の同じ三角形の面積をクラスと関数とで求めてみます。</p>
    <?php

    //// まずはクラスの定義から
    class Triangle10 {

      private $base20;
      private $height30;

      // コンストラクタ
      public function __construct( $hoge40, $hoge45 ) {
        $this->base20 = $hoge40;
        $this->height30 = $hoge45;
      }

      // 計算部分
      public function ansArea(){
        $ans50 = (( $this->base20 * $this->height30 ) / 2 );
        return $ans50;
      }
    }    //// クラスの定義ここまで


    ///// 次に関数を作ります
    function triangleArea( $num60 , $num65 ){
      $ans70 = (( $num60 * $num65 ) / 2 );
      return $ans70;
    }
    ?>



    <br>
    <p>クラスのほうが準備に時間がかかるのは置いておいて、ここで見るべきなのは次です。</p>

    <p>まずはクラスとオブジェクトを使って面積を求めます。</p>

    <?php
    $triangle150 = new Triangle10( 13, 7 );
    echo $triangle150->ansArea();
    ?>

    <br><br>
    <p>次に関数を使って求めます。</p>

    <?php
    echo triangleArea( 13 , 7 );    // 一行
    ?>

    <br><br>
    <p>メソッドを使うためにオブジェクトを作るというこのよくわからない操作の感覚を、関数との比較から掴めるかな……という章でした。</p>


  </body>
</html>
