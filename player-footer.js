<script>

	livestream="http://kzradio.livecast.co.il/kzradio_aac/";



function loadmp3(mp3file,title,image)
{
	logdebug("loadmp3 "+mp3file);
	jQuery("#jquery_jplayer_1").jPlayer("clearmedia");
	jQuery("#jquery_jplayer_1").jPlayer("setMedia", {mp3: mp3file});
	jQuery("#jquery_jplayer_1").jPlayer("play");
	// jQuery('#backtolive').show();
	jQuery('#jplayer_title').text("תוכנית: "+title);

	document.getElementById("jp-current-time-live").style.display = "none";
	document.getElementById("jp-current-time").style.display = "block";

	document.getElementById("jp-duration-live").style.display = "none";
	document.getElementById("jp-duration").style.display = "block";
	document.getElementById("jp-ball").style.display = "block";
    document.getElementById('player_image_div').style.backgroundImage="url("+image+")";

}

function player_backtolive(image,title)
{
	logdebug("load live stream "+livestream);
	jQuery("#jquery_jplayer_1").jPlayer("clearmedia");
	jQuery("#jquery_jplayer_1").jPlayer("setMedia", {mp3: livestream});
	jQuery("#jquery_jplayer_1").jPlayer("play");
	jQuery('#jplayer_title').text("שידור חי: "+title);
    document.getElementById('player_image_div').style.backgroundImage="url("+image+")";

	// findCurrShow();
}



function player_stop()
{
	logdebug("pause player");
	jQuery("#jquery_jplayer_1").jPlayer("stop");
}

function getDateTime() {
    var now     = new Date();
    var year    = now.getFullYear();
    var month   = now.getMonth()+1;
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds();
    if(month.toString().length == 1) {
         month = '0'+month;
    }
    if(day.toString().length == 1) {
         day = '0'+day;
    }
    if(hour.toString().length == 1) {
         hour = '0'+hour;
    }
    if(minute.toString().length == 1) {
         minute = '0'+minute;
    }
    if(second.toString().length == 1) {
         second = '0'+second;
    }
    var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;
     return dateTime;
}

function playerInit($) {
	// starting with live ready so:
	//  player_backtolive_ui();
	streamInfo={
		title: "KZRADIO",
		mp3: livestream
	};

	is_playing=false;

	$("#jquery_jplayer_1").jPlayer(
		{
			ready: function ()
			{
				logdebug("player ready event");
				$(this).jPlayer("setMedia", streamInfo);
			},
			loadstart: function()
			{
				//start spinner here
				logdebug("player loadstart event");
			},
			loadeddata: function()
			{
				//stop spinner here
				logdebug("player loadeddata event");
			},
			cssSelectorAncestor: "#jp_container_1",
			timeupdate: function(event) {
				$("#jp_container_1 .jp-ball").css("left",event.jPlayer.status.currentPercentAbsolute + "%");
			},
			pause: function(event) {
				logdebug("player pause event");
				logdebug(JSON.stringify(event));
				is_playing=false;
// 				jQuery("#jquery_jplayer_1").jPlayer("clearMedia");
// 				debugger;
			},
			play: function(event)
			{
				logdebug("player play event");
				is_playing=true;
			},
		 	error: function(event)
			{
				logdebug("player error event");
				logdebug(JSON.stringify(event));

				//if(ready && event.jPlayer.error.type === $.jPlayer.error.URL_NOT_SET)
				if (is_playing)
				{
					// Setup the media stream again and play it.
	                jQuery("#jquery_jplayer_1").jPlayer("play");
				}
		    },
			swfPath: "/js",
			useStateClassSkin: true,
			autoBlur: false,
			smoothPlayBar: true,
			supplied: "mp3",
		    preload: "auto",
			keyEnabled: true,
			remainingDuration: true,
			consoleAlerts: true,
			warningAlerts: true,
			errorAlerts: true,
			toggleDuration: true
		});

	// 		  		solution:"flash, html",

	/* Modern Seeking */

	var timeDrag = false; /* Drag status */
	$('.jp-play-bar').mousedown(function (e) {
		timeDrag = true;
		updatebar(e.pageX);
	});
	$(document).mouseup(function (e) {
		if (timeDrag) {
			timeDrag = false;
			updatebar(e.pageX);
		}
	});
	$(document).mousemove(function (e) {
		if (timeDrag) {
			updatebar(e.pageX);
		}
	});

	//update Progress Bar control
	var updatebar = function (x) {

		var progress = $('.jp-progress');
		var maxduration = $("#jquery_jplayer_1").jPlayer.duration; //audio duration
// 		console.log(maxduration);
		var position = x - progress.offset().left; //Click pos
		var percentage = 100 * position / progress.width();

		//Check within range
		if (percentage > 100) {
			percentage = 100;
		}
		if (percentage < 0) {
			percentage = 0;
		}

		$("#jquery_jplayer_1").jPlayer("playHead", percentage);

		//Update progress bar and video currenttime
		$('.jp-ball').css('left', percentage+'%');
		$('.jp-play-bar').css('width', percentage + '%');
		$("#jquery_jplayer_1").jPlayer.currentTime = maxduration * percentage / 100;
	};
}

</script>
