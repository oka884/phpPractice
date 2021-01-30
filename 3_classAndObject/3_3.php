<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>フォームから受け取りオブジェクトにしてメソッドを使う</h1>

    <p>クラス・オブジェクトは同じような情報を持つものに対して真価を発揮します。<br>
    今回は都道府県のクラスを作った後、フォームから送られた情報を元にオブジェクトにして使います。</p>


    <?php
    class Prefecture00 {

      private $name10;       // 名前・地方・面積・人口の4つの情報を持たせるクラスを定義します。
      private $region13;
      private $area16;
      private $population19;

      // コンストラクタ                //// 今回はコンストラクタでデフォルト値を与えています
      public function __construct( $hoge20="", $hoge23="", $hoge26=0, $hoge29=0){
        $this->name10 = $hoge20;
        $this->region13 = $hoge23;
        $this->area16 = $hoge26;
        $this->population19 = $hoge29;
      }

      // セッター省略

      // ゲッター
      public function getName(){
        return $this->name10;
      }

      public function getRegion(){
        return $this->region13;
      }

      public function getArea(){
        return number_format( $this->area16 );  //// 桁数が見やすいようにコンマ区切りをしてくれる関数を噛ませてます。
      }

      public function getPopulation(){
        return number_format( $this->population19 );
      }

      // 他のメソッド。好きなメソッドが用意できます。
      public function populationDensity(){
        if ( $this->area16 > 0 ){                 //// ゼロで割らないための条件分岐
          $ans30 = ( $this->population19 / $this->area16 );
          return number_format( $ans30 , 4);      //// コンマ区切りかつ小数点以下は四桁目までの表示
        } else {
          $ans30 = 0;
          return $ans30;
        }
      }

      public function populationTop20(){
        if ( $this->population19 > 7200000 ){
          return "人口上位5位";
        } elseif ( $this->population19 > 3500000 ){
          return "人口上位10位";
        } elseif ( $this->population19 > 1850000 ){
          return "人口上位20位";
        }
      }

    } //// クラスの定義ここまで
    ?>


    <p>クラス定義が終わったのでフォームを用意します。</p>

    <form action="3_3.php" method="post">
      <label><input type="text" name="name40">都道府県名</label><br>
      <label><input type="text" name="region45">地方名</label><br>
      <label><input type="text" name="area50">面積</label><br>
      <label><input type="text" name="popu55">人口</label><br>
      <input type="submit" value="確定">
    </form>

    <?php
    //// エラー回避のための処理をしています。
    if ( isset( $_REQUEST["name40"])){        //// 未入力を "" にしています。
      $name60 = $_REQUEST["name40"];
    } else {
      $name60 = "";
    }

    if ( isset( $_REQUEST["region45"])){       //// 未入力を "" にしています。
      $region65 = $_REQUEST["region45"];
    } else {
      $region65 = "";
    }

    if ( isset( $_REQUEST["area50"])){         //// 文字と未入力を 0 にする処理をしています。もう少し簡潔にできそう
      if ( is_numeric( $_REQUEST["area50"])){
        $area70 = $_REQUEST["area50"];
      } else {
        $area70 = 0;
      }
    } else {
      $area70 = 0;
    }

    if ( isset( $_REQUEST["popu55"])){         //// 文字と未入力を 0 にする処理をしています。
      if ( is_numeric( $_REQUEST["popu55"])){
        $popu75 = $_REQUEST["popu55"];
      } else {
        $popu75 = 0;
      }
    } else {
      $popu75 = 0;
    }


    // フォームから送られた情報をエラー処理を噛ませたあと、オブジェクトにします。
    $prefecture90 = new Prefecture00( $name60, $region65, $area70, $popu75);
    ?>


    <p>表示させます。</p>

    <br>
    <table border="1">
      <tr>
        <th>都道府県名</th>
        <th>地方名</th>
        <th>面積（km^2）</th>
        <th>人口（人）</th>
        <th>人口密度（人/km^2）</th>
        <th>備考</th>
      </tr>
      <tr>
        <td><?=$prefecture90->getName();?></td>
        <td><?=$prefecture90->getRegion();?></td>
        <td><?=$prefecture90->getArea();?></td>
        <td><?=$prefecture90->getPopulation();?></td>
        <td><?=$prefecture90->populationDensity();?></td>
        <td><?=$prefecture90->populationTop20();?></td>
      </tr>
    </table>

    <br>
    <p>一度オブジェクトにしたことで、人口密度計算や備考欄用のメソッドが使えました。<br>
    オブジェクトにしてメソッドを使う。この流れが大切です。</p>


  </body>
</html>
