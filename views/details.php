<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<head>

<style>

table

{

  margin:auto;
    width: 75% !important;

margin: auto;
    margin-top: 5%;
    text-align: center;
    font-weight: bold;
    padding: auto;
}


</style>

</head>

<body style="background-color: aliceblue;">

<?php




if (!$handler->connect())

  {

  die('Could not connect: ');

  }

 



 
  $id = isset($_GET["id"]) && is_numeric($_GET["id"]) ?  intval($_GET["id"]) : 0;


$result = $handler->get_record_by_id($id)[0];

//  echo(Key($result));
?>

<table border='1' class='table'>
<thead class='thead-dark'>
<th>details</th>
<th>image</th>
</thead>


<tr>

<td style="padding-top: 10%;" >
  <?php
  // var_dump($result["photo"]);
  foreach( $result as $key=>$val){
   
    
    if($key !="photo"){
    
    echo $key.":".$val."<br>";
    
    }}

  ?>
  </td>


<td><img  src=<?php echo "images/".$result["photo"];?>></td>


</tr>

</table>







</body>

</html>