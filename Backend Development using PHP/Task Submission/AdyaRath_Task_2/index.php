
<?php  header("Content-Type: JSON");
session_start();
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quotes API</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>

</head>
<body> 
    <div class="alert alert-info container" style="margin-top:10px">
    <h5><?php $url1="https://adyarath.in/api/quote.php";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result=curl_exec($ch);
curl_close($ch);
echo $result;?>
</h5> </div> 
  <form  method="post">
<div class="container" style="background:lightgrey;padding:20px;">
 

<div class="mb-3" >
<a href="https://adyarath.in/api/add.php?url=<?php echo $url; ?>" class="btn btn-success" >Create</a><br><br>
  <label for="numquo" class="form-label">Number of Quotes</label>
  <input type="number" class="form-control" name="num" id="numquo" min="1" placeholder="Enter number of quotes" required>
</div>
<label for="select" class="form-label">Choose category</label>
<select class="form-select" name="cat" id="select" aria-label="Default select example" required>
  <option selected disabled value="">Category</option>
  <option value="inspirational">Inspirational</option>
  <option value="funny">Funny</option>
 
</select><br>
<div class="col-auto">
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</form><br><br><h5>
<h4> 
<?php

if(isset($_REQUEST['submit'])){
  $fields = array ('num' =>$_POST['num'],
'cat' => $_POST['cat'],'url'=>$url
);
header("Content-Type: JSON");
$url2="https://adyarath.in/api/read.php";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url2);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);

$result=curl_exec($ch);
curl_close($ch);
echo $result;
}
if(isset($_SESSION['flag'])){
  if($_SESSION['flag']==1)
  echo "<script>alert('Deleted Successfully!')</script>";
  $_SESSION['flag']=0;
}
 if(isset($_SESSION['update'])){
  if($_SESSION['update']==1)
  echo "<script>alert('Updated Successfully!')</script>";
  $_SESSION['update']=0;
}
 if(isset($_SESSION['add'])){
  if($_SESSION['add']==1)
  echo "<script>alert('Created Successfully!')</script>";
  $_SESSION['add']=0;
}

?>
</h4>
</body>
<style>
  
  </style>
</html>
