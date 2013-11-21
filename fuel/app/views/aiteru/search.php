
<script type="text/javascript">


$(function() {
	$(".popup").click(function(){
		window.open(this.href, "WindowName","width=600,height=650,resizable=yes,scrollbars=no");
		return false;
	});
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
<h1>search</h1>
<div id="title01"></div>
<a href="/gmapCw.php" class="popup">リンクテキスト</a>

<form name="test">
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
<td>検索範囲を度に変換（緯度始点）</td>
<td><input name="rangeLatS" type="text" value='<?php echo $data['rangeLatS'] ?>' /></td>
</tr>
<tr>
<td>検索範囲を度に変換（緯度終点）</td>
<td><input name="rangeLatE" type="text" value='<?php echo $data['rangeLatE'] ?>' /></td>
</tr>
<tr>
<td>一秒あたりの距離（経度）</td>
<td><input name="secondLng" type="text" value='<?php echo $data['secondLng'] ?>' /></td>
</tr>
<tr>
<td>検索範囲を度に変換（経度始点）</td>
<td><input name="rangeLngS" type="text" value='<?php echo $data['rangeLngS'] ?>' /></td>
</tr>
<tr>
<td>検索範囲を度に変換（経度終点）</td>
<td><input name="rangeLngE" type="text" value='<?php echo $data['rangeLngE'] ?>' /></td>
</tr>
<tr>
<td>2点間の距離</td>
<td><input name="distance" type="text" value='<?php echo $data['distance'] ?>' /></td>
</tr>

</table>
</form>

</div>