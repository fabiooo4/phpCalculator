<html>
<link rel="stylesheet" href="style.css">
<div class="main">
  <head> 
    <title>Calculator History</title>
  </head>
    
  <body class="mainBg">
    <h1 class="title">Cronologia</h1>
      <div class="center">
        <div>
          <!-- Result -->
          <p>
            <?php
              // print history from file "results.txt"
              $file = fopen("results.txt", "r");
              while(!feof($file)) {
                echo fgets($file) . "<br>";
              }
              fclose($file);

            ?>
          </p>
        </div>
        <div>
          <form action="calculator.php" method="post">
            <button class="buttonSecondary" type="submit" name="back" value="back">Indietro</button>
          </form>
        </div>
      </div>
  </body>
</div>
</html>