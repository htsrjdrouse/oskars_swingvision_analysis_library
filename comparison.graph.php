<!DOCTYPE html>
<html lang="en">
<head>
<? //include('functionslib.php');?>
<? error_reporting(E_ALL & ~E_NOTICE);?>
<title>SwingVision Analysis</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/bootstrap.min.css">
  <script src="/jquery.min.js"></script>
  <script src="/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<? include('SwingVision.csv.parser.graph.php');?>
<?
$rallies = ralliesdata();
$shots = shotsdata();
?>
<br>
<?
$myshotsA = myshots($shots,"Oskar R");
$myshotsB = myshots($shots,"Richard Rouse");
?>
<div class="row"><div class="col-md-1">&nbsp;</div> 
<?
$shotdist = array(
	"Forehand"=>count(shottype($myshotsA, "Forehand")),
	"Backhand"=>count(shottype($myshotsA, "Backhand")),
	"Volley"=>count(shottype($myshotsA, "FH Volley"))+count(shottype($myshotsA, "BH Volley"))+count(shottype($myshotsA, "Overhead"))
);
?>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Shot', 'Number'],
	  ['Forehand',     <?=$shotdist['Forehand']?>],
	  ['Backhand',      <?=$shotdist['Backhand']?>],
	  ['Volley',  <?=$shotdist['Volley']?>]
        ]);
        var options = {
          title: 'Shot distribution'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechartA'));
        chart.draw(data, options);
      }
    </script>
<div class="col-md-5">
<h2>Oskar Shot Analysis</h2>
    <div id="piechartA" style="width: 450px; height: 250px;"></div>
</div>

<?
$shotdist = array(
	"Forehand"=>count(shottype($myshotsB, "Forehand")),
	"Backhand"=>count(shottype($myshotsB, "Backhand")),
	"Volley"=>count(shottype($myshotsB, "FH Volley"))+count(shottype($myshotsB, "BH Volley"))+count(shottype($myshotsB, "Overhead"))
);
?>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Shot', 'Number'],
          ['Forehand',     <?=$shotdist['Forehand']?>],
          ['Backhand',      <?=$shotdist['Backhand']?>],
          ['Volley',  <?=$shotdist['Volley']?>]
        ]);
        var options = {
          title: 'Shot distribution'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechartB'));
        chart.draw(data, options);
      }
    </script>

<div class="col-md-5">
<h2>Richard Shot Analysis</h2>
    <div id="piechartB" style="width: 450px; height: 250px;"></div>
</div>

</div>
<div class="row"><div class="col-md-1">&nbsp;</div> 
<div class="col-md-5">&nbsp;<h3>
<? if(count(shottype($myshotsA, "Forehand"))>0) {  ?>
<?=$shot?></h3><? graphshotdisplay($myshotsA,"Forehand","A"); }?>
</div>
<div class="col-md-5">&nbsp;
<? if(count(shottype($myshotsB, "Forehand"))>0) {  ?>
<h3><?=$shot?></h3><? graphshotdisplay($myshotsB,"Forehand","B"); } ?></div>
</div>
<div class="row"><div class="col-md-1">&nbsp;</div> 
<div class="col-md-5">
<? if(count(shottype($myshotsA, "Backhand"))>0) {  ?>
&nbsp;<h3><?=$shot?></h3><? graphshotdisplay($myshotsA,"Backhand","A"); }?></div>
<div class="col-md-5">
<? if(count(shottype($myshotsB, "Backhand"))>0) {  ?>
&nbsp;<h3><?=$shot?></h3><? graphshotdisplay($myshotsB,"Backhand","B"); }?></div>
</div>
<div class="row"><div class="col-md-1">&nbsp;</div>
<div class="col-md-5">
<? if(count(shottype($myshotsA, "Serve"))>0) {  ?>
&nbsp;<h3><?=$shot?></h3><? graphshotdisplay($myshotsA,"Serve","A"); }?></div>
<div class="col-md-5">
<? if(count(shottype($myshotsB, "Serve"))>0) {  ?>
&nbsp;<h3><?=$shot?></h3><? graphshotdisplay($myshotsB,"Serve","B"); } ?></div>
</div>
<div class="row"><div class="col-md-1">&nbsp;</div> 
<div class="col-md-5">
<? if(count(shottype($myshotsA, "FH Volley"))>0) {  ?>
&nbsp;<h3><?=$shot?></h3><? graphshotdisplay($myshotsA,"FH Volley","A"); }?></div>
<div class="col-md-5">
<? if(count(shottype($myshotsB, "FH Volley"))>0) {  ?>
&nbsp;<h3><?=$shot?></h3><? graphshotdisplay($myshotsB,"FH Volley","B");} ?></div>
</div>
<div class="row"><div class="col-md-1">&nbsp;</div> 
<div class="col-md-5">
<? if(count(shottype($myshotsA, "BH Volley"))>0) {  ?>
&nbsp;<h3><?=$shot?></h3><? graphshotdisplay($myshotsA,"BH Volley","A"); }?></div>
<div class="col-md-5">
<? if(count(shottype($myshotsB, "BH Volley"))>0) {  ?>
&nbsp;<h3><?=$shot?></h3><? graphshotdisplay($myshotsB,"BH Volley","B"); }?></div>
</div>
<div class="row"><div class="col-md-1">&nbsp;</div> 
<div class="col-md-5">
<? if(count(shottype($myshotsA, "Overhead"))>0) {  ?>
&nbsp;<h3><?=$shot?></h3><? graphshotdisplay($myshotsA,"Overhead","A"); }?></div>
<div class="col-md-5">
<? if(count(shottype($myshotsB, "Overhead"))>0) {  ?>
&nbsp;<h3><?=$shot?></h3><? graphshotdisplay($myshotsB,"Overhead","B"); }?></div>
</div>




