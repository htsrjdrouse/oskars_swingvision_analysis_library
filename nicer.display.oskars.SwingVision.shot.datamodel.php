<?
$rallies = ralliesdata();
$shots = shotsdata();
$myshots = myshots($shots,"Oskar R");
?>
<h1>Oskar R</h1><br>
<h2>Forehand</h2>
<?
shottypestats("Forehand", $myshots);
?>
<br>
<h2>Backhand</h2>
<?
shottypestats("Backhand", $myshots);
?>
<br>
<h2>Serve</h2>
<?
shottypestats("Serve", $myshots);
?>
<br>
<? $shottype =  shottype($myshots, "FH Volley"); print_r(count($shottype)); if (count($shottype)>-1){ ?>
<h2>FH Volley</h2>
<?
shottypestats("FH Volley", $myshots);
?>
<? } ?>
<br>
<h2>BH Volley</h2>
<?
shottypestats("BH Volley", $myshots);
?>
<br>


<?


function hitdepth($myshots){
 $no_mans_land = array();
 $service_box = array();
 $out = array();

 foreach($myshots as $ss){
   if ($ss['Hit Depth'] == "no_mans_land"){
    array_push($no_mans_land, $ss);
   }
   if ($ss['Hit Depth'] == "service_box"){
    array_push($service_box, $ss);
   }
   if ($ss['Hit Depth'] == "out"){
    array_push($out, $ss);
   }
 }
 $stats = array("out"=>count($out), "Service box"=>count($service_box), "No mans land"=>count($no_mans_land));
 return $stats;
}



function result($myshots){
 $in = array();
 $out = array();
 $net = array();

 foreach($myshots as $ss){
   if ($ss['Result'] == "In"){
    array_push($in, $ss);
   }
   if ($ss['Result'] == "Out"){
    array_push($out, $ss);
   }
   if ($ss['Result'] == "Net"){
    array_push($net, $ss);
   }
 }
 $stats = array("in"=>count($in), "out"=>count($out), "net"=>count($net));
 return $stats;
}



function direction($myshots){
 $nodirection = array();
 $downtheline = array();
 $crosscourt = array();
 $insideout = array();
 $downtheT = array();
 $outwide = array();

 foreach($myshots as $ss){
   if ($ss['Direction'] == "---"){
    array_push($nodirection, $ss);
   }
   if ($ss['Direction'] == "down the line"){
    array_push($downtheline, $ss);
   }
   if ($ss['Direction'] == "cross court"){
    array_push($crosscourt, $ss);
   }
   if ($ss['Direction'] == "down the T"){
    array_push($downtheT, $ss);
   }
   if ($ss['Direction'] == "out wide"){
    array_push($outwide, $ss);
   }
   if ($ss['Direction'] == "inside out"){
    array_push($insideout, $ss);
   }
 }

 $stats = array("nodirection"=>count($nodirection), "downtheline"=>count($downtheline), "crosscourt"=>count($crosscourt),"down the T"=> count($downtheT),"out wide"=> count($outwide),"inside out"=> count($insideout));
 return $stats;
}



function bouncedepth($myshots){
 $no_mans_land = array();
 $service_box = array();
 $out = array();

 foreach($myshots as $ss){
   if ($ss['Bounce Depth'] == "no_mans_land"){
    array_push($no_mans_land, $ss);
   }
   if ($ss['Bounce Depth'] == "service_box"){
    array_push($service_box, $ss);
   }
   if ($ss['Bounce Depth'] == "out"){
    array_push($out, $ss);
   }
 }
 $stats = array("out"=>count($out), "Service box"=>count($service_box), "No mans land"=>count($no_mans_land));
 return $stats;
}



function hitside($myshots){
 $near = array();
 $far = array();

 foreach($myshots as $ss){
   if ($ss['Hit Side'] == "near"){
    array_push($near, $ss);
   }
   if ($ss['Hit Side'] == "far"){
    array_push($far, $ss);
   }
 }
 $stats = array("near"=>count($near),"far"=>count($far));
 return $stats;
}



function bounceside($myshots){
 $near = array();
 $far = array();

 foreach($myshots as $ss){
   if ($ss['Bounce Side'] == "near"){
    array_push($near, $ss);
   }
   if ($ss['Bounce Side'] == "far"){
    array_push($far, $ss);
   }
 }
 $stats = array("near"=>count($near),"far"=>count($far));
 return $stats;
}






