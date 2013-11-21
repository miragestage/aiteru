<!DOCTYPE html>
<html lang="ja">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />

<link rel="shortcut icon" href="/favicon.ico" />
<title><?php echo $title; ?></title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/gmaps.js"></script>



<style type="text/css">

body {
	margin:0 0;
	text-align: center;
	font-family: 'Comic Sans MS', verdana, HG丸ｺﾞｼｯｸM-PRO, kawaii手書き文字;
	font-size: 0.8em;
}

#wrap {
	width: 920px;
	text-align: left;
	margin: 0 auto;
}

#inner {
	margin: 0 0px;
}

#largeWrap {
	float: left;
	width: 770px;
	height: 650px;
	margin-bottom: 20px;
}

#mainWrap {
	float: right;
	width: 535px;
	height: 650px;
	border: solid 2px #DCDCDC;
	background-color: #F0FFF0;
	border-radius: 10px;
	
}

.sideAlphaWrap {
	float: left;
	width: 225px;
}

#sideBetaWrap {
	float: right;
	width: 145px;
	/*height: 700px;*/
	overflow: auto;

}
.clear {
	clear: both;
}
.clear hr {
	display: none;
}

#map {
	width: 100%;
	height:500px;
}

div#glayLayer {
	display: none;
	position: fixed;
	left: 0;
	top: 0;
	height: 100%;
	width: 100%;
	background: black;
	filter: alpha(opacity =     60);
	opacity: 0.60;
}

* html div#glayLayer {
	position: absolute;
}

#overLayer {
	display: none;
	position: fixed;
	top: 50%;
	left: 50%;
	margin-top: -150px;
	margin-left: -150px;
}

* html #overLayer {
	position: absolute;
}
</style>
</head>
<body>

	<?php echo View::forge('aiteru/carousel01');?>

	<div id="wrap">
	<div id="largeWrap">
	<div id="mainWrap">

		<div id="content">
			<?php echo $content; ?>
		</div>

	</div><!-- /mainwrap -->

	<div class="sideAlphaWrap">
		<div id="sidemenu">
			<?php echo View::forge('aiteru/tree_menu');?>
		</div>
	</div><!-- /sideAlphaWrap -->

	<div class="clear"></div>
	</div><!-- /largeWrap -->

	<div id="sideBetaWrap">
	</div><!-- /sideBetaWrap -->

	<div class="clear"></div>

	</div><!-- /wrap -->



</body>
</html>
