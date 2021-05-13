
<?php require_once "database.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quotes API</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" ></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>

</head>
<body>
  <form  method="post">
<div class="container">
<div class="mb-3">
  <label for="numquo" class="form-label">Number of Quotes</label>
  <input type="number" class="form-control" name="num" id="numquo" placeholder="Enter number of quotes" min="1" max="10" required>
</div>
<label for="select" class="form-label">Choose category</label>
<select class="form-select" name="cat" id="select" aria-label="Default select example" required>
  <option selected>Category</option>
  <option value="Inspirational">Inspirational</option>
  <option value="funny">Funny</option>
 
</select><br>
<div class="col-auto">
    <button type="submit" name="submit" class="btn btn-primary">Show quotes</button>
  </div>
</div>
</form><br><br>
<h4> 
<?php
if(isset($_REQUEST['submit'])){
  $fields = array ('num' =>$_POST['num'],
'cat' => $_POST['cat'],
);
 
$url="https://adyarath.in/api.php";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);

$result=curl_exec($ch);
curl_close($ch);

header("Content-Type: JSON");
$result=json_decode($result);
$result=json_encode($result,JSON_PRETTY_PRINT);
echo 'The Quotes you were looking for:<br><br>';
echo '<pre>';
print_r( $result);


}
?>
</h4>
</body>
<style>
  .container{
    margin-top:20px;
    background:lightgrey;
    padding:10px;
  }
  </style>
</html>