<html>
    <head>
        <style>
          
        </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body >
    
    <div class="row justify-content-center mt-5">
   <div class="col-6">    
     <form class="bg-light p-5"  action="<?= $_SERVER['PHP_SELF']."?page=Additem"?>"  method="post" enctype="multipart/form-data">
  <?php
    $result = $handler->get_data();
    
echo "<table border='1' class='table'>";
echo "<thead><center><strong>Add New Item</strong></center></thead>";
foreach( $result[0] as $key=>$val){
   
    
if($key !="photo")
echo "<tr><td>".$key."</td><td><input name=".$key."></input></td><tr>";

}

echo "<tr><td>Image</td><td><input type='file' name='photo' id='file'></td><tr>";

echo "</table>";


        
  ?>
  <center><button id="submit" name="submit" type="submit" class="btn btn-info btn-dark">Submit</button></center>
</form>
   </div>
</div>
    
    </body>

</html>
<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $id=intval($_POST['id']);
    $product_code=$_POST['product_code'];	
    $product_name=$_POST['product_name'];	
    $list_price=floatval($_POST['list_price']);	
    $reorder_level=intval($_POST['reorder_level']);	
    $units_in_stock	=intval($_POST['units_in_stock']);
    $category=$_POST['category'];	
    $country=$_POST['country'];	
    $rating=floatval($_POST['rating']);	
    $discontinued=$_POST['discontinued'];	
    $date=strtotime($_POST['date']);	
    $photo= $_FILES['photo']['name'];
    $newval=array(
    "id"=>$id,
    "product_code"=>$product_code,
    "product_name"=>$product_name,
    "list_price"=>$list_price,
    "reorder_level"=>$reorder_level,
    "units_in_stock"=>$units_in_stock,
    "category"=>$category,
    "country"=>$country,
    "rating"=>$rating,
    "discontinued"=>$discontinued,
    "date"=>$date,
    "photo"=>$photo,
    );
if(!empty($_FILES)){
    
    move_uploaded_file($_FILES['photo']['tmp_name'],"images/$photo");}
       $handler->connect();
    $handler->save($newval);   
}
?>