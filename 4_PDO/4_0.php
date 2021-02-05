<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>コンストラクタの復習</h1>

    <p>コンストラクタは new する際にオブジェクトに保持させる変数に値を入れる役割を担っています。</p>
    <br>
    <p>new する際にコンストラクタに渡す引数がひとつでも、ふたつの変数を持たせることもできます。</p>

    <?php
    // クラスの定義ここから
    class Circle100 {

      private $radius10;    // 半径と円周の変数を保持させるクラスの定義をします。
      private $circumference20;

      // コンストラクタ   // newしたタイミングで、与えられた引数から半径と円周をそれぞれ代入します。
      public function __construct( $num30 ) {
        $this->radius10 = $num30;
        $this->circumference20 = $num30 * 2 * 3.14;
      }

    } // クラスの定義ここまで


    // クラスからオブジェクトを作成
    $circle100Object = new Circle100( 16 );   // コンストラクタに"16"を与えオブジェクトを作っています。

    // var_dump() での確認
    var_dump( $circle100Object );
    ?>


    <br><br>
    <p>引数とは関係なく最初から保持させる数を決めておくこともできます。</p>

    <?php
    // クラスの定義ここから
    class Circle200 {

      private $radius40;    // 半径と円周率の変数を保持させるクラスの定義をします。
      private $pi50 = 3.14;  // 半径として保持させる値はここでもう定義しておきます

      // コンストラクタ   // newしたタイミングで引数から半径に代入します。
      public function __construct( $num60 ) {
        $this->radius40 = $num60;
      }

    } // クラスの定義ここまで


    // クラスからオブジェクトを作成
    $circle200Object = new Circle200( 28 );   // コンストラクタに"28"を与えオブジェクトを作っています。

    // var_dump() での確認
    var_dump( $circle200Object );
    ?>



    <br><br>
    <p>重要なのは new し終わった（コンストラクタが働き終えた）タイミングで、保持させると定義した変数（配列？）すべてに値が入っていることです。
    <p>これまでコンストラクタの説明が抜けていたので、説明を入れました。</p>
    <p>（PDOの説明とは直接は関係がありません）</p>

  </body>
</html>
