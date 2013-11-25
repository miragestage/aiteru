<script type="text/javascript">


$(function() {
	$(".button_gmap").click(function(){

		/*
		$.post(
			    "/gmapCw.php",                      // リクエストURL
			    {"key1": "value1", "key2": "value2"}, // データ
			    function(data, status) {
			        // 通信成功時にデータを表示
			        $("#test_result")
			            .append("status:").append(status).append("<br/>")
			            .append("data:").append(data).append("<br/>");
			    },
			    "html"                                 // 応答データ形式
		);
		*/
		
		window.open("/gmapCw.php", "WindowName","width=600,height=650,resizable=yes,scrollbars=no");

		
		return false;
	});


});
</script>
<style type="text/css">
.error {
	font-size: 0.5em;
	color: red;
}
</style>
<?php  
echo "<table>";

echo Form::open(array('action' => '', 'name' => "shop"));

echo '<p>';
echo Form::input('id', $s['id'], array('type' => 'hidden'));
echo '</p>';

echo '<tr>';
echo "<td>". Form::label('お店の名前', 'name') ."</td>";
echo "<td>". Form::input('name', $s['name'], array('size' => 40));
echo "<span class='error' >" .$errors['name'] ."</span>" . "</td>";
echo '</tr>';

echo '<tr>';
echo "<td>". Form::label('緯度', 'gmap_lat'). "</td>";
echo "<td>". Form::input('gmap_lat',$s['gmap_lat'], array('size' => 40));
echo "<span class='error' >" .$errors['gmap_lat'] ."</span>" . "</td>";
echo '</tr>';

echo '<tr>';
echo '<td>'. Form::label('経度', 'gmap_lng'). '</td>';
echo '<td>'. Form::input('gmap_lng',$s['gmap_lng'], array('size' => 40));
echo "<span class='error' >" .$errors['gmap_lng'] ."</span>" . '</td>';
echo '</tr>';

echo Form::input($token['token_key'], $token['token'], array('type' => 'hidden'));


echo '<tr>';
echo '<td>'. Form::button('save', '登録', 
	array('onclick' => "this.form.action='/aiteru/top/save/".$s['id'] ."'")). '</td>';
echo '<td>'. Form::button('delete', '削除', 
	array('onclick' => "this.form.action='/aiteru/top/delete/".$s['id'] ."'")). '</td>';
echo '<td>'. Form::button('map', '地図', array('class'=> 'button_gmap')). '</td>';

echo '</tr>';

echo Form::close();
echo "</table>";
?>

<div id="test_result"></div>

<?php 
echo "<br />";
echo "<table>";

foreach ($shops as $shop)
{
	echo "<tr>";
	echo "<td>"; echo $shop['id']; echo "</td>";
	echo "<td>"; echo $shop['name']; echo "</td>";
	echo "<td>"; echo $shop['gmap_lat']; echo "</td>";
	echo "<td>"; echo $shop['gmap_lng']; echo "</td>";
	echo "<td><a href='/aiteru/top/getShopById/" . $shop['id'] ."'>編集</a></td>";
	echo "</tr>";
}
echo "</table>";
?>