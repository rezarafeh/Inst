<html>
  <head>
    <title>PHP Examples</title>
  </head>
  <body>
  
<?php
    $test = 10;
    //echo $test;
?>
<h1 id = "variable"> The value of variable is: </h1>

<script>
    let jstest = <?php echo $test; ?>;
    document.getElementById("variable").innerHTML = "The value of variable is: "+jstest;
    //alert(jstest);
</script>
</script>
</body>
</html>