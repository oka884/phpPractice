<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>DAOを定義する</h1>

    <p>ひとつのテーブルに対する検索や登録の操作は共通するところが多いので、クラスの中にメソッドとしてまとめておきたいです。</p><br>


    <p>・複数のメソッドで共通しうる、データベースへアクセスするための情報はオブジェクトを作る段階で与えます。<br>
    ・メソッドごとに変わるもの（mailアドレスからの検索と、電話番号からの検索で与えたいもの違う）はメソッドごとに与えられるようにします。</p>

    <?php

    class CustomerDAO10{  // クラスの定義始まり

      private $con100;

      // コンストラクタ
      public function __construct( $url200, $user220, $password240 ){
          $this->con100 = new PDO( $url200, $user220, $password240 );     // new をしたタイミングで $con200 を PDO オブジェクトにします。
      }

      // mailアドレスから一人を特定しその人の全情報を取り出すメソッドです。
      public function findOne( $mail250 ){

          $stmt300 = $this->con100->prepare( " SELECT * FROM customer WHERE mail=? " );
          $stmt300->bindParam( 1, $mail250 );
          $stmt300->execute();                  // 検索の実行

          $resultArray = $stmt300->fetchAll(PDO::FETCH_ASSOC);

          return $resultArray; // 今回は検索結果を配列として返します。
      }
    }  // クラス定義終わり

    ?>

    <br>
    <p>作ったクラスを使い sqlの検索を行っていきます。</p>


    <?php

    // まずはデータベースへ接続する情報を並べます。
    $url20 = "mysql:host=localhost;dbname=データベースの名前;charset=utf8";  // 「データベースの名前」自身のデータベース名を入れてください。
    $user22 = "root";
    $password24 = "";


    $objectCostmerDAO30 = new CustomerDAO10( $url20, $user22, $password24);  // データベースへ接続する情報を与えてオブジェクトを作ります。

    $custmerIchiro40 = $objectCostmerDAO30->findOne( "ichiro@suzuki.com" );   // メールアドレスから一人を特定し配列を返すメソッドを使います。

    ?>

    <br>
    <p>var_dump() で検索結果の配列を確認。</p>
    <?=var_dump( $custmerIchiro40 );?>
    <br>




    <br><br><br>
    <p>上の例ですが引数に データベースの場所・ユーザー名・パスワード の3つを与えても、結局コンストラクタでPDOオブジェクトにしています。<br>
      ならば最初から PDOオブジェクトを与えても同じだと気づきます。</p>


    <?php
    require_once("Customer.php");    // Customer クラスを使うので読み込みます。

    class CustomerDAO50{  // クラスの定義始まり

      private $con500;

      // コンストラクタ
      public function __construct( $PDO600 ){
          $this->con500 = $PDO600;
      }

      // メソッド
      public function findOne( $mail650 ){
          $sql700 = " SELECT * FROM customer WHERE mail=? ";
          $stmt750 = $this->con500->prepare( $sql700 );
          $stmt750->bindParam( 1, $mail650 );
          $stmt750->execute();

          if ($stmt750 != null && $stmt750->rowCount() > 0) {   // 先ほどはなかったなにも検索されなかったときの対策なども加えてみます。

              foreach ( $stmt750 as $value800 ) {   // 今回は検索結果をCustomerオブジェクトにして返しましょう。
                  $customer850 = new Customer();
                  $customer850->setMail( $value800["mail"] );
                  $customer850->setPassword( $value800["password"] );
                  $customer850->setKana( $value800["kana"] );
                  $customer850->setName( $value800["name"] );
                  $customer850->setTelNo( $value800["telNo"] );
                  $customer850->setPostCode( $value800["postCode"] );
                  $customer850->setAddress( $value800["address"] );
                  $customer850->setBirthday( $value800["birthday"] );
                  break;
              }
          return $customer850;
          }
      }
    }  // クラス定義終わり
    ?>

    <br><br>
    <p>2回目に作ったクラスを使い sqlの検索を行っていきます。</p>

    <?php

    // データベースへ接続する情報はさきほどの、$url20,$user22,$password24 を使います。

    $con60 = new PDO( $url20, $user22, $password24 );

    $objectCostmerDAO70 = new CustomerDAO50( $con60 );  // PDOオブジェクトを与えると、オブジェクトの中で、与えたオブジェクトのメソッドを使ってくれます。

    $custmerIchiro80 = $objectCostmerDAO70->findOne( "ichiro@suzuki.com" );   // メールアドレスから一人を特定しオブジェクトを返すメソッドを使います。

    ?>

    <br>
    <p>var_dump() で取り出したオブジェクトの確認。</p>
    <?=var_dump( $custmerIchiro80 );?>
    <br>
    <p>passwordの呼び出し。</p>
    <?=$custmerIchiro80->getPassword();?>



    <br>
  </body>
</html>
