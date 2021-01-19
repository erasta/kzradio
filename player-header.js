function player_update_live_show(showObject)
{
    console.log(new Date().toLocaleString(), "player_update_live_show: ", showObject);
	if (!is_live) {
		return true;
	}
    if (!showObject)return false;
    if (!showObject.start || !showObject.end) {
        var currHour = new Date().getHours();
        showObject.start = currHour + ":00";
        showObject.end = (currHour + 1) + ":00";
    }
    showObject.dj = showObject.dj || "הקצה";
    showObject.show = showObject.show || "הקצה נונסטופ";
    showObject.image = showObject.image || '/wp-content/uploads/2018/11/pexels-photo-744318.jpeg';

	function setJPlayerDetails(prefix) {
		document.getElementById("jplayer_title").innerHTML = prefix + ": "+showObject.show+" / "+showObject.dj;
		document.getElementById("jp-current-time").style.display = "block";
		document.getElementById("jp-duration").style.display = "none";
		document.getElementById("jp-ball").style.display = "none";
		document.getElementById('player_image_div').style.backgroundImage="url("+showObject.image+")";
	}
	
	var title = document.getElementById("jplayer_title");	
    if (!title || title.length === 0) {
        setTimeout(function() {
			setJPlayerDetails("בשידור");
         }, 500);
    }
    else
    {
		setJPlayerDetails("שידור חי");
    }
}

