<?php  

echo Form::open('aiteru/shop/shop');

echo '<p>';

echo Form::input('id', "", array('type' => 'hidden'));
echo '</p>';

echo '<p>';
echo Form::label('お店の名前', 'name');
echo Form::input('name', "", array('size' => 40));
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
<link rel="stylesheet" href="/assets/css/bootstrap.css" type="text/css" />

<form class="form-horizontal">
<fieldset>
<legend>Controls Bootstrap supports</legend>
<div class="control-group">
<label class="control-label" for="input01">Text input</label>
<div class="controls">
<input type="text" class="input-xlarge" id="input01">
<p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>
</div>
</div>
<div class="form-actions">
<button type="submit" class="btn btn-primary">Save changes</button>
<button class="btn">Cancel</button>
</div>
</fieldset>
</form>

<?php  
foreach ($shops as $shop)
{
	echo $shop['name'];
	echo $shop['gmap_lat'];
	echo $shop['gmap_lng'];
	echo "<br />";
}

?>