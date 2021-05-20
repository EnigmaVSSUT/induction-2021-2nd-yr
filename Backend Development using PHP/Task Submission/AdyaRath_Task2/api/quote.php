<?php $getfile = file_get_contents('./quotes.json');
$jsonfile = json_decode($getfile);
global $count;global $count1;
 $count=count($jsonfile->inspirational);
 $count1=count($jsonfile->funny);
echo '<b>Available quotes</b><br> Inspirational : '.$count.'&nbsp;Funny : '.$count1;
?>