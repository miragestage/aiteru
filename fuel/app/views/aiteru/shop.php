<script type="text/javascript">


$(function() {
	$(".button_gmap").click(function(){
		window.open("/gmapCw.php", "WindowName","width=600,height=650,resizable=yes,scrollbars=no");
		return false;
	});
});
</script>

<?php  

echo Form::open(array('action' => 'aiteru/top/shop', 'name' => "shop"));

echo '<p>';

echo Form::input('id', "", array('type' => 'hidden'));
echo '</p>';

echo '<p>';
echo Form::label('お店の名前', 'name');
echo Form::input('name', $shops[0]['name'], array('size' => 40));
echo '</p>';

echo '<p>';
echo Form::label('緯度', 'gmap_lat');
echo Form::input('gmap_lat', "", array('size' => 40));
echo '</p>';

echo '<p>';
echo Form::label('経度', 'gmap_lng');
echo Form::input('gmap_lng', "", array('size' => 40));
echo '</p>';


echo Form::submit('save', '登録');

echo Form::close();
?>

<input type="button" value="地図" class="button_gmap" >

<?php 
echo "<br />";
foreach ($shops as $shop)
{
	echo $shop['name'];
	echo $shop['gmap_lat'];
	echo $shop['gmap_lng'];
	echo "<br />";
}

?>