<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
	<style type="text/css">
		body, body *{
			font-family: 'Trebuschet MS', verdana;
		}
		section.timeline{ width: 100%; margin: 0 auto; font-size: 12px; text-align: center; } 
			section.timeline .time{ display: inline-block; cursor: pointer; vertical-align: top; width: 13.3%; overflow: hidden; text-align: center; margin-right: -15px; -webkit-transition: all 0.3s; -o-transition: all 0.3s; transition: all 0.3s; }
				section.timeline .time *:not(.year){ opacity: 0.5; }
				section.timeline .time .year strong{ opacity: 1 !important; }

			section.timeline .time:hover, section.timeline .time.active{ width: 25%; }
			section.timeline .time:hover *, section.timeline .time.active *{ opacity: 1; -webkit-transition: all 0.3s; -o-transition: all 0.3s; transition: all 0.3s; }

				
				section.timeline .time div strong{ position:relative; color: #fff; display: inline-block; font-weight: normal; line-height: 30px; padding:4px 10px; box-sizing: border-box; border-top-right-radius: 10px; border-bottom-right-radius: 10px; font-size: 11px; }
				section.timeline .time div strong:before{ content: ''; position: absolute; left:-5px; top: calc(50% - 5px); width: 0; height: 0; border-top: 5px solid transparent; border-bottom: 5px solid transparent; border-right:5px solid blue; }
				section.timeline .time div strong.bg-green{ background-color: #647868; }
				section.timeline .time div strong.bg-green:before{ border-right-color: #647868; }
				section.timeline .time div strong.bg-orange{ background-color: #ff6202; }
				section.timeline .time div strong.bg-orange:before{ border-right-color: #ff6202; }
				section.timeline .time .year{ position:relative; display: block; width: 100%; margin:25px 0 40px;  padding: 2.5px; box-sizing: border-box; background-color: #e7e7e7; border-top: 2px solid #f1eff2; border-bottom: 2px solid #f1eff2; }
					section.timeline .time .year strong{ position:absolute; left: 0; top: 10px; width: 100%; text-align: center; }
				section.timeline .time .year:before{ content: "\f0c9"; 
					display: inline-block; font: normal normal normal 14px/1 FontAwesome; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; background-color: #f1eff2; 
					position:absolute; width: 50%; left: 3px; border-radius: 5px; width: 20px; height: 20px; top: calc(50% - 10px); line-height: 20px; color: #817f87; 
					box-shadow: 0px 0px 5px rgba(172,172,172,0.7); -ms-transform: rotate(90deg); -webkit-transform: rotate(90deg); transform: rotate(90deg);
				}
				section.timeline .time .year:after{ content:''; position:absolute; width: 50%; right: 0; height: 3px; top: calc(50% - 2px);  }
				section.timeline .time .year.line-orange:after{ background-color: #ff6202; }
				section.timeline .time .year.line-green:after{ background-color: #647868; }
				
				section.timeline .time .cnt-above{ min-height: 125px; }
				section.timeline .time .cnt-below{ margin-top: 5px; }
					section.timeline .time .cnt-below strong{ margin: 5px 15%; }

	</style>
</head>
<body>
	
	<section class="timeline">

		<div class="time">
			<div class="cnt-above">
				<p class="currency"><i class="fa fa-money" aria-hidden="true"></i> $ 5M</p>
				<strong class="bg-green">VC Israel</strong>
			</div>
			<span class="year line-orange"><strong>2011</strong></span>
		</div>

		<div class="time">
			<div class="cnt-above">
				<p class="currency"><i class="fa fa-money" aria-hidden="true"></i> $ 30M</p>
				<strong class="bg-orange">Ariston RE US</strong>
			</div>
			<span class="year line-green"><strong>2012</strong></span>
		</div>

		<div class="time">
			<div class="cnt-above">
				<p class="currency"><i class="fa fa-money" aria-hidden="true"></i> $ 25M</p>
				<strong class="bg-green">VC Israel From 2011-10x</strong>
			</div>
			<span class="year line-orange"><strong>2013</strong></span>
			<div class="cnt-below">
				<strong class="bg-orange">AINA RE Europe/Hote's</strong>
				<p class="currency"><i class="fa fa-money" aria-hidden="true"></i> $ 160M</p>
			</div>
		</div>

		<div class="time">
			<div class="cnt-above">
				<p class="currency"><i class="fa fa-money" aria-hidden="true"></i> $ 20M</p>
				<strong class="bg-orange">Peak Ventures</strong>
			</div>
			<span class="year line-green"><strong>2014</strong></span>
			<div class="cnt-below">
				<strong class="bg-green">VARIA Italy</strong>
				<p class="currency"><i class="fa fa-money" aria-hidden="true"></i> $ 50M</p>
			</div>
		</div>

		<div class="time">
			<div class="cnt-above">
				<p class="currency">48% in 2 years</p>
				<strong class="bg-green">Ariston (Exit)</strong>
			</div>
			<span class="year line-orange"><strong>2015</strong></span>
			<div class="cnt-below">
				<strong class="bg-orange">Varia US</strong>
				<p class="currency"><i class="fa fa-money" aria-hidden="true"></i> $ 100M</p>
			</div>
		</div>

		<div class="time">
			<div class="cnt-above">
				<p class="currency"><i class="fa fa-money" aria-hidden="true"></i> EUR$ 140M</p>
				<strong class="bg-orange">VARIA SPAIN</strong>
			</div>
			<span class="year line-green"><strong>2016</strong></span>
			<div class="cnt-below">
				<strong class="bg-green">VARIA US</strong>
				<p class="currency"><i class="fa fa-money" aria-hidden="true"></i> $ 100M</p>
				<strong class="bg-green">VARIA US Listing</strong>
			</div>
		</div>

		<div class="time">
			<div class="cnt-above">
				<p class="currency"><i class="fa fa-money" aria-hidden="true"></i> $ TBD</p>
				<strong class="bg-green">UK RE Social Housting</strong>
			</div>
			<span class="year line-orange"><strong>2017</strong></span>
			<div class="cnt-below">
				<strong class="bg-orange">VC Israel</strong>
				<strong class="bg-orange">VC Italy</strong>
				<strong class="bg-orange">Real Estate Europe</strong>
				<p class="currency"><i class="fa fa-money" aria-hidden="true"></i> $ 15M</p>
			</div>
		</div>


	</section>

</body>
</html>