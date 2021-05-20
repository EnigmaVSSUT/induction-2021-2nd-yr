<?php
session_start();$_SESSION['update']=0;

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $category=$_GET["cat"];
   
    $getfile = file_get_contents('quotes.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile[$category];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $category=$_POST["category"];
    $getfile = file_get_contents('quotes.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all[$category];
    $jsonfile = $jsonfile[$id];
    
$post["id"]=strval($id);
    $post["quote"] = isset($_POST["quote"]) ? $_POST["quote"] : "";
    $post["category"] = $category;
  

    if ($jsonfile) {
        $_SESSION['update']=1;
         $url=$_REQUEST["url"];
        unset($all[$category][$id]);
        $all[$category][$id] = $post;
        $all[$category] = array_values($all[$category]);
        file_put_contents("quotes.json", json_encode($all));
        header("Location:".$url);
    }
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="tutorial-boostrap-merubaha-warna">
 <meta name="author" content="ilmu-detil.blogspot.com">
 <title>Update quotes </title>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
 
 <style type="text/css">
 .navbar-default {
  background-color: #3b5998;
  font-size:18px;
  color:#ffffff;
 }
 </style>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="row">
            <h3>Update a Quote</h3>
        </div>
            
        <?php if (isset($_GET["id"])): ?>
  <form method="POST" action="">
  <div class="mb-3">
   <input type="hidden" value="<?php echo $id ?>" name="id"/>
   <div class="form-group">
    <label for="quote">Quote</label>
    <input type="text" class="form-control" required="required" id="quote" value="<?php echo $jsonfile["quote"] ?>" name="quote" placeholder="Enter quote">
  
   </div>
   <div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" required="required" id="category" name="category">
    
    <option value="inspirational" <?php echo  $jsonfile["category"] == 'inspirational'?'selected':'';?>>Inspirational</option>
    <option value="funny" <?php echo $jsonfile["category"] == 'funny'?'selected':'';?>>Funny</option>
    </select>
  
   </div><br>
    
   <div class="form-actions">
    <button type="submit" name="update" class="btn btn-success">Update</button>
    <a class="btn btn btn-primary" href="index.php">Back</a>
   </div>
  </div>
  </form>
  <?php endif; ?>     
    </div> 
</div> 
</body>
</html>