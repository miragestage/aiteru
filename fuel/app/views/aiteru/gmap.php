
<script type="text/javascript">

var map;
var marker;
//var latLng = new google.maps.LatLng(26.334388138401824, 127.8055832);
var latLng;

function MapOpen() {
	//mapの初期値
  	map = new GMaps({
		div: '#map',
		lat: latLng.lat(),
		lng: latLng.lng(),
		zoom:16
	});

    //緯度・経度を表示
	$("input[name='lat']").val(latLng.lat());
	$("input[name='lng']").val(latLng.lng());

	//マーカーの追加
	marker = map.addMarker({
	  lat: latLng.lat(),
	  lng: latLng.lng(),
	  draggable: true,
	  title: '位置の設定',
	  dragend: function (e) {
		 //ドラッグした位置を中心にする。
	     map.setCenter(this.position.lat(), this.position.lng());

         //緯度・経度を表示
	     $("input[name='lat']").val(this.position.lat());
	     $("input[name='lng']").val(this.position.lng());

         var location ="<li>"+"緯度：" + this.position.lat() + "</li>";
         location += "<li>"+"経度：" + this.position.lng() + "</li>";
         document.getElementById("location").innerHTML = location;

	  }
	});
}

//マーカーの位置を変更
function changeMarkerPosition(lat, lng) {
    var latlng = new google.maps.LatLng(lat, lng);
    marker.setPosition(latlng);
}

$(function(){

  if (navigator.geolocation) {

    // 現在の位置情報を取得
    navigator.geolocation.getCurrentPosition(

      // （1）位置情報の取得に成功した場合
      function (pos) {
        var location ="<li>"+"緯度：" + pos.coords.latitude + "</li>";
        location += "<li>"+"経度：" + pos.coords.longitude + "</li>";
        document.getElementById("location").innerHTML = location;
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

  //住所検索
  $('#geocoding_form').submit(function(e){
    e.preventDefault();
    GMaps.geocode({
      address: $('#address').val().trim(),
      callback: function(results, status){
        if(status=='OK'){
          var latlng = results[0].geometry.location;

          //検索住所を中心にする。
          map.setCenter(latlng.lat(), latlng.lng());

          //緯度・経度を表示
		  $("input[name='lat']").val(latlng.lat());
		  $("input[name='lng']").val(latlng.lng());

          var location ="<li>"+"緯度：" + latlng.lat() + "</li>";
          location += "<li>"+"経度：" + latlng.lng() + "</li>";
          document.getElementById("location").innerHTML = location;

		  //マーカーの位置を変更
		  changeMarkerPosition(latlng.lat(), latlng.lng());
        }
      }
   });
 });



});


</script>

	<form method="post" id="geocoding_form">
	<label for="address">市町村名や住所等を入力してください。aaaa</label>
	<?php echo $name; ?>
	<div class="input">
	  <input type="text" id="address" name="address" />
	  <input type="submit" class="btn" value="検索" />
	</div>
	</form>

	<div id="map"></div>

	<form action="/aiteru/layer/test" method="post" id="latlng">
		<input type="text" name="lat" />
		<input type="text" name="lng" />
		<input type="submit" value="OK" />
		<input type="button" onclick="window.close()" value="OK" />
	</form>

	<ul id="location">
	</ul>


