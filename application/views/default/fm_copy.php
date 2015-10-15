<div class="footer">
  <div class="container">
    <a href="http://xixi.fm" target="_black">西西 FM</a> 2015 BY 
    <a href="http://hbdx.cc" target="_black">dolphin</a>
    <span class="text-right"><img src="dist/images/weixin.jpg" id="weixin-pic"><i class="fa fa-weixin" id="weixin"></i></span>
  </div>
</div>
<script>
	var weixin  = document.getElementById("weixin");
	var picture = document.getElementById("weixin-pic");

	weixin.onmouseover = function(e) {
		picture.style.display = "block";
		weixin.style.display  = "none";
    };

    picture.onmouseout = function(e) {
    	weixin.style.display  = "block";
    	picture.style.display = "none";
    };
</script>