
<script type="text/javascript">
var map;
var latLng;
var marker;

function MapOpen() {
	//mapの初期値
  	map = new GMaps({
		div: '#map',
		lat: latLng.lat(),
		lng: latLng.lng(),
		zoom:18
	});

	//マーカー表示
	marker = map.addMarker({
	  lat: latLng.lat(),
	  lng: latLng.lng()
	});
}

$(document).ready(function(){
	
	if (navigator.geolocation) {
	
		// 現在の位置情報を取得
		navigator.geolocation.getCurrentPosition(

			// （1）位置情報の取得に成功した場合
			function (pos) {
		        latLng = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
				MapOpen();
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
	
	$('#start_travel').click(function(e){ //start_travelをクリックしたらルート案内
		e.preventDefault();
		map.travelRoute({
			origin: [latLng.lat(), latLng.lng()], //出発点の緯度経度
			destination:[<?php echo $latlng['lat'] ?>, <?php echo $latlng['lng'] ?>], //目標地点の緯度経度
			travelMode: 'walking', //モード（walking,driving）
			step: function(e){
				$('#instructions').append('<li>'+e.instructions+'</li>'); //ルートをテキスト表示
				$('#instructions li:eq('+e.step_number+')').delay(450*e.step_number).fadeIn(200, function(){
					map.setCenter(e.end_location.lat(), e.end_location.lng());
					map.drawPolyline({
						path: e.path,
						strokeColor: '#131540', //ルートの色
						strokeOpacity: 0.3, //ルートの透明度
						strokeWeight: 6 //ルート線の太さ
					});
				});
			}
		});
	});
			
});

</script>

<a href="#" id="start_travel" >ルートを表示</a>
<div id="map" style="height: 300px;"></div>
<ul id="instructions"></ul>

