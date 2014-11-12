<head>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $.ajax(
    {
        url: "driverLoad.php",
        type: "GET",
        //dataType: "text",
        dataType: "json",
        success: function(data)
        {
	        var i = 0;
			while (data[i] != null)
			{
	        	$("#result").append('<div>'+ data[i].EtId+'</div>');
	         	i++;
	        }
        },
    });
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
            timeTo: $("#timeTo").val(),
            maxRiders: $("#maxRiders").val()
        	},
        dataType: "text",
        	success: function(dat)
        	{	
          	$("#fileContents").html(dat); // override with contents of dat
        	},
    	});
	}); 
});
</script>
</head>

<body>
<div id="bottom">
	<p><h1>Driver Home Page</h1></p>
Location From: <input type='text' id = 'locFrom'/>
Location To: <input type='text' id = 'locTo'/>
Time From: <input type='text' id = 'timeFrom'/>
Time To: <input type='text' id = 'timeTo'/>
Maximum Riders: <input type='text' id = 'maxRiders'/>
<button id="submit">Submit!</button>
<?php
	if (isset($_GET['DriverOffer']) && $_GET['DriverOffer'] == 1)
	{   
		echo '<span style="color: red;">New Offer Created Successfully</span><br/>';
	}
	else if(isset($_GET['DriverOffer']) && $_GET['DriverOffer'] == 0)
	{
		echo '<span style="color: red;">Offer Creation Failure</span><br/>';
	}
?>
<pre id="fileContents"></pre>
<div id="result"></div>
</div>
</body>

