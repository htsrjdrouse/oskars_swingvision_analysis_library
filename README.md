# oskars_swingvision_analysis_library
This is php script that number crunches the shot data derived from the SwingVision app

If you export the .xlsx file out of the SwingVision app on your phone, this trick allows you to analyze the data using a webpage. Now you can do some good graphs and take specific snippets from the video (still need to figure that out).

First you need to convert the .xlsx file into csv files you do it by running the python package, xlsx2csv, (need to install using pip) like so:

<code>xlsx2csv -s 2 SwingVision-Ball_Machine_Practice-2023-02-12_at_22.46.02.xlsx shots_file.csv</code>
Then you dump this script on a webserver that runs PHP, this php code converts the csv into a JSON type format and these functions are used to do the number crunching which is now easy enough to graph it up.

An example of this code is posted at: http://boxa.labbot3dsystems.com/tennisdata/oskars.SwingVision.shot.datamodel.php

If you like this show some love and use our referral code if you still haven't up for SwingVision:
https://swing.tennis/r/ee4778c442f60bcf

Here is a link to the match: https://swing.tennis/matches/sw2-Nwjhejk
