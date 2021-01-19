is_live=true;

function getLiveStream() {
	// livestream = "http://kzradio.livecast.co.il/kzradio_aac/";
	// livestream = "http://kpub.mediacast.co.il:8000/stream";
	// livestream = "https://kzradio.mediacast.co.il/kzradio_live/kzradio/icecast.audio";
	livestream = "<?php the_field( 'streaming_url', 'option'); ?>";
	return livestream;
}

function loadmp3(mp3file,title,image)
{
	console.log(new Date().toLocaleTimeString(), "loadmp3 ", mp3file);
	jQuery("#jquery_jplayer_1").jPlayer("clearmedia");
	jQuery("#jquery_jplayer_1").jPlayer("setMedia", {mp3: mp3file});
	jQuery("#jquery_jplayer_1").jPlayer("play");
	// jQuery('#backtolive').show();
	jQuery('#jplayer_title').text("תוכנית: "+title);
    is_live=false;

	document.getElementById("jp-current-time-live").style.display = "none";
	document.getElementById("jp-current-time").style.display = "block";

	document.getElementById("jp-duration-live").style.display = "none";
	document.getElementById("jp-duration").style.display = "block";
	document.getElementById("jp-ball").style.display = "block";
    document.getElementById('player_image_div').style.backgroundImage="url("+image+")";

}

function player_backtolive(image,title)
{
	is_live=true;
	console.log(new Date().toLocaleTimeString(), "load live stream", getLiveStream());
	jQuery("#jquery_jplayer_1").jPlayer("clearmedia");
	jQuery("#jquery_jplayer_1").jPlayer("setMedia", {mp3: getLiveStream()});
	jQuery("#jquery_jplayer_1").jPlayer("play");
	jQuery('#jplayer_title').text("שידור חי: "+title);
	document.getElementById("jp-duration").style.display = "none";
    document.getElementById('player_image_div').style.backgroundImage="url("+image+")";

	// findCurrShow();
}



function player_stop()
{
	console.log(new Date().toLocaleTimeString(), "pause player");
	jQuery("#jquery_jplayer_1").jPlayer("stop");
}

function tryToRecoverPlayer() {
	setTimeout(() => {
		if (is_live)
		{
			if(!is_playing)
			{
				console.log(new Date().toLocaleTimeString(), "trying to recover player");
				// Setup the media stream again and play it.
				jQuery("#jquery_jplayer_1").jPlayer("setMedia", {mp3: getLiveStream()});
				jQuery("#jquery_jplayer_1").jPlayer("play");
			}
		}
	}, 1000)
}

function playerInit($) {
	// starting with live ready so:
	//  player_backtolive_ui();
	streamInfo={
		title: "KZRADIO",
		mp3: getLiveStream()
	};

	is_playing=false;

	$("#jquery_jplayer_1").jPlayer(
		{
			ready: function ()
			{
				console.log(new Date().toLocaleTimeString(), "player ready event");
// 				$(this).jPlayer("setMedia", streamInfo);
			},
			loadstart: function()
			{
				//start spinner here
				console.log(new Date().toLocaleTimeString(), "player loadstart event");
			},
			loadeddata: function()
			{
				//stop spinner here
				console.log(new Date().toLocaleTimeString(), "player loadeddata event");
			},
            cssSelectorAncestor: "#jp_container_1",
			timeupdate: function(event) {
				$("#jp_container_1 .jp-ball").css("left",event.jPlayer.status.currentPercentAbsolute + "%");
			},
			pause: function(event) {
				console.log(new Date().toLocaleTimeString(), "player pause event", event);
				is_playing=false;
				if (is_live)
				{
    				jQuery("#jquery_jplayer_1").jPlayer("clearMedia");
// 					jQuery("#jquery_jplayer_1").jPlayer("setMedia", {mp3: getLiveStream()});
				}
			},
			play: function(event)
			{
				console.log(new Date().toLocaleTimeString(), "player play event", event);
				is_playing=true;
			},
		 	warning: function(event)
			{
				console.log(new Date().toLocaleTimeString(), "player warning", event);
			},
		 	ended: function(event)
			{
				console.log(new Date().toLocaleTimeString(), "player ended", event);
			},
		 	stalled: function(event)
			{
				console.log(new Date().toLocaleTimeString(), "player stalled", event);
			},
		 	error: function(event)
			{
				console.log(new Date().toLocaleTimeString(), "player error", event);
				tryToRecoverPlayer()
				//if(ready && event.jPlayer.error.type === $.jPlayer.error.URL_NOT_SET)
// 				if (is_live)
// 				{
// 					if(!is_playing)
// 					{
// 						// Setup the media stream again and play it.
// 						jQuery("#jquery_jplayer_1").jPlayer("setMedia", {mp3: getLiveStream()});
// 						jQuery("#jquery_jplayer_1").jPlayer("play");
// 					}
// 				}
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