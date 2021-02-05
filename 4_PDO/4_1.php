<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>データベースの検索</h1>

    <p>PDOオブジェクトは接続情報を保持させて作ると、そのメソッドによりデータベース検索してくれるものです。</p>

    <?php

    // まずはデータベースへ接続する情報を並べます。
    $url10 = "mysql:host=localhost;dbname=データベースの名前;charset=utf8";  // 「データベースの名前」自身のデータベース名を入れてください。
    $user12 = "root";
    $password14 = "";


    // 接続情報を与えたPDOオブジェクトを作ります。
    $objectPDO20 = new PDO( $url10, $user12, $password14 );
    ?>

    <br>
    <p>PDOオブジェクトに接続情報を保持させたことを見たいと思うのですが、PHP側が用意しているオブジェクトは中身を見せてくれません。</p>

    <?php
    var_dump($objectPDO20);
    ?>



    <?php
    $sql30 = " SELECT * FROM customer WHERE mail=? ";  // 検索に使うSQL文です。メールアドレスは固有のものなのでレコード一件の全フィールドが検索できそうです。

    $mail35 = "ichiro@suzuki.com";   // 検索に使うメールアドレスです。


    $objectStmt40 = $objectPDO20->prepare( $sql30 );   // PDO->prepare() により $objectStmt40 を検索条件や検索結果を保持してくれるオブジェクトにします。
    $objectStmt40->bindParam( 1, $mail35 );
    $objectStmt40->execute();                  // 検索の実行を行い、 $objectStmt40 が検索結果を保持している状態になります。

    ?>

    <br>
    <p>オブジェクトが検索結果を保持していることを見たいのですが、これも中身を見せてくれません。</p>

    <?php
    var_dump($objectStmt40);
    ?>

    <br><br>
    <p>検索結果を配列にして返すというメソッドがあるのでそれを利用して検索結果を見てみます。</p>

    <?php
    var_dump( $objectStmt40->fetchAll(PDO::FETCH_ASSOC ));
    ?>

    <p>ちなみに一度結果を出力すると空になるという性質を持っていて、二度目に中身を確認すると空です。</p>
    <?php
    var_dump( $objectStmt40->fetchAll(PDO::FETCH_ASSOC ));
    ?>

    <p>しかしまるでオブジェクトのような連想配列です。これをそのまま入れられるオブジェクトを用意すれば話が早そうです。</p>



    <?php
    $objectStmt40->bindParam( 1, $mail35 );    // 検索するSQL文を保持はしているので、? 部分の指定からもう一度します。
    $objectStmt40->execute();                 //検索の実行


    require_once("Customer.php");    // 検索結果をそのまま入れられるクラスを用意して読み込みました。

    $customer50 = new Customer();


    // 検索結果が配列状ならこのようにして入れられそうですが、これはできません。
    // $customer50->setMail( $objectStmt40[0]["mail"] );


    // しかしなぜかforeach文にすると value には一件目の検索結果の配列が入るので、取り出せます。
    foreach ( $objectStmt40 as $value60 ) {
        $customer50->setMail( $value60["mail"] );
        $customer50->setPassword( $value60["password"] );
        $customer50->setKana( $value60["kana"] );
        $customer50->setName( $value60["name"] );
        $customer50->setTelNo( $value60["telNo"] );
        $customer50->setPostCode( $value60["postCode"] );
        $customer50->setAddress( $value60["address"] );
        $customer50->setBirthday( $value60["birthday"] );

        break;   // 二週目なさそうですが、一応一週目で必ずブレイクするようにしています。
    }
    ?>

    <br><br>
    <p>検索結果を取る出す際にオブジェクトにしてまとめました。</p>

    <?php
    var_dump( $customer50 );
    ?>


  </body>
</html>