function bouncezone($myshots){
 $ad = array();
 $ad_alley = array();
 $ad_out = array();
 $deuce = array();
 $deuce_alley = array();
 $deuce_out = array();

 foreach($myshots as $ss){
   if ($ss['Bounce Zone'] == "ad"){
    array_push($ad, $ss);
   }
   if ($ss['Bounce Zone'] == "ad_out"){
    array_push($ad_out, $ss);
   }
   if ($ss['Bounce Zone'] == "ad_alley"){
    array_push($ad_alley, $ss);
   }
   if ($ss['Bounce Zone'] == "deuce"){
    array_push($deuce, $ss);
   }
   if ($ss['Bounce Zone'] == "deuce_out"){
    array_push($deuce_out, $ss);
   }
   if ($ss['Bounce Zone'] == "deuce_alley"){
    array_push($deuce_alley, $ss);
   }
 }
 $stats = array("deuce"=>count($deuce),"deuce_out"=>count($deuce_out),"deuce_alley"=>count($deuce_alley));
 array_push($stats, array("ad"=>count($ad),"ad_out"=>count($ad_out),"ad_alley"=>count($ad_alley)));
 return $stats;
}


function hitzone($myshots){
 $ad = array();
 $ad_alley = array();
 $ad_out = array();
 $deuce = array();
 $deuce_alley = array();
 $deuce_out = array();

 foreach($myshots as $ss){
   if ($ss['Hit Zone'] == "ad"){
    array_push($ad, $ss);
   }
   if ($ss['Hit Zone'] == "ad_out"){
    array_push($ad_out, $ss);
   }
   if ($ss['Hit Zone'] == "ad_alley"){
    array_push($ad_alley, $ss);
   }
   if ($ss['Hit Zone'] == "deuce"){
    array_push($deuce, $ss);
   }
   if ($ss['Hit Zone'] == "deuce_out"){
    array_push($deuce_out, $ss);
   }
   if ($ss['Hit Zone'] == "deuce_alley"){
    array_push($deuce_alley, $ss);
   }
 }
 $stats = array("deuce"=>count($deuce),"deuce_out"=>count($deuce_out),"deuce_alley"=>count($deuce_alley));
 array_push($stats, array("ad"=>count($ad),"ad_out"=>count($ad_out),"ad_alley"=>count($ad_alley)));
 return $stats;
}


function spincount($myshots){
 $top = array();
 $back = array();
 $flat = array();
 foreach($myshots as $ss){
   if ($ss['Spin'] == "Topspin"){
    array_push($top, $ss);
   }
   if ($ss['Spin'] == "Slice"){
    array_push($back, $ss);
   }
   if ($ss['Spin'] == "Flat"){
    array_push($flat, $ss);
   }
 }
 $stats = array("top"=>count($top), "back"=>count($back), "flat"=>count($flat));
 return $stats;
}


function shottypestats($typeshot,$myshots){
 $shottype =  shottype($myshots, $typeshot);
 //$param = array("Speed (MPH)","Bounce Depth");
 //$param = array("Speed (MPH)","Hit (x)","Hit (y)","Hit (z)","Bounce (x)","Bounce (y)");
 $param = array("Speed (MPH)");
 //array_push($param, array("Bounce (x)","Bounce (y)"));

 foreach($param as $pp){
  $stats = maxminstats($shottype, $pp);
  $keys =	finddata($shottype, $stats['max'], $pp);
  echo '<h3>'.$pp.'</h3>';
?>
<ul>
<b>Max:</b> <?=$stats['max']?> -- 
<b>Min:</b> <?=$stats['min']?> -- 
<b>Avg:</b> <?=$stats['avg']?> 
</ul>
<br>
<?
  if ($pp == "Speed (MPH)"){
  echo "<b>Max speed data point</b><br>";
  print_r($shottype[$keys[0]]);
  echo "<br>";
  }
 }
 $directionstats = direction($shottype);
 echo "<br>";
 echo "<h3>Shot direction</h3>";
?>
<ul>
<b>Center of court: </b><?=$directionstats['nodirection']?><br>
<b>Down the line: </b><?=$directionstats['downtheline']?><br>
<b>Cross court: </b><?=$directionstats['crosscourt']?><br>
<b>Inside out: </b><?=$directionstats['inside out']?><br>
 <bR>
<b>Down the T: </b><?=$directionstats['down the T']?><br>
<b>Out wide: </b><?=$directionstats['out wide']?><br>
</ul>
<?
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
 $spinstats = spincount($shottype);
 echo "<h3>Spin</h3>";
?>
 <ul>
 <b>Top</b>: <?=$spinstats['top']?> --
 <b>Back</b>: <?=$spinstats['back']?> --
 <b>Flat</b>: <?=$spinstats['flat']?><br>
 </ul>
 <?
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
 echo "<br>";
}


