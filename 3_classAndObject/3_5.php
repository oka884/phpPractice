<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>オブジェクトを配列にする</h1>

    <p>都道府県のオブジェクトを配列にして、それをforeachで取り出してみましょう。</p>

    <?php
    class Prefecture {   // まずは都道府県のクラスを定義します。

      private $name;     // 変数の名前を今回からシンプルにしました。
      private $region;
      private $area;
      private $population;

      // コンストラクタ     // 動きがわかるよう変えていたコンストラクタの仮引数名も今回から変数と同じ名前にしています。
      public function __construct( $name="", $region="", $area=0, $population=0){
        $this->name = $name;
        $this->region = $region;
        $this->area = $area;
        $this->population = $population;
      }

      // セッター省略

      // ゲッター
      public function getName(){
        return $this->name;
      }

      public function getRegion(){
        return $this->region;
      }

      public function getArea(){
        return number_format( $this->area );
      }

      public function getPopulation(){
        return number_format( $this->population );
      }

      // 人口密度を計算するメソッドです。
      public function populationDensity(){
        if ( $this->area > 0 ){            //// ゼロで割らないための条件分岐
          $ans = ( $this->population / $this->area );
          return number_format( $ans , 4);
        } else {
          $ans = 0;
          return $ans;
        }
      }

    }   // クラスの定義ここまで
    ?>

    <br>
    <p>オブジェクトを作りひとつの配列にしていきます。</p>

    <?php  // オブジェクトにしていきます。
    $tokyo = new Prefecture( "東京", "関東", 2193.96, 13960236);

    $osaka = new Prefecture( "大阪", "近畿", 1905.14, 8815082);

    $hokkaido = new Prefecture( "北海道", "北海道", 83423.84, 5231685);

    $okinawa = new Prefecture( "沖縄", "沖縄", 2280.98, 1460427);


    // 配列にしていきます。
    $prefectureArray = array($tokyo, $osaka, $hokkaido, $okinawa);
    ?>


    <p>できた配列を見てみましょう。</p>
    <?php
    var_dump( $prefectureArray );
    ?>

    <br>
    <p>これを foreach で繰り返しさせて出力させます。</p>

    <br>
    <table border="1">
      <tr>
        <th>都道府県名</th>
        <th>地方名</th>
        <th>面積（km^2）</th>
        <th>人口（人）</th>
        <th>人口密度（人/km^2）</th>
      </tr>
      <?php
      foreach ( $prefectureArray as $value100 ){
      ?>
      <tr>
        <th><?=$value100->getName();?></th>
        <th><?=$value100->getRegion();?></th>
        <th><?=$value100->getArea();?></th>
        <th><?=$value100->getPopulation();?></th>
        <th><?=$value100->populationDensity();?></th>
      </tr>
      <?php
      }
      ?>
    </table>

    <p>foreach の $value100 に返ってくるのはオブジェクトそのものなので、 -> でメソッドが使えます。</p>

  </body>
</html>
