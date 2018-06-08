<!DOCTYPE html>
<html>
  <head>
    <title>Anagram Test</title>
  </head>


  <body>

    <h1>Anagram Test</h1>
   <p>Input two words to check if they are anagrams</p>
 
    <?php
       // define variables and set to empty values
       $arg1 = $arg2 = $output = $retc = "";
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $arg1 = test_input($_POST["arg1"]);
         $arg2 = test_input($_POST["arg2"]);
         exec("/usr/lib/cgi-bin/student3/anagramtestfinal " . $arg1 . " " . $arg2, $output, $retc); 
       }
       function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Arg1: <input type="text" name="arg1"><br>
      Arg2: <input type="text" name="arg2"><br>
      <input type="submit">
    </form>

    <?php
       echo "<h2>Your Input:</h2>";
       echo $arg1;
       echo "<br>";
       echo $arg2;
       echo "<br>";
       
       echo "<h2>Result</h2>";
       foreach ($output as $line) {
         echo $line;
         echo "<br>";
       }

     ?>
<li><a href="index.html">Home Page</a></li>
 
  </body>
</html>
