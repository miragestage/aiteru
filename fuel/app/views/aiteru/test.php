<!DOCTYPE html>
<html lang="ja">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />

<link rel="shortcut icon" href="/favicon.ico" />
<title><?php echo $title; ?></title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script type="text/javascript">


$(function() {
	$(".popup").click(function(){
		window.open(this.href, "WindowName","width=600,height=650,resizable=yes,scrollbars=no");
		return false;
	});
});
</script>

<style type="text/css">
body {
	margin:0 0;
	text-align: center;
	font-family: 'Comic Sans MS', verdana, HG丸ｺﾞｼｯｸM-PRO, kawaii手書き文字;
	font-size: 0.8em;
}

</style>
</head>

<body>

<h1>test</h1>
<div id="title01"></div>
<a href="/gmapCw.php" class="popup">リンクテキスト</a>
<?php echo Fuel::$env ?>
<form name="test">
<input name="gmap_lat" type="text" value="0"/>
</form>

</body>
</html>
