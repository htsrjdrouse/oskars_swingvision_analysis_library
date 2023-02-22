<? include('SwingVision.csv.parser.php');?>
<?
$rallies = ralliesdata();
$shots = shotsdata();
$myshotsA = myshots($shots,"Me");
$myshotsB = myshots($shots,"Ball Machine");
?>
<table>
<tr valign=top>
<? shotdisplay("Oskar R",20,"Ball Machine",5, $myshotsA, $myshotsB); ?>
</tr>


</table>
<br>

