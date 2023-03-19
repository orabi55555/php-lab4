<html>

<head>

<style>

table

{   margin:auto;
    width: 75% !important;
    margin-top: 10%;
    margin-bottom:2%;
    text-align: center;
    font-size: large;
    font-weight: bold;

}


</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body style="background-color: aliceblue;">

<?php

$current_index = isset($_GET["next"]) && is_numeric($_GET["next"]) ? $_GET["next"] : 0;




$next_index = ($current_index + __RECORDS_PER_PAGE__ < 16) ? $current_index + __RECORDS_PER_PAGE__ : 0;
$previous_index =($current_index - __RECORDS_PER_PAGE__ > 0) ? $current_index - __RECORDS_PER_PAGE__ : 0;
$result = $handler->get_data(["id","product_name"], $current_index);


if (!$handler->connect())

  {

  die('Could not connect: ');

  }

 



 



echo "<table border='1' class='table'>";
echo "<thead class='thead-dark'>";
foreach( $result[0] as $key=>$val){
   
    

echo "<th>".$key."</th>";



}

echo "<th>details</th></thead>";
 

foreach($result as $row)

  {

  echo "<tr>";

  echo "<td>" . $row['id'] . "</td>";

  echo "<td>" . $row['product_name'] . "</td>";

  echo   "<td><a href='" . $_SERVER["PHP_SELF"] . "?id=" . $row["id"] . "'> More </a></td> ";

  echo "</tr>";

  }

echo "</table>";




?>

<a  href ="<?php echo $_SERVER["PHP_SELF"] . "?next=" .$next_index; ?>" class="btn btn-dark stretched-link offset-4 ">next  </a>
<a href ="<?php echo $_SERVER["PHP_SELF"] . "?next=" .$previous_index; ?>" class="btn btn-dark stretched-link offset-1">  previous </a>
<a href ="<?php echo $_SERVER["PHP_SELF"] . "?page=Additem"; ?>" class="btn btn-dark stretched-link offset-1">  New item </a>

<center>
<form class=" my-5" action="<?php echo $_SERVER['PHP_SELF']."?id=id";?>" method='post' enctype='multipart/form-data'>
 <input></input>
 <a href ="<?php echo $_SERVER["PHP_SELF"] . "?id=id";?>" class='btn btn-info btn-dark'>Submit</a>
 </form>;
</center>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html> 
