<?php

// add floating footer to wordpress
function md_floating_bar() { ?>

	<div class="floating-bar">
		<div class="inner">
			<div class="block-double-lr">
				<div class="row player-row-style" dir="ltr">
					<div class="col-md-2 hide-xs-down hidden-sm">
<!-- 						
						<img src="http://beta.kzradio.net/wp-content/uploads/2018/05/katze.jpg" alt="Player Avatar" style="border-radius: 50%;width:115px;height:115px;position: relative;
    top: -45px;border:8px;">
 -->
						
						<div class="player_circle_image" id="player_image_div"
							 style="background-color: black; background-image: url('/wp-content/uploads/2018/11/pexels-photo-744318.jpeg')">
						</div>
						
					</div>		
					<div class="col-md-2 col-xs-2">
				        <div class="jp-title-holder" style="left:0px;right:0px;color:white;direction:rtl;" id="jplayer_title">
		 				 </div>
		 				 <br/>
		 <!--				 			<div class="jp-time-holder">-->
		 				 			    
			<!--	<span class="jp-current-time" id="jp-current-time"  role="timer" aria-label="time">&nbsp;</span>-->
			<!--	<span class="jp-current-time-live" id="jp-current-time-live" >&nbsp;</span>-->
			<!--	<span class="jp-duration" id="jp-duration" role="timer" aria-label="duration">&nbsp;</span>-->
			<!--	<span class="jp-duration-live" id="jp-duration-live" >&nbsp;</span>-->
			<!--</div>-->
					</div>	
					<div class="col-md-8 col-xs-10">
						
						
<!-- player start -->
				<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
	<div class="jp-type-single">
		<div class="jp-gui jp-interface" style="background-color:black;">
			<div class="jp-controls">
				<button class="jp-play" style="transition: all 0s ease;" role="button" tabindex="0">play</button>
<!--				<button class="jp-stop" role="button" tabindex="0">stop</button> -->
			</div>
			<div class="jp-progress-override jp-progress" style="height:14px;background-color:transparent;">
				<div class="jp-seek-bar" style="margin-top:5px;height:4px;background-color: #ddd;">
					<div class="jp-play-bar">
						<div class="jp-ball" id="jp-ball">
							<img src="/css/jplayer/blue.monday/image/off-button.png" style="width:22px;height:22px;max-width:none;"/>
						</div>
					</div>
					
				</div>
				
				
			</div>
			

			
			
			<div class="jp-volume-controls hide-xs-down" style="width:80%;left:60px;">
<!-- 				was right 50px -->
				<button class="jp-mute" role="button" tabindex="0" style="right: -80px;width: 50px;top: -16px;">mute</button>
<!-- 				<button class="jp-volume-max" role="button" tabindex="0">max volume</button> -->
<!-- 				<div class="jp-volume-bar">
					<div class="jp-volume-bar-value">
					    <span class="jp-volume-bar-knob"></span>
					</div>
				</div> -->
			</div>
			
			
			<!-- <div id="backtolive" style="position:absolute;right:10px;top:25px;color:red;font-size:12px;display: none; ">
				<a href="#" onclick="javascript:backtolive();">
					Back to Live
				</a>
			</div> -->
			
			<div class="jp-time-holder">
				<div class="jp-current-time" id="jp-current-time"  role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-current-time-live" id="jp-current-time-live" >&nbsp;</div>
				<div class="jp-duration" id="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				<div class="jp-duration-live" id="jp-duration-live" >&nbsp;</div>
			</div>
			

		
		</div>
<!--		<div class="jp-details">
			<div class="jp-title" aria-label="title">&nbsp;</div>
		</div> -->
		<div class="jp-no-solution">
			<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
		</div>
	</div>
</div>
<!-- player end -->
						
					</div>		
				</div>
			</div>
		</div>
</div>
<?php } 

// add floating footer to wordpress
function md_floating_bar2() { ?>

	<div class="floating-bar">
		<div class="inner">

			<div class="block-double-lr">

<!-- player start -->
				<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
	<div class="jp-type-single">
		<div class="jp-gui jp-interface">
			<div class="jp-controls">
				<button class="jp-play" style="transition: all 0s ease;" role="button" tabindex="0">play</button>
<!--				<button class="jp-stop" role="button" tabindex="0">stop</button> -->
			</div>
			<div class="jp-progress" style="height:12px;">
				<div class="jp-seek-bar">
					<div class="jp-play-bar"></div>
				</div>
			</div>
			
			<div class="jp-volume-controls">
				<button class="jp-mute" style="transition: all 0s ease;" 
 role="button" tabindex="0">mute</button><button class="jp-volume-max" style="transition: all 0s ease;" role="button" tabindex="0">max volume</button>
				<div class="jp-volume-bar">
					<div class="jp-volume-bar-value"></div>
				</div>
			</div>
			<!-- <div id="backtolive" style="position:absolute;right:10px;top:25px;color:red;font-size:12px;display: none; ">
				<a href="#" onclick="javascript:backtolive();">
					Back to Live
				</a>
			</div> -->
			<div class="jp-time-holder">
				<div class="jp-current-time" id="jp-current-time"  role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-current-time-live" id="jp-current-time-live" >&nbsp;</div>
			<!--	<div style="float: right;    font-size: .64em;" role="timer" aria-label="duration">LIVE</div> -->
				<div class="jp-duration" id="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				<div class="jp-duration-live" id="jp-duration-live" >&nbsp;</div>
				<!-- <div class="jp-toggles">
					<button class="jp-repeat" role="button" tabindex="0">repeat</button>
				</div> -->
			</div>
			
          <div class="jp-title-holder" dir="rtl" id="jplayer_title">
			  
		  </div>
		
		</div>
<!--		<div class="jp-details">
			<div class="jp-title" aria-label="title">&nbsp;</div>
		</div> -->
		<div class="jp-no-solution">
			<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
		</div>
	</div>
</div>
<!-- player end -->
			</div>

		</div>
	</div>

<?php } 

add_action( 'wp_footer', 'md_floating_bar' );
?>
