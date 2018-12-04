function is_empty(val)
{
   return (val === undefined || val == null || val.length <= 0) ? true : false;
}

function player_update_live_show(showObject)
{
    console.log(new Date().toLocaleString(), "player_update_live_show: ", showObject);
	if (!is_live)
	{
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
    showObject.image = showObject.image || 'wp-content/uploads/2018/11/pexels-photo-744318.jpeg';

    if (is_empty(document.getElementById("jplayer_title")))
    {
        setTimeout(function() {
            document.getElementById("jplayer_title").innerHTML = "בשידור: "+showObject.show+" / "+showObject.dj;

    //     	 document.getElementById("jp-current-time-live").innerHTML = show_start;
    //     	 document.getElementById("jp-current-time-live").style.display = "block";
    //     	 document.getElementById("jp-current-time").style.display = "none";
            document.getElementById("jp-current-time").style.display = "block";

    //     	 document.getElementById("jp-duration-live").innerHTML = show_end;
    //     	 document.getElementById("jp-duration-live").style.display = "block";
            document.getElementById("jp-duration").style.display = "none";
            document.getElementById("jp-ball").style.display = "none";

            document.getElementById('player_image_div').style.backgroundImage="url("+showObject.image+")";

         }, 500);
    }
    else
    {
        document.getElementById("jplayer_title").innerHTML = "שידור חי: "+showObject.show+" / "+showObject.dj;

//     	 document.getElementById("jp-current-time-live").innerHTML = show_start;
//     	 document.getElementById("jp-current-time-live").style.display = "block";
//     	 document.getElementById("jp-current-time").style.display = "none";
        document.getElementById("jp-current-time").style.display = "block";

//     	 document.getElementById("jp-duration-live").innerHTML = show_end;
//     	 document.getElementById("jp-duration-live").style.display = "block";

        document.getElementById("jp-duration").style.display = "none";
        document.getElementById("jp-ball").style.display = "none";
        document.getElementById('player_image_div').style.backgroundImage="url("+showObject.image+")";

    }


}

function logdebug(msg)
{
  console.log(getDateTime()+" "+msg);
}

