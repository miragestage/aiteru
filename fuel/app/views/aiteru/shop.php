<?php  

echo Form::open('aiteru/shop/shop');

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

echo Form::submit();

echo Form::close();
