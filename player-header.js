<script>

function is_empty(val)
{
   return (val === undefined || val == null || val.length <= 0) ? true : false;
}
function player_update_live_show(showObject)
{
  logdebug("player_update_live_show: ");
  logdebug(JSON.stringify(showObject));
  if (is_empty(showObject))
	{
		return false;
	}

  if (is_empty(showObject.end))
  {
      show_end="14:00";
  }
  else
  {
    show_end=showObject.end;
  }
  if (is_empty(showObject.start))
  {
      show_start="12:00";
  }
  else
  {
      show_start=showObject.start;
  }
  if (is_empty(document.getElementById("jplayer_title")))
  {
    setTimeout(function()
      { 
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

</script>

