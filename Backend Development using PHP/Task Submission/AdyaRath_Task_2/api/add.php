<?php 

session_start();$_SESSION['add']=0;
$url=$_GET["url"];
    if (isset($_POST['submit'])) { 
  
        $quotes  = $_POST['quote'];
        $category  = $_POST['category'];
       
  $file = file_get_contents('quotes.json');
  $data = json_decode($file, true);
 
 if($category=="inspirational"){
     
    $count1=count($data->inspirational);
    $jsonfile1=$data->inspirational;
$_POST['id']= strval((int)($jsonfile1[$count1-1]->id)+1);
  $data["inspirational"] = array_values($data["inspirational"]);
  array_push($data["inspirational"], $_POST);
  file_put_contents("quotes.json", json_encode($data));
  $_SESSION['add']=1;
  header("Location:".$url);
    }
    else if($category=="funny"){
        $count1=count($data->funny);
        $jsonfile1=$data->funny;
    $_POST['id']=strval((int)($jsonfile1[$count1-1]->id)+1);
        $data["funny"] = array_values($data["funny"]);
  array_push($data["funny"], $_POST);
  file_put_contents("quotes.json", json_encode($data));
  $_SESSION['add']=1;
  header("Location:".$url);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
 <title>Create DATA</title>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
 <style>
 .container{
     margin-top:20px;
 }
 </style>
</head>
<body>

<div class="container">
        <div class="row">
  <div class="mb-3"><h3>Create a Quote</h3>
        <form method="POST" action="">
   <div class="form-group">
   <input type="hidden" class="form-control"  name="id" >
    <label for="inputquote">Quote</label>
    <input type="text" class="form-control" required="required" id="inputquote" name="quote" placeholder="Enter quote">
   
   </div><br>
   
   <label for="select" class="form-label">Choose category</label>
<select class="form-select" name="category" id="select" aria-label="Default select example" required="required">
  <option selected disabled value="">Category</option>
  <option value="inspirational">Inspirational</option>
  <option value="funny">Funny</option>
    </select><br>
   <div class="form-actions">
     <button type="submit" name="submit" value="success" class="btn  btn-success">Create</button>
    <a  href="<?php echo $url; ?>"class="btn btn-danger" >Back</a>
  </form>
        </div></div>        
</div>
</body>
</html>