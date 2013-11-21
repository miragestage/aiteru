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


// ダミーテーブル作成
echo "ダミーテーブル作成<br />";
$sql = "DROP TABLE IF EXISTS `shops`;" . 
"CREATE TABLE shops (" . 
"id int not null AUTO_INCREMENT, name varchar(40), gmap_lat double, gmap_lng double, primary key(id) )";
$params = array();
$stmt = $pdo->prepare( $sql );
$stmt->execute($params);

/*
// ダミーデータinsert
echo "ダミーデータinsert<br />";
$sql = "INSERT INTO shops (name, gmap_lat, gmap_lng) " . 
"VALUES (:name1, :gmap_lat1, :gmap_lng1), (:name2,:gmap_lat2, :gmap_lng2)";

$params = array(
		'name1' => 'ローソン沖縄　山内店','gmap_lat1' => 26.328027017131358, 'gmap_lng1' => 127.781693566903640,
		'name2' => 'ほっともっと球陽高校前店','gmap_lat2' => 26.320297716301113, 'gmap_lng2' => 127.786093745507740,
);
$stmt = $pdo->prepare( $sql );
$stmt->execute($params);
echo print_r( $params ) . "<br />";


// select実行
echo "select実行<br />";
$sql = "SELECT * FROM shops ORDER BY id";
$params = array();
$stmt = $pdo->prepare( $sql );
$stmt->execute($params);
$results = $stmt->fetchAll( PDO::FETCH_ASSOC );
*/
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
