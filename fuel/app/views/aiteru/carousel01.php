
<script src="/assets/js/carousel01.js" type="text/javascript"></script>

<style type="text/css">
/* カルーセル */
#carouselWrap{
	margin:0 auto;
	width:620px;
	height:135px;
	padding:5px;
	/*background:url("/images/carousel/background.gif") no-repeat;*/
	position:relative;
	border-style:solid 1px #000;
}
#carouselPrev{
	position:absolute;
	top:65px;
	left:-8px;
	cursor:pointer;
}
#carouselNext{
	position:absolute;
	top:65px;
	right:-8px;
	cursor:pointer;
}
#carousel{
	width:100%;
	height:100%;
	overflow:hidden;
}
#carouselInner ul.column{
	width:605px;
	/*height:105px;*/
	padding:0 0 0 15px;
	list-style-type:none;
	float:left;
}
#carouselInner ul.column li{
	float:left;
	margin-right:10px;
	display:inline;
}
#carouselInner ulcolumn li img{
	border-style:none;
}
#carousel img {border-style: none;}


#carouselInner .column a {
	opacity: 1.0;
}

#carouselInner .column a:hover {
	opacity: 0.6;
}
</style>


<div id="carouselWrap">
<p id="carouselPrev"><img src="/assets/img/carousel/btn_prev.gif" alt="前へ" /></p>
<p id="carouselNext"><img src="/assets/img/carousel/btn_next.gif" alt="次へ" /></p>
	<div id="carousel">
		<div id="carouselInner">
			<ul class="column">
				<li><a href="#"><img src="/assets/img/carousel/photo1_thum.jpg" alt="a" /></a></li>
				<li><a href="#"><img src="/assets/img/carousel/photo2_thum.jpg" alt="b" /></a></li>
				<li><a href="/book"><img src="/assets/img/carousel/photo3_thum.jpg" alt="bookへ" /></a></li>
				<li><a href="#"><img src="/assets/img/carousel/photo4_thum.jpg" alt="" /></a></li>
			</ul>
			<ul class="column">
				<li><a href="#"><img src="/assets/img/carousel/photo5_thum.jpg" alt="" /></a></li>
				<li><a href="#"><img src="/assets/img/carousel/photo6_thum.jpg" alt="" /></a></li>
				<li><a href="#"><img src="/assets/img/carousel/photo7_thum.jpg" alt="" /></a></li>
				<li><a href="#"><img src="/assets/img/carousel/photo8_thum.jpg" alt="" /></a></li>
			</ul>
			<ul class="column">
				<li><a href="#"><img src="/assets/img/carousel/photo9_thum.jpg" alt="" /></a></li>
				<li><a href="#"><img src="/assets/img/carousel/photo10_thum.jpg" alt="" /></a></li>
				<li><a href="#"><img src="/assets/img/carousel/photo11_thum.jpg" alt="" /></a></li>
				<li><a href="#"><img src="/assets/img/carousel/photo12_thum.jpg" alt="" /></a></li>
			</ul>
			<ul class="column">
				<li><a href="#"><img src="/assets/img/carousel/photo13_thum.jpg" alt="" /></a></li>
				<li><a href="#"><img src="/assets/img/carousel/photo14_thum.jpg" alt="" /></a></li>
				<li><a href="#"><img src="/assets/img/carousel/photo15_thum.jpg" alt="" /></a></li>
				<li><a href="#"><img src="/assets/img/carousel/photo16_thum.jpg" alt="" /></a></li>
			</ul>
		</div>
	</div>
</div>

