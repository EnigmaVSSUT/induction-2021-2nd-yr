
<?php
require_once "database.php";  header("Content-Type: JSON");
$response=array();
if($conn){
	$num=$_REQUEST['num'];
    $cat=$_REQUEST['cat'];
	
	$sql="select *from data where category='$cat' ORDER BY RAND()
	limit $num ";
	$result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    if($count>0){
        if($result){
            header("Content-Type: JSON");
            $i=0;
            while($row=mysqli_fetch_assoc($result)){
    
    $response[$i]['Quote']=$row['quotes'];
    $response[$i]['Category']=$row['category'];
    $i++;
            }
          
       echo json_encode($response);
	
		}
    }
		else{
			echo json_encode(['status'=>true,'data'=>'no result found']);
		}
}



?>