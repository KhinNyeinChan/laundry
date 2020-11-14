<script type="text/javascript">
document.onkeyup = function(oEvent)
{
    if(!oEvent) oEvent = window.event;
aletrt("p");
    if (String.fromCharCode(oEvent.keyCode) == "P")
    {
    	
        document.forms["yourFormName"].submit();
    }
} 
</script>
 <input type="submit" accesskey="p"> 