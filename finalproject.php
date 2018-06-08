<!DOCTYPE html>
<html>
  <head>
    <title>Anagram Test</title>
  </head>


  <body>

    <h1>Anagram Test</h1>
   <p>Type in two words to test if they are anagrams</p>

    <?php
       // define variables and set to empty values
       $x = $y = $output = $retc = "";
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $x = test_input($_POST["x"]);
         $y = test_input($_POST["y"]);
         exec("/usr/lib/cgi-bin/student3/anagramfinal" . $x . " " . $y, $output, $retc); 
       }
       function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      First Word: <input type="text" name="x"><br>
      Second Word: <input type="text" name="y"><br>
      <input type="submit">
    </form>

    <?php
       echo "<h2>Your Input:</h2>";
       echo $x;
       echo "<br>";
       echo $y;
       echo "<br>";
       
       echo "<h2>C Program Output:</h2>";
       foreach ($output as $line) {
         echo $line;
         echo "<br>";
       }
       
      
     ?>
    
  </body>
</html>
