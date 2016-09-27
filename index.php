<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);
	
	$jsondata = file_get_contents('nono.json');
	$data = json_decode($jsondata, true);
	//$strips = $data['strips'];
	
	//$strip;
	//$strips;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
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
<!--<div id="butAll" class="butAll">
	<a href="mailto:sire@kingofthenono.com?subject=nonono"><div id="butLft" class="butLft"></div></a>
	<a href="https://twitter.com/kingofthenono"><div id="butRgt" class="butRgt"></div></a>
</div>-->
<div id="swUp" class="swUp"><img src="/images/swipeup.png" class="img-responsive"></div>
<div id="swLft" class="swLft"><img src="/images/swipeleft.png" class="img-responsive"></div>

<!-- swipes --> 

<!-- vertical -->
<div class="swiper-container swiper-container-v">
	<div class="swiper-wrapper">
		<div class="swiper-slide"><img src="images/title.gif?nono=" id="nono" class="img-responsive" alt="NoNoNoNoNoNo" />
			<audio id="auTitle" src="/media/intro_fart.mp3"></audio>
		</div>
		<?php
			//$jsondata = file_get_contents('nono.json');
//			$data = json_decode($jsondata, true);
			$strips = $data['strips'];


	
	if (isset($_GET['strip'])) {
		$urlStrip = $_GET['strip'];
		echo $urlStrip;
		//$key = array_search($urlStrip, $strips);
		//if ($key) {
			$i = 0;
			$iStrip = $i;
			foreach($strips as $strip) {
				//echo $index;
				if ($strip['name'] == $urlStrip) {
					$iStrip = $i;
					echo 'iStrip: '.$iStrip;
				}
				$i++;
			}
			//$strips = $strips[5];
			if ($iStrip != "") {
				$strips = array_slice($strips, $iStrip, 1);
			}
		//}
	}
	
	//if ($iStrip) {
//		$nStrips = $data['strips'][5];
//	} else {
//		$nStrips = $data['strips'];
//	}
//	
			//$i = 0;
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
							echo '<div class="swiper-slide"><img src="/'.$stripName.'/'.$i.'.gif" class="img-responsive" alt="'.$stripName.'" /></div>';
							$i++;
						}
					} else {
						//echo '<div class="swiper-slide"><img src="/'.$strip_name.'/'1.mp4" class="img-responsive" alt="'.$strip_name.'" /></div>';
						echo '<video src="/'.$stripName.'/1.mp4" controls></video>';
					}
				?>
				</div>
			</div>
			<!-- end horizontal -->
		</div>
		<?php 
			} 
		?>
		<div class="swiper-slide noI"><img src="/images/end.gif" class="img-responsive" alt="NoNoNoNoNoNo" /></div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="/js/jquery-1.11.3.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="/js/bootstrap.js"></script> 
<!-- swiper --> 
<script src="/js/swiper.jquery.min.js"></script> 
<!-- Initialize Swiper --> 
<script>

var nono = Math.random();
var img = document.getElementById("nono");
img.src="/images/title.gif?nono=" + nono;
console.log(img.src);
// global vars
//var swiperV;
//var swiperH;
var swiperPage;
var au;
var count = 0;

// initialize swiper
var swiperH = new Swiper('.swiper-container-h', {
	spaceBetween: 30,
	grabCursor: true,
	onReachBeginning: function() {
		//shBeg('swLft', 'show');
	},
	onReachEnd: function() {
		shBeg('swUp', 'show');
	}
});
var swiperV = new Swiper('.swiper-container-v', {
	direction: 'vertical',
	spaceBetween: 30,
	grabCursor: true,
	onTouchStart: function() {
		shBeg('swUp', 'hide');
		shBeg('swLft', 'hide');
		shBeg('butAll', 'hide');
	},
	onReachBeginning: function() {
		//shBeg('swUp', 'show');
	},
	onSlideChangeEnd: function() {
		count = count + 1;
		console.log(count);
		if (count != 3 && count != 6 && count != 8) {
			shBeg('swLft', 'show');
		}
	}
});
	
/********** functions **********/
//show-hide
//var aI = swiperV.activeIndex;
function shBeg(shDivB, shDoB) {
	console.log("shDivB-" + shDivB + "-" + "shDoB-" + shDoB);
	//if (aI != 0 && shDivB != 'swLft') {
		if (shDoB == 'show') {
			$('#' + shDivB).fadeIn('slow');
		} else {
			$('#' + shDivB).hide();
		}
	//}
}
//setTimeout(shBeg, 5000);
//play audio
function pAu() {
	console.log("pAu Called");
	au = document.getElementById("auTitle");
	au.play();
}
//init;
var myInit;
$(function () {
	console.log("init Called");
	shBeg('butAll', 'show');
	console.log("after shBeg butAll");
	myInit = function() {
	   pAu();
	   shBeg('swUp', 'show');
	   console.log("after shBeg swUp");
	};
	setTimeout(myInit, 3300);
});
</script>
</body>
</html>