<? function graphshotdisplay($myshots,$shot,$fl){ ?>
<h3><?=$shot?></h3>
<? $shottype = shottype($myshots, $shot);?>
<? $stats = maxminstats($shottype, "Speed (MPH)"); ?>
<? $directionstats = direction($shottype); ?>

<?
 $resultstats = result($shottype);
 echo "<ul><b><u>Result</u></b>";
?>
 <b>In: </b><?=$resultstats['in']?> --
 <b>Out: </b><?=$resultstats['out']?> --
 <b>Net: </b><?=$resultstats['net']?>

 <?if ($shot == "Serve") { ?><br>
<?=100*($resultstats['in']/($resultstats['in']+$resultstats['out']+$resultstats['net']))?>%
 <? } ?>
 </ul>
<?
 $spinstats = spincount($shottype);
 echo "<ul><u><b>Spin</b></u>";
?>
 <b>Top</b>: <?=$spinstats['top']?> --
 <b>Back</b>: <?=$spinstats['back']?> --
 <b>Flat</b>: <?=$spinstats['flat']?>
 </ul>

<ul><u><b>Speed</b></u>
<b>Max:</b> <?=round($stats['max'],2)?> <b>Min:</b> <?=round($stats['min'],2)?> <b>Avg:</b> <?=round($stats['avg'],2)?> 
</ul>

<?
 $bouncestats = bouncedepth($shottype);
 $hitstats = hitdepth($shottype);
 echo "<ul><b><u>Bounce Depth</u></b>";
?>
 <b>Out:</b> <?=$bouncestats['out']?> --
 <b>Service box:</b> <?=$bouncestats['Service box']?> --
 <b>No mans land:</b> <?=$bouncestats['No mans land']?>
 </ul>
 <?
 echo "<ul><b><u>Hit Depth</u></b>";
?>
 <b>Out:</b> <?=$hitstats['out']?> -- 
 <b>Service box:</b> <?=$hitstats['Service box']?> -- 
 <b>No mans land:</b> <?=$hitstats['No mans land']?>
 </ul>
<?
 $bouncestats = bouncezone($shottype);
 $hitstats = hitzone($shottype);
?>
 <table><tr valign=top><td>
<? echo "<ul><b><u>Bounce Zone</u></b>";?>
 <ul>
 <li><b>Deuce:</b> <?=$bouncestats['deuce']?></li>
 <li><b>Deuce out:</b> <?=$bouncestats['deuce_out']?></li>
 <li><b>Deuce alley:</b> <?=$bouncestats['deuce_alley']?></li>
 </ul>
 <ul>
 <li><b>Ad:</b> <?=$bouncestats[0]['ad']?></li>
 <li><b>Ad out:</b> <?=$bouncestats[0]['ad_out']?></li>
 <li><b>Ad alley:</b> <?=$bouncestats[0]['ad_alley']?></li>
 </ul>
 </ul>
 </ul>
 </td><td>
 <?
 echo "<ul><b><u>Hit Zone</u></b>";
?>
 <ul>
 <li><b>Deuce:</b> <?=$hitstats['deuce']?> </li>
 <li><b>Deuce out:</b> <?=$hitstats['deuce_out']?> </li>
 <li><b>Deuce alley:</b> <?=$hitstats['deuce_alley']?></li>
 </ul>
 <ul>
 <li><b>Ad:</b> <?=$hitstats[0]['ad']?></li>
 <li><b>Ad out:</b> <?=$hitstats[0]['ad_out']?></li>
 <li><b>Ad alley:</b> <?=$hitstats[0]['ad_alley']?></li>
 </ul>
 </ul>
 </ul>
 </tr></table>
 <?
 $bouncestats = bounceside($shottype);
 $hitstats = hitside($shottype);
 echo "<ul><b><u>Bounce Side</u></b>";
 ?>
 <b>Near: </b><?=$bouncestats['near']?> --
 <b>Far: </b><?=$bouncestats['far']?>
 </ul>
 <?
 echo "<ul><b><u>Hit Side</u></b>";
 ?>
 <b>Near: </b><?=$hitstats['near']?> --
 <b>Far: </b><?=$hitstats['far']?>
 </ul>




<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Shot', 'Number'],
	  ['Center', <?=$directionstats['nodirection'];?>],
	  ['Down the line', <?=$directionstats['downtheline'];?>],
          ['Down the T',     <?=$directionstats['down the T']?> ],
          ['Out wide',     <?=$directionstats['out wide']?> ],
          ['Inside out',     <?=$directionstats['inside out']?> ],
	  ['Inside in',     <?=$directionstats['inside in']?> ],
          ['Cross court',  <?=$directionstats['crosscourt']?>]
        ]);
        var options = {
          title: 'Shot distribution'
        };
	var chart = new google.visualization.PieChart(document.getElementById('piechartDir<?=$shot?><?=$fl?>'));
        chart.draw(data, options);
      }
    </script>
	    <div id="piechartDir<?=$shot?><?=$fl?>" style="width: 450px; height: 250px;"></div>


