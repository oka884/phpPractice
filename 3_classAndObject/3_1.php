<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>クラスとオブジェクトの利用</h1>

    <p>『クラス』を使って『オブジェクト』を作ります。</p>
    <p>クラスはいくつもの関数を定めておくためのものです。</p>


    <?php
    class Hoge10 {   //// クラス定義はここから

      //オブジェクトを作ったとき、そのオブジェクトが保持する変数
      private $hoge20;     //// クラス内で $this->hoge20 が指しているのはすべてここです。

      // コンストラクタ
      public function __construct( $hoge30 ) {
          $this->hoge20 = $hoge30;
      }

      // セッター
      public function setHoge45( $hoge40 ){
        $this->hoge20 = $hoge40;
      }

      // ゲッター省略

      // 以下には適当な関数を書きます。関数の内容は大切ではないです。

      public function overTen(){
        if ( $this->hoge20 > 10 ){
          return "10より大きい数です。";
        } else {
          return "10より大きい数ではありません。";
        }
      }

      public function overThousand(){
        if ( $this->hoge20 > 1000 ){
          return "1000より大きい数です。";
        } else {
          return "1000より大きい数ではありません。";
        }
      }

      public function numberOr(){
        if ( !is_numeric( $this->hoge20 )){
          return "というか文字です。";
        }
      }

      public function square(){
        if ( is_numeric( $this->hoge20 )){
          $ans50 = $this->hoge20 * $this->hoge20;
          return $ans50;
        }
      }

      public function oddOrEven(){
        if ( is_numeric( $this->hoge20 )){
          if ( ( $this->hoge20 % 2 ) == 0 ){
            return "偶数です。";
          } else {
            return "奇数です。";
          }
        }
      }

      public function calculation1( $num60 ){
        $ans65 = (( $this->hoge20 * $num60 ) / 2 );
        return $ans65;
      }

      public function calculation2( $num60, $num65, $num70){
        $ans75 = (( $num60 + $num65 + $num70 ) / $this->hoge20 );
        return $ans75;
      }

      public function printAbout(){    /// この関数（メソッド）では関数の中で他の関数を使っています。
        if ( is_numeric( $this->hoge20 )){
          $text80 = "二乗は";
          $text85 = "、";
        }else{
          $text80 = "";
          $text85 = "";
        }
        echo "<p>", $this->overTen(), $this->overThousand(), "<br>", $this->numberOr(), $text80 , $this->square(), $text85 , $this->oddOrEven(), "</p>" ;
      }

    }  //// クラスの定義ここまで
    ?>


    <br>
    <p>このようにたくさん関数を書きましたが、今はクラスの中に定めてあるだけです。<br>
    クラスの中に書いた関数を直接使うことはできせん。</p>
    <p>オブジェクトを作ってようやくクラスに定めておいた関数が使えます。</p>
    <br>

    <?php
    $useClass100 = new Hoge10( 651 );   //// オブジェクトの作成

    echo $useClass100->overThousand();   //// メソッドの利用
    ?>
    <br>
    <?php
    echo $useClass100->oddOrEven();    //// 定めておいたメソッドがいくらでも使えます。
    ?>
    <br>
    <?php
    echo $useClass100->calculation2( 184, 560, 934 ); //// もちろん引数を取るメソッドを作って、引数を与えて計算させることもできます。
    ?>



    <br><br><br>
    <p>オブジェクトのメソッド（関数）だけに用があるなら、変数だけ書き換えて使うこともあるかもしれません。</p>

    <?php
    $useClass100->setHoge45( 38942 );   //// 作っていたオブジェクトの中の変数($hoge20)を書き換えています。

    echo $useClass100->overThousand();   //// メソッドの利用
    ?>



    <br><br><br>
    <p>しかしクラスを定めていればいくらでもオブジェクトは作れますし、オブジェクトを作ればメソッド（関数）を使うことができます。</p>
    <?php
    $useClass150 = new Hoge10( 12 );   //// オブジェクトの作成
    $useClass150->printAbout();   //// メソッドの利用
    ?>
    <br><br>
    <?php
    $useClass200 = new Hoge10( "あいうえお" );   //// オブジェクトの作成
    $useClass200->printAbout();   //// メソッドの利用
    ?>


    <p>ここでは、オブジェクトが保持する変数が例えひとつでも、メソッド（関数）がいくつも定めておけることは便利なこと。<br>
    そしてメソッドを使うためにオブジェクトを作るという流れを確認しました。</p>

  </body>
</html>
