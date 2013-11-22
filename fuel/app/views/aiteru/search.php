
<script type="text/javascript">

var latLng;

$(function(){

	if (navigator.geolocation) {
		
	
		// 現在の位置情報を取得
		navigator.geolocation.getCurrentPosition(

			// （1）位置情報の取得に成功した場合
			function (pos) {
		        latLng = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
				$("input[name='rootLat']").val(latLng.lat());
		        $("input[name='rootLng']").val(latLng.lng());
				
			},
			// （2）位置情報の取得に失敗した場合
			function (error) {
				var message = "";

				switch (error.code) {

					// 位置情報が取得できない場合
					case error.POSITION_UNAVAILABLE:
					message = "位置情報の取得ができませんでした。";
					break;

					// Geolocationの使用が許可されない場合	
					case error.PERMISSION_DENIED:
					message = "位置情報取得の使用許可がされませんでした。";
					latLng = new google.maps.LatLng(26.334388138401824, 127.8055832);
					MapOpen();
					break;

					// タイムアウトした場合
					case error.PERMISSION_DENIED_TIMEOUT:
					message = "位置情報取得中にタイムアウトしました。";
					break;
				}
				window.alert(message);
			}
		);
	} else {
		window.alert("本ブラウザではGeolocationが使えません");
	}
});
</script>

<style type="text/css">
.search {
	text-align: center;
}

.table {
	margin: 0 auto 0;
}
</style>



<div class="search">
<h1>検索テスト</h1>
<div id="title01"></div>


<form name="test" action="/aiteru/top/search" method="post">
<?php 
echo Form::input($token['token_key'], $token['token'], array('type' => 'hidden'));
?>

<table class="table">
<tr><th></th><th></th></tr>
<tr>
<td>地球の円周</td>
<td><input name="earth" type="text" value='<?php echo $data['earth'] ?>' /></td>
</tr>
<tr>
<td>一秒当たりの距離（緯度）</td>
<td><input name="secondLat" type="text" value='<?php echo $data['secondLat'] ?>' /></td>
</tr>
<tr>
<td>一秒あたりの距離（経度）</td>
<td><input name="secondLng" type="text" value='<?php echo $data['secondLng'] ?>' /></td>
</tr>
<tr>
<td>現在地（緯度）</td>
<td><input name="rootLat" type="text" value='' /></td>
</tr>
<tr>
<td>現在地（経度）</td>
<td><input name="rootLng" type="text" value='' /></td>
</tr>
<tr>
<td>検索半径（メートル）</td>
<td><input name="rangeLimit" type="text" value='<?php echo $data['rangeLimit'] ?>' /></td>
</tr>
<tr>
<td>検索範囲を度に変換（緯度始点）</td>
<td><input name="rangeLatS" type="text" value='<?php echo $data['rangeLatS'] ?>' /></td>
</tr>
<tr>
<td>検索範囲を度に変換（経度始点）</td>
<td><input name="rangeLngS" type="text" value='<?php echo $data['rangeLngS'] ?>' /></td>
</tr>
<tr>
<td>検索範囲を度に変換（緯度終点）</td>
<td><input name="rangeLatE" type="text" value='<?php echo $data['rangeLatE'] ?>' /></td>
</tr>
<tr>
<td>検索範囲を度に変換（経度終点）</td>
<td><input name="rangeLngE" type="text" value='<?php echo $data['rangeLngE'] ?>' /></td>
</tr>
<tr>
<td>始点終点2点間の距離</td>
<td><input name="distance" type="text" value='<?php echo $data['distance'] ?>' /></td>
</tr>

</table>


<input type="submit" value="検索" />
</form>


<?php 
echo "<br />";
echo "<p>おおまかな範囲の取得</p>";

foreach ($rows as $shop)
{
	echo $shop['name'] . "  ";
	echo $shop['gmap_lat'] . "  ";
	echo $shop['gmap_lng'];
	echo "<br />";
}

echo "<p>お店までの距離</p>";
//print_r($results);

foreach ($results as $result)
{
	echo $result['name'] . "  ";
	echo $result['distance'] . "メートル";
	
	echo "<br />";
}

?>

</div>