<?php if (!isset($_SESSION)) session_start(); ?>
<head>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#result").empty();
    $("#result").load("getMatchedSeller.php");
    $("#submit").click(function()
  	{
   		$.ajax(
      	{
            url: "RiderEt.php",
            type: "POST",
        	data:
        	{
            	locFrom: $("#locFrom").val(),
                locTo: $("#locTo").val(),
                timeFrom: $("#timeFrom").val(),
                timeTo: $("#timeTo").val()
        	},
            dataType: "text",
        	success: function(dat)
        	{	

        	},
    	});
		$("#result").empty();
    	$("#result").load("getMatchedDriver.php");
	}); 
});

function riderJoinEvent(event_id) {
	$.ajax(
    {
        url: "selectRide.php",
	    type: "POST",
    	data:
        {
        	EtId: event_id
        },
        dataType: "text"
    }).done(function(){
        location.reload();
    });
}
</script>
</head>

<body>
<div id="bottom">
	<p><h1>Rider Home Page</h1></p>
    Location From: <input type='text' id = 'locFrom'/>
    Location To: <input type='text' id = 'locTo'/>
    Time From: <input type='text' id = 'timeFrom'/>
    Time To: <input type='text' id = 'timeTo'/>
    <button id="submit">Submit!</button>
<?php
    if (isset($_GET['RiderRequest']) && $_GET['RiderRequest'] == 1)	
    {   
    	echo '<span style="color: red;">New Request Created Successfully</span><br/>';
    }
    else if(isset($_GET['RiderRequest']) && $_GET['RiderRequest'] == 0)
    {
    	echo '<span style="color: red;">Request Creation Failure</span><br/>';
    }
?>
<pre id="fileContents"></pre>
<div id="result"></div>
</div>
</body>

