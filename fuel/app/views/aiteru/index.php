<?php
 
if (Fuel::$env == 'development' ) return;
// 環境変数参照
$vcap_services = getenv( 'VCAP_SERVICES' );
if ( $vcap_services === false ) {
	exit();
}

// 環境変数からDB設定を取得
$vcap_services_json = json_decode( $vcap_services );
$db = $vcap_services_json->{"mysql-5.1"}[0]->credentials;

echo $db->host . "<br />";
echo $db->port . "<br />";
echo $db->name . "<br />";
echo $db->username . "<br />";
echo $db->password . "<br />";

// DB接続
$pdo = null;
try {
	$pdo = new PDO(
			"mysql:host={$db->host};port={$db->port};dbname={$db->name}",
			$db->username,
			$db->password,
			array(
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8"
			)
	);
} catch (Exception $e) {
	//print_r( $e );
	exit();
}

/*
// ダミーテーブル作成
echo "ダミーテーブル作成<br />";
$sql = "DROP TABLE IF EXISTS `shops`;" . 
"CREATE TABLE shops (" . 
"id int not null AUTO_INCREMENT, name varchar(40), gmap_lat double, gmap_lng double, primary key(id) )";
$params = array();
$stmt = $pdo->prepare( $sql );
$stmt->execute($params);

// ダミーデータinsert
echo "ダミーデータinsert<br />";
$sql = "INSERT INTO shops (name, gmap_lat, gmap_lng) " . 
"VALUES (:name1, :gmap_lat1, :gmap_lng1), (:name2,:gmap_lat2, :gmap_lng2)";

$params = array(
		'name1' => '中野レストラン','gmap_lat1' => 25.555, 'gmap_lng1' => 124.6555,
		'name2' => '居酒屋コザ','gmap_lat2' => 25.234, 'gmap_lng2' => 124.5678,
);
$stmt = $pdo->prepare( $sql );
$stmt->execute($params);
echo print_r( $params ) . "<br />";
*/

// select実行
echo "select実行<br />";
$sql = "SELECT * FROM shops ORDER BY id";
$params = array();
$stmt = $pdo->prepare( $sql );
$stmt->execute($params);
$results = $stmt->fetchAll( PDO::FETCH_ASSOC );

// 表示
echo "表示<br />";
echo print_r( $results ) . "<br />";

// ダミーテーブル削除
//echo "ダミーテーブル削除\n";
//$sql = "DROP TABLE dummy";
//$params = array();
//$stmt = $pdo->prepare( $sql );
//$stmt->execute($params);

echo "END<br />";
