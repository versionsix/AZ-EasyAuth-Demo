<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    overflow-x: hidden;

    word-break: break-all;

}
</style>
</head>
<body>
<?php
echo 'Current PHP version: ' . phpversion();
?>
<br />
<?php
  // Only try parsing token if it exists
  if (null !== $_SERVER['HTTP_X_MS_TOKEN_AAD_ID_TOKEN']){
    // The JSON token is 
    $jwt_token_body = json_decode(base64_decode(explode(".",$_SERVER['HTTP_X_MS_TOKEN_AAD_ID_TOKEN'], 3)[1]));
   echo '<br />Unique_Name: ' . $jwt_token_body->unique_name;
   echo '<br />AD_Name: ' . $jwt_token_body->name;
   echo '<br />Roles: ' . (null !== $jwt_token_body->roles ? json_encode($jwt_token_body->roles) : 'NO ROLES DEFINED');
    //echo "test";
  } else {
    echo "no valid JWT token found.";
  }
  

?>

<br /><br />
<?php
  echo "myParameter1: " . getenv('SITE_MY_PARAMETER_1') . " </ br>";
  echo "myParameter2: " . getenv('SITE_MY_PARAMETER_2') . " </ br>";
?>



<br /><br />

<div id="" style="overflow:scroll; width: 800px; height:400px;">

<table style="width:100%">
  <tr>
    <th style="width:30%">Header</th>
    <th style="width:65%">Value</th> 
  </tr>
<?php
   while (list($var,$value) = each ($_SERVER)) {
      echo "<tr><td>$var </td><td><wbr> $value </wbr></td></tr>";
   }
?>
</table>
</div>
</body>
</html>
