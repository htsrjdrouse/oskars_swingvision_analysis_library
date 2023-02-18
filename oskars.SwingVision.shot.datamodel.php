<b> Oskar's SwingVision Data Model API</b>
<br>
If you export the .xlsx file out of the SwingVision app on your phone, this trick allows you to analyze the data using a webpage. Now you can do some good graphs and take specific snippets from the video (still need to figure that out). 
<br><br>
First you need to convert the .xlsx file into csv files you do it by running the python package, xlsx2csv, (need to install using pip) like so:
<br>
<pre>xlsx2csv -s 2 SwingVision-Ball_Machine_Practice-2023-02-12_at_22.46.02.xlsx shots_file.csv</pre>
Then you dump this script on a webserver that runs PHP, this php code converts the csv into a JSON type format and these functions are used to do the number crunching which is now easy enough to graph it up. 
<br><br>
An example of this code is posted at: http://boxa.labbot3dsystems.com/tennisdata/data.org.php
<br><br>
If you like this show some love and use our referral code if you still haven't up for SwingVision:<br>
<a href=>https://swing.tennis/r/ee4778c442f60bcf>https://swing.tennis/r/ee4778c442f60bcf</a>
<br><br>
<a href=https://swing.tennis/matches/sw2-Nwjhejk>https://swing.tennis/matches/sw2-Nwjhejk</a>
<br><br>
<?
$rallies = ralliesdata();
$shots = shotsdata();
$myshots = myshots($shots,"Me");
?>
<b>Forehand</b><br>
<?
shottypestats("Forehand", $myshots);
?>
<br>
<b>Backhand</b><br>
<?
shottypestats("Backhand", $myshots);
?>
<br>
<b>Serve</b><br>
<?
shottypestats("Serve", $myshots);
?>
<br>
<b>FH Volley</b><br>
<?
shottypestats("FH Volley", $myshots);
?>
<br>
<b>BH Volley</b><br>
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
 /*
 $stats = array("nodirection"=>count($nodirection), "downtheline"=>count($downtheline), "crosscourt"=>count($crosscourt));
 array_push($stats, array("down the T"=> count($downtheT)));
 array_push($stats, array("out wide"=> count($outwide)));
 array_push($stats, array("inside out"=> count($insideout)));
*/
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
 $param = array("Speed (MPH)","Hit (x)","Hit (y)","Hit (z)","Bounce (x)","Bounce (y)");
 //array_push($param, array("Bounce (x)","Bounce (y)"));

 foreach($param as $pp){
  $stats = maxminstats($shottype, $pp);
  $keys =	finddata($shottype, $stats['max'], $pp);
  echo '<br>'.$pp.'<br>';
  print_r($stats);
  echo "<br>";
  if ($pp == "Speed (MPH)"){
  echo "Max speed data point<br>";
  print_r($shottype[$keys[0]]);
  echo "<br>";
  }
 }
 $directionstats = direction($shottype);
 echo "<br>";
 echo "Shot direction";
 echo "<br>";
 print_r($directionstats);
 echo "<br>";
 $resultstats = result($shottype);
 echo "<br>";
 echo "Result";
 echo "<br>";
 print_r($resultstats);
 echo "<br>";
 
 $spinstats = spincount($shottype);
 echo "<br>";
 echo "Spin";
 echo "<br>";
 print_r($spinstats);
 echo "<br>";
 
 $bouncestats = bouncedepth($shottype);
 $hitstats = hitdepth($shottype);
 echo "<br>";
 echo "Bounce Depth";
 echo "<br>";
 print_r($bouncestats);
 echo "<br>";
 echo "Hit Depth";
 echo "<br>";
 print_r($hitstats);
 echo "<br>";


 $bouncestats = bouncezone($shottype);
 $hitstats = hitzone($shottype);
 echo "<br>";
 echo "Bounce Zone";
 echo "<br>";
 print_r($bouncestats);
 echo "<br>";
 echo "Hit Zone";
 echo "<br>";
 print_r($hitstats);
 echo "<br>";

 $bouncestats = bounceside($shottype);
 $hitstats = hitside($shottype);
 echo "<br>";
 echo "Bounce Side";
 echo "<br>";
 print_r($bouncestats);
 echo "<br>";
 echo "Hit Side";
 echo "<br>";
 print_r($hitstats);
 echo "<br>";

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
   "min"=>min($pp)
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
