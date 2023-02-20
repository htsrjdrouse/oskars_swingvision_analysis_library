<? include('oskars.SwingVision.shot.datamodel.php');?>
<?
$rallies = ralliesdata();
$shots = shotsdata();
$myshotsA = myshots($shots,"Oskar R");
$myshotsB = myshots($shots,"Richard Rouse");
?>
<table>
<tr valign=top>
<? shotdisplay("Oskar R",20,"Richard R",5, $myshotsA, $myshotsB); ?>
</tr>


</table>
<br>
<?
function shotdisplay($fplayer,$fplayer_range,$splayer,$splayer_range, $myshotsA, $myshotsB){
	$shottypery=array("Forehand", "Backhand", "Serve", "FH Volley", "BH Volley");
	foreach ($shottypery as $sh){
?>
<tr valign=top>
<td><h1><?=$sh?>&nbsp;&nbsp;&nbsp;</h1></td>
<td><h1><?=$fplayer?></h1><?shotstats_v1($sh, $myshotsA, $fplayer_range);?></td>
<td><h1><?=$splayer?></h1><?shotstats_v1($sh, $myshotsB, $splayer_range);?></td>
</tr>
<?
	}
}




function shotstats_v1($typeshot,$myshots, $rangenum){
 $shottype = shottype($myshots, $typeshot);
?>
 <? if(count($shottype) > 0){ ?>
 <? $stats = speed($myshots,$shottype);?>
 <? direction_display($shottype); ?>
 <? results_display($shottype,$typeshot); ?>
 <? spin_display($shottype); ?>
 <? bouce_hit_display($shottype); ?>
 <? finddata_display($myshots,($stats['max']-$rangenum),$shottype)?> 
 <? } else { ?>
 <b>No shots</b>
 <? } ?>
<?
}


function results_display($shottype, $typeshot){
 $resultstats = result($shottype);

 echo "<h3>Result</h3>";
?>
 <ul>
 <b>In: </b><?=$resultstats['in']?> --
 <b>Out: </b><?=$resultstats['out']?> --
 <b>Net: </b><?=$resultstats['net']?>

 <?if ($typeshot == "Serve") { ?><br>
<?=100*($resultstats['in']/($resultstats['in']+$resultstats['out']+$resultstats['net']))?>%
 <? } ?>
 </ul>

<?
}


function spin_display($shottype){
 $spinstats = spincount($shottype);
 echo "<h3>Spin</h3>";
?>
 <ul>
 <b>Top</b>: <?=$spinstats['top']?> --
 <b>Back</b>: <?=$spinstats['back']?> --
 <b>Flat</b>: <?=$spinstats['flat']?><br>
 </ul>
<?
}


function direction_display($shottype){
 $directionstats = direction($shottype);
 echo "<br>";
 echo "<h3>Shot direction</h3>";
?>
<ul>
<b>Center of court: </b><?=$directionstats['nodirection']?><br>
<b>Down the line: </b><?=$directionstats['downtheline']?><br>
<b>Cross court: </b><?=$directionstats['crosscourt']?><br>
<b>Inside out: </b><?=$directionstats['inside out']?><br>
<b>Inside in: </b><?=$directionstats['inside in']?><br>
 <bR>
<b>Down the T: </b><?=$directionstats['down the T']?><br>
<b>Out wide: </b><?=$directionstats['out wide']?><br>
</ul>
<?
}

function bouce_hit_display($shottype){

 $bouncestats = bouncedepth($shottype);
 $hitstats = hitdepth($shottype);
 echo "<br>";
 echo "<h3>Bounce Depth</h3>";
?>
 <ul>
 <b>Out:</b> <?=$bouncestats['out']?> -- 
 <b>Service box:</b> <?=$bouncestats['Service box']?> -- 
 <b>No mans land:</b> <?=$bouncestats['No mans land']?>
 </ul>
 <?
 echo "<h3>Hit Depth</h3>";
?>
 <ul>
 <b>Out:</b> <?=$hitstats['out']?> -- 
 <b>Service box:</b> <?=$hitstats['Service box']?> -- 
 <b>No mans land:</b> <?=$hitstats['No mans land']?>
 </ul>
 <? 
 $bouncestats = bouncezone($shottype);
 $hitstats = hitzone($shottype);
 echo "<h3>Bounce Zone</h3>";
?>
 <ul>
 <b>Down the line for lefty</b><br>
 <b>Deuce:</b> <?=$bouncestats['deuce']?> -- 
 <b>Deuce out:</b> <?=$bouncestats['deuce_out']?> -- 
 <b>Deuce alley:</b> <?=$bouncestats['deuce_alley']?>
 <br>
 <b>Cross court for lefty</b><br>
 <b>Ad:</b> <?=$bouncestats[0]['ad']?> -- 
 <b>Ad out:</b> <?=$bouncestats[0]['ad_out']?> -- 
 <b>Ad alley:</b> <?=$bouncestats[0]['ad_alley']?> 
 </ul>
 <?
 echo "<h3>Hit Zone</h3>";
?>
 <ul>
 <b>Down the line for lefty</b><br>
 <b>Deuce:</b> <?=$hitstats['deuce']?> -- 
 <b>Deuce out:</b> <?=$hitstats['deuce_out']?> -- 
 <b>Deuce alley:</b> <?=$hitstats['deuce_alley']?>
 <br><br>
 <b>Cross court for lefty</b><br>
 <b>Ad:</b> <?=$hitstats[0]['ad']?> -- 
 <b>Ad out:</b> <?=$hitstats[0]['ad_out']?> -- 
 <b>Ad alley:</b> <?=$hitstats[0]['ad_alley']?> 
 </ul>

 <?

 $bouncestats = bounceside($shottype);
 $hitstats = hitside($shottype);
 echo "<h3>Bounce Side</h3>";
 ?>
 <ul>
 <b>Near: </b><?=$bouncestats['near']?> -- 
 <b>Far: </b><?=$bouncestats['far']?> 
 </ul>
 <?
 echo "<h3>Hit Side</h3>";
 ?>
 <ul>
 <b>Near: </b><?=$hitstats['near']?> -- 
 <b>Far: </b><?=$hitstats['far']?>
 </ul>
 <?
 echo "<hr>";

}

?>

