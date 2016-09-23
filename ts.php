<?php 

function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>json test</title>
</head>

<body>

<?php 
  $jsondata = file_get_contents('nono.json');
  $data = json_decode($jsondata, true);
  debug_to_console($data);
  $strips = $data['strips'];
  echo '<ul>';
  foreach ($strips as $strip) {
    $strip_name = $strip['name'];
    echo '<li>'.$strip_name.'</li>';
  }
  echo '</ul>';
?>


</body>
</html>
