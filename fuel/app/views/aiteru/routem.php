
<script type="text/javascript">
var map;
$(document).ready(function(){
	map = new GMaps({
		div: '#map', //Mapを表示するid名
		lat: 26.325794499999997, //中心緯度
		lng: 127.78540959999998, //中心経度,
		zoom: 18 //ズームレベル
	});
	
	$('#start_travel').click(function(e){ //start_travelをクリックしたらルート案内
		e.preventDefault();
		map.travelRoute({
			origin: [26.325795199999998, 127.78540959999998], //出発点の緯度経度
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

