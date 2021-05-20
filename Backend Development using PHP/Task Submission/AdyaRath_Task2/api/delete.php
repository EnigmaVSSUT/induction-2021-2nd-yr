<?php
 
session_start();$_SESSION['flag']=0;
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $cat=$_GET["cat"];
     $url=$_GET["url"];
    $all = file_get_contents('quotes.json');
    $all = json_decode($all, true);
    if($cat=="inspirational"){
    $jsonfile = $all["inspirational"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["inspirational"][$id]);
        $all["inspirational"] = array_values($all["inspirational"]);
        file_put_contents("quotes.json", json_encode($all));
    }
   
    $_SESSION['flag']=1;
    header("Location:".$url);
   
   
}
else if($cat=="funny"){
    $jsonfile = $all["funny"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["funny"][$id]);
        $all["funny"] = array_values($all["funny"]);
        file_put_contents("quotes.json", json_encode($all));
    }
    $_SESSION['flag']=1;
    header("Location:".$url);
  
  
}

}