<br>
<? 
$dat = array();
foreach($shottype as $key=>$sht){
	array_push($dat, array(
	"shotkey"=>$key+1,
	"point"=>(int)$sht['Point'],
	"shot"=>(int)$sht['Shot'],
	"speed"=>(float)$sht['Speed (MPH)'],
	"spin"=>$sht['Spin'],
	"bouncedepth"=>$sht['Bounce Depth'],
	"bouncezone"=>$sht['Bounce Zone'],
	"bounceside"=>$sht['Bounce Side'],
	"direction"=>$sht['Direction'],
	"result"=>$sht['Result'],
	"starttime"=>$sht['Start Time']
 ));
}
?>
<?
$adat = array();
foreach($dat as $dd){
	array_push($adat, array("shotkey"=>$dd['shotkey'], "speed"=>$dd['speed'], 
		"tooltip"=>"Point ".$dd['point']." Shot ".$dd['shot']." ".round($dd['speed'],1)." ".$dd['spin']." ".$dd['direction']." ".$dd['bouncedepth']." ".$dd['result']
	));
}
$json_data = json_encode(array('rows'=>$adat));
?>
<br>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
  	var data = new google.visualization.DataTable();
  	data.addColumn('number', 'speed');
  	data.addColumn('number', 'shot key');
  	data.addColumn({type: 'string', role: 'tooltip'});
        //var data = google.visualization.arrayToDataTable(<?=$json_data?>);
	var jsonData = <?=$json_data?>;
	for (var i = 0; i < jsonData.rows.length; i++) {
    	 var row = jsonData.rows[i];
    	 data.addRow([row.shotkey, row.speed, row.tooltip]);
  	}
       // Set chart options, including the third column as tooltip
       var options = {
        tooltip: {isHtml: true},
        legend: 'none',
        width: 600,
        height: 250,
	title: '<?=$shot?> Speed (MPH)'
      };
	var chart = new google.visualization.ScatterChart(document.getElementById('chart_div_<?=$shot?>_<?=$fl?>'));
       chart.draw(data, options);
     }
</script>
<div id="chart_div_<?=$shot?>_<?=$fl?>" style="width: 600px; height: 250px;"></div>

<? } ?>