function finddata($myshots, $tar, $field){
 $ks = array();
 foreach($myshots as $key => $value){
   if ($value[$field] == $tar){
    array_push($ks, $key);
   }
 }
 return $ks;
}

function shottype($myshots, $type){
 $shottype = array();
 foreach($myshots as $ss){
   if ($ss['Stroke'] == $type){
    array_push($shottype, $ss);
   }
 }
 return $shottype;
}

function maxminstats($myshots, $dtype){
 $pp = array();
 foreach($myshots as $ss){
  array_push($pp,$ss[$dtype]);
 }
 $stats = array(
   "max"=>max($pp),
   "min"=>min($pp),
   "avg"=>array_sum($pp)/count($pp)
 );
 return $stats;
}

function myshots($shots,$player){
 $playerdata = array();
 foreach($shots as $ss){
  if ($ss['Player'] == $player){
	  array_push($playerdata, array(
           "Spin" => $ss['Spin'],
           "Speed (MPH)" => $ss['Speed (MPH)'],
           "Point" => $ss['Point'],
           "Game" => $ss['Game'],
           "Set" => $ss['Set'],
           "Stroke" => $ss['Stroke'],
           "Bounce Depth" => $ss['Bounce Depth'],
           "Bounce Zone" => $ss['Bounce Zone'],
           "Bounce Side" => $ss['Bounce Side'],
           "Bounce (x)" => $ss['Bounce (x)'],
           "Bounce (y)" => $ss['Bounce (y)'],
           "Hit Depth" => $ss['Hit Depth'],
           "Hit Zone" => $ss['Hit Zone'],
           "Hit Side" => $ss['Hit Side'],
           "Hit (x)" => $ss['Hit (x)'],
           "Hit (y)" => $ss['Hit (y)'],
           "Hit (z)" => $ss['Hit (z)'],
           "Direction" => $ss['Direction'],
           "Result" => $ss['Result'],
           "Favorited" => $ss['Favorited'],
           "Start Time" => $ss['Start Time'],
           "Video Time" => $ss['Video Time']
	  ));
  }
 }
 return $playerdata;
}

function ralliesdata(){
 $file = fopen("rallies_file.csv", "r"); // opens the file "example.txt" for reading
 if ($file) { // check if the file was opened successfully
  $contents = fread($file, filesize("rallies_file.csv")); // read the contents of the file
  fclose($file); // close the file handle
 }
 
 $lines = preg_split("/\n/", $contents);
 /*
 $headers = preg_split("/,/", $lines[0]);
 foreach($headers as $key => $value){
  echo '"'.$value .'"=>$ll['. $key.']<br>'; 
 }
 */
  
 $rallies = array();
 for($i=1;$i<count($lines)-1;$i++){
 $ll = preg_split("/,/", $lines[$i]);
 array_push($rallies, array(
	"Rally"=>$ll[0],
 	"Favorited"=>$ll[1],
 	"Start Time"=>$ll[2],
 	"Video Time"=>$ll[3],
	"Duration"=>$ll[4]
 ));
 }
 return $rallies;
}


function shotsdata(){
 $file = fopen("shots_file.csv", "r"); // opens the file "example.txt" for reading
 if ($file) { // check if the file was opened successfully
  $contents = fread($file, filesize("shots_file.csv")); // read the contents of the file
  fclose($file); // close the file handle
 }

 $lines = preg_split("/\n/", $contents);
 $headers = preg_split("/,/", $lines[0]);
 $shots = array();
for($i=1; $i<count($lines)-1; $i++){
  $ll = $lines[$i]; 
  $lll = preg_split("/,/", $ll);
  $gg = array(
  "Player" => $lll[0],
  "Shot" => $lll[1],
  "Type" => $lll[2],
  "Stroke" => $lll[3],
  "Spin" => $lll[4],
  "Speed (MPH)" => $lll[5],
  "Point" => $lll[6],
  "Game" => $lll[7],
  "Set" => $lll[8],
  "Bounce Depth" => $lll[9],
  "Bounce Zone" => $lll[10],
  "Bounce Side" => $lll[11],
  "Bounce (x)" => $lll[12],
  "Bounce (y)" => $lll[13],
  "Hit Depth" => $lll[14],
  "Hit Zone" => $lll[15],
  "Hit Side" => $lll[16],
  "Hit (x)" => $lll[17],
  "Hit (y)" => $lll[18],
  "Hit (z)" => $lll[19],
  "Direction" => $lll[20],
  "Result" => $lll[21],
  "Favorited" => $lll[22],
  "Start Time" => $lll[23],
  "Video Time" => $lll[24]
  );
 array_push($shots, $gg);
}
return $shots;
}

?>
