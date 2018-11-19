function is_empty(val)
{
   return (val === undefined || val == null || val.length <= 0) ? true : false;
}
function player_update_live_show(showObject)
{
  if (is_empty(showObject))
	{
		return false;
	}
  logdebug("player_update_live_show: ");
  logdebug(showObject);
  setTimeout(function()
  { 
	 document.getElementById("jplayer_title").innerHTML = "בשידור: "+showObject.show+" / "+showObject.dj;
  }, 500);

}

function logdebug(msg)
{
  console.log(msg);
}

