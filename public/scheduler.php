<!DOCTYPE html>
<!-- Just tagging for potential usage in Senior Proj-->
<!-- GNU GPL License -->
<!-- For further integration with DB for Proj-->
<!-- https://dhtmlx.com/docs/products/dhtmlxScheduler/ -->
<!-- https://docs.dhtmlx.com/tutorials__connector_codeigniter__step1.html-->
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Scheduler</title>
</head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
												charset="utf-8"></script>
			type="text/css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">

	<style type="text/css" media="screen">
    html, body{
        margin:0px;
        padding:0px;
        height:100%;
        overflow:hidden;
    }   
</style>

	<script type="text/javascript" charset="utf-8">
	function init() {
		window.resizeTo(950,700)
		modSchedHeight();
		scheduler.config.xml_date="%Y-%m-%d %H:%i";
		scheduler.config.hour_date="%h:%i %A";
		scheduler.config.first_hour = 8;
		scheduler.config.last_hour = 18;
		scheduler.config.multi_day = true;
		scheduler.config.date_step = "5"
		
		scheduler.init('scheduler_here', new Date(),"week");
		scheduler.setLoadMode("week")
		scheduler.templates.event_class=function(s,e,ev)
			{ return ev.custom?"custom":""; };
		
//Temporary inline events to be removed later(Demonstrating input format)
scheduler.parse([
	{ start_date: "2017-03-27 10:00", end_date: "2017-03-27 13:45", text:"Computer Science" },
				],"json");
//Testing Functionality of adding from a db
	}

	</script>


	<body onload="init();" onresize="modSchedHeight()">
	
    <style>
        a img{
            border: none;
        }
        li{
            list-style: none;
        }
    </style>
	<script>
	function modSchedHeight(){
		var headHeight = 100;
		var sch = document.getElementById("scheduler_here");
		sch.style.height = 
			(parseInt(document.body.offsetHeight)-headHeight)+"px";
		var contbox = document.getElementById("contbox");
		contbox.style.width = (parseInt(document.body.offsetWidth)-300)+"px";
	}
	</script>
	<!-- start of banner/ navbar -->
	<div class="w3-container w3-yellow">
       <p></p>  
	</div>
	 <div class="w3-container">
	</div>

	<!--<br> skip a line. -->
	<div class="w3-bar w3-border w3-light-grey">
   <?php
   require_once("../APIClient.php");
   include("navbar.php");
   ?>
	</div>
	
	<div style="height:50px;background-color:#92543f ">
		
		<div id="contbox" style="position: relative; font: bold 17px Arial">
			<div 
				style="position: absolute; left: 10px; top: -4px; color:#fafafa">
			<h3>Scheduler</h3></div>
            </div>
		</div>
	</div>
		<div id="kb-footer">
			<?php
				include("footer.php");
			?>
		</div>
	<!-- some spacing before scheduler entity-->
    <ul>
        <li>
            <a></a>
            <span></span>
        </li>
    </ul>
	<script>

	</script>
	<div id="scheduler_here" class="dhx_cal_container" 
		style='width:100%;height:100%;'>
			<div class="dhx_cal_navline">
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			<div class="dhx_cal_tab" name="day_tab" 
				style="right:332px;"></div>
			<div class="dhx_cal_tab" name="week_tab" 
				style="right:268px;"></div>
			<div class="dhx_cal_tab" name="month_tab" 
				style="right:204px;"></div>	
			
		</div>
		<div class="dhx_cal_header"></div>
		<div class="dhx_cal_data"></div>		
	</div>
	</body>
</html>