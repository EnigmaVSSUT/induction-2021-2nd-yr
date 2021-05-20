<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$html = curl_exec($ch);

$redirectedUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);

$num=$_REQUEST['num'];
$cat=$_REQUEST['cat'];
$url=$_REQUEST['url'];
$getfile = file_get_contents('quotes.json');
$jsonfile = json_decode($getfile);
echo '<div class="container">

 <div class ="row">
  <div class="col-md-12">
   <table class="table table-striped table-bordered table-hover">
    <tr>
     <th>No.</th>
     <th>Quotes</th>
     <th>Category</th>
     <th>Action</th>
    </tr>'; ?>  
     
    <?php  
    if($cat=="inspirational"){
      $count=count($jsonfile->inspirational);
      if($count>=$num){
    $no=0;
    foreach (array_slice($jsonfile->inspirational,rand(0,($count-$num)),$num)as $index=>$obj ): 
   
      $no++;
    echo '<tr>
     <td>'. $no. '</td>
     <td>'. $obj->quote. '</td>
     <td>'. $obj->category.'</td>
     <td><button type="submit" style="border:none;background:none;" name="edit" ">
     <a class="btn btn-xs btn-primary"  href="./api/update.php?id='. $index.'&&cat='.$obj->category.'&&url='.$url.'">Update</a></button>
      <button type="submit" style="border:none;background:none;" name="delete" ">
      <a class="btn btn-xs btn-danger" href="./api/delete.php?id='. $index.'&&cat='.$obj->category.'&&url='.$url.'">Delete</a></button>
     </td>
    </tr>';
    
    echo $redirectedUrl;
     endforeach;
    }
    else{
      echo "<script>alert('Try less number of quotes')</script>";
      header("Location: ../index.php");
    }
    
    }
     else if($cat=="funny"){
      $count1=count($jsonfile->funny);
      if($count1>=$num){
        $no=0;
        foreach (array_slice($jsonfile->funny,rand(0,($count1-$num)),$num)as $index=>$obj ): 
       
          $no++;
        echo '<tr>
         <td>'. $no. '</td>
         <td>'. $obj->quote. '</td>
         <td>'. $obj->category.'</td>
         <td><button type="submit" style="border:none;background:none;" name="edit" ">
     <a class="btn btn-xs btn-primary"  href="./api/update.php?id='. $index.'&&cat='.$obj->category.'&&url='.$url.'">Update</a></button>
      <button type="submit" style="border:none;background:none;" name="delete" ">
      <a class="btn btn-xs btn-danger" href="./api/delete.php?id='. $index.'&&cat='.$obj->category.'&&url='.$url.'">Delete</a></button>
     </td>
        </tr>';
        
        
         endforeach;
        }
        else{
           echo "<script>alert('Try less number of quotes')</script>";
           header("Location: ../index.php");
        }
        
     }
     echo
   '</table>
  </div> 
 </div>
</div>';


  


  


?>
