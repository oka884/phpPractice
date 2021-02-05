<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>4_2でやったこと</h1>

    <p>4_2でやったことををDateTimeクラスを作ってやってます。前半と後半の比較も同じ。<br>
    すごく無意味な感じがしますが、参考になるかもしれない。</p>

    <br>
    <p>前半、オブジェクトの中でオブジェクトを作る</p>

    <?php

    class TestDateTime10{

      private $objestDatetime100;

      // コンストラクタ
      public function __construct( $timeZone200 ){
        $this->objestDatetime100 = new DateTime( $timeZone200 );
      }

      public function jikan300( $format300 ){
        $resultTime400 = $this->objestDatetime100->format( $format300 );
        return $resultTime400;
      }
    }

    // 使っていく

    $objectTestDT20 = new TestDateTime10( "America/New_York" );

    $result30 = $objectTestDT20->jikan300( "Y-m-d h:i" );

    echo $result30;

    ?>

    <br>
    <p>後半、オブジェクトを作ってオブジェクトに入れる</p>

    <?php

    class TestDateTime50{

      private $objestDatetime500;

      // コンストラクタ
      public function __construct( $timeZone600 ){
        $this->objestDatetime500 = $timeZone600 ;
      }

      public function jikan700( $format800 ){
        $resultTime900 = $this->objestDatetime500->format( $format800 );
        return $resultTime900;
      }
    }

    // 使っていく
    // DateTimeオブジェクトを入れてオブジェクトを作る設計にしたのでDateTimeオブジェクトを作って入れる。
    $object60 = new DateTime( "America/New_York" );

    $objectTestDT70 = new TestDateTime50( $object60 );

    $result80 = $objectTestDT70->jikan700( "Y-m-d h:i" );

    echo $result80;



    ?>


  </body>
</html>
