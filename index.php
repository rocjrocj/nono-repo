<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>King Of The NoNo</title>
<!-- Bootstrap -->
<link href="/css/bootstrap.css" rel="stylesheet">

<!-- swiper -->
<link rel="stylesheet" href="/css/swiper.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

<!-- custom css -->
<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
<!-- buts -->
<div id="swUp" class="swUp"><img src="/images/swipeup.png"></div>
<div id="swLft" class="swLft"><img src="/images/swipeleft.png"></div>
<div id="stalker" class="stalker"><a href="#" class="go" target="_blank"><img src="/images/stalker.gif"></a></div>
<div id="glutton" class="glutton"><a href="http://www.kingnono.com"><img src="/images/glutton.gif"></a></div>

<!-- swipes --> 

<!-- vertical -->
<div class="swiper-container swiper-container-v">
	<div class="swiper-wrapper">
		<div class="swiper-slide"><img src="images/title.gif?nono=" id="title" class="img-responsive" alt="NoNoNoNoNoNo" />
			<audio id="auTitle" src="/media/intro_fart.mp3"></audio>
		</div>
		<?php
			$jsondata = file_get_contents('nono.json');
			$data = json_decode($jsondata, true);
			$strips = $data['strips'];
			if (isset($_GET['strip'])) {
				$urlStrip = $_GET['strip'];
				//echo $urlStrip;
				$i = 0;
				$iStrip = $i;
				$validStrip = "no";
				foreach($strips as $strip) {
					//echo $index;
					if ($strip['name'] == $urlStrip) {
						$iStrip = $i;
						//echo 'iStrip: '.$iStrip;
						$validStrip = "yes";
					}
					$i++;
				}
				if ($validStrip == "yes") {
					$strips = array_slice($strips, $iStrip, 1);
				}
			}
			$ii = 1;
			foreach($strips as $strip) {
		?>
		<div class="swiper-slide">
			<!-- begin horizontal -->
			<div class="swiper-container swiper-container-h">
				<div class="swiper-wrapper">
				<?php
					$stripName = $strip['name'];
					$numberOfSlides = $strip['numberOfSlides'];
					if ($strip['isVideo'] == "no") {
						$i = 1;
						while ($i <= $numberOfSlides) {
							echo '<div class="swiper-slide"><img data-src="/'.$stripName.'/'.$i.'.gif" class="img-responsive swiper-lazy" alt="'.$stripName.'" /></div><div class="swiper-lazy-preloader"></div>';
							$i++;
						}
					} else {
						echo '<div class="swiper-slide"><video src="/'.$stripName.'/1.mp4" id="vid'.$ii.'" class="vid" controls></video></div>';
					}
				?>
				</div>
			</div>
			<!-- end horizontal -->
		</div>
		<?php 
				$ii++;
			} 
		?>
		<div id="end" class="swiper-slide noI"><img src="/images/end.gif" class="img-responsive" alt="NoNoNoNoNoNo" /></div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="/js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="/js/bootstrap.js"></script> 
<!-- swiper --> 
<script src="/js/swiper.min.js"></script> 
<!-- Initialize Swiper --> 
<script>

var nono = Math.random();
var img = document.getElementById("title");
img.src="/images/title.gif?nono=" + nono;
var swiperPage;
var au;
var count = 0;

	
/********** functions **********/
//show-hide
function shBeg(shDivB, shDoB) {
	//console.log("shDivB-" + shDivB + "-" + "shDoB-" + shDoB);
	if (shDoB == 'show') {
		$('#' + shDivB).fadeIn('slow');
	} else {
		$('#' + shDivB).hide();
	}
}
//play audio
function pAu() {
	//console.log("pAu Called");
	au = document.getElementById("auTitle");
	au.play();
}
//init;
var myInit;
$(function () {
	//console.log("init Called");
	myInit = function() {
	   pAu();
		// initialize swiper
		var swiperH = new Swiper('.swiper-container-h', {
			spaceBetween: 30,
			grabCursor: true,
			preloadImages: false,
			lazyLoading: true,
			onReachEnd: function() {
				shBeg('swUp', 'show');
			},
			onSliderMove: function() {
				shBeg('swLft', 'hide');
			}
		});
		var swiperV = new Swiper('.swiper-container-v', {
			direction: 'vertical',
			spaceBetween: 30,
			grabCursor: true,
			preloadImages: false,
			lazyLoading: true,
			onSliderMove: function() {
				shBeg('swUp', 'hide');
				shBeg('swLft', 'hide');
				shBeg('stalker', 'hide');
				<?php 
					if (isset($_GET['strip'])) {
						echo 'shBeg(\'glutton\', \'hide\')';
					}
				?>
			},
			onReachBeginning: function() {
				shBeg('swUp', 'show');
				shBeg('stalker', 'show');
			},
			onReachEnd: function() {
				shBeg('stalker', 'show');
				<?php
					if (isset($_GET['strip'])) {
						echo 'shBeg(\'glutton\', \'show\')';
					}
				?>
			},
			onSlideChangeEnd: function() {
				var ai = swiperV.activeIndex;
				//console.log("swiperV.activeIndex for vids:" + ai);
				var s = swiperV.slides[ai];
				//console.log("swiperV s for vids:" + s);
				if ($(s).find("video").length) {
					$("#vid" + ai)[0].play();
				} else {
					$('.vid').each(function() {
						$(this).get(0).pause();
					});
					if (ai != 0 && !swiperV.isEnd) {
						shBeg('swLft', 'show');
					}
				}
			}
		});
	};
	setTimeout(myInit, 3300);
	
	$('a.go').click(function(e) {
		e.preventDefault();
		window.open('http://twitter.com/kingofthenono');
		window.open('http://facebook.com');
		window.open('http://instagram.com');
	});
});
</script>
</body>
</html>