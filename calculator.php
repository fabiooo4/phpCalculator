<html>
<link rel="stylesheet" href="style.css">
<div class="main">
  <head> 
    <title>PHP Calculator</title>
  </head>
    
      <body class="mainBg">
        <h1 class="fontSize">Calcolatrice</h1>
            <div class="center">
              <div>
                <!-- Calculator -->
                <form action="calculator.php" method="post">
                  <input class="input" type="number" name="num1" placeholder="Numero 1">
                  <select class="input" name="operator">
                    <option></option>
                    <option>+</option>
                    <option>-</option>
                    <option>*</option>
                    <option>/</option>
                  </select>
                  <input class="input" type="number" name="num2" placeholder="Numero 2">
                  <br>
                  <button class="button" type="submit" name="submit" value="submit">Calcola</button>
                </form>
              </div>
              
              <div>
                <!-- Result -->
                <p class="result">
                  <?php
                    $result = "";
                    $operation = "";

                    if (isset($_POST['submit'])) {
                      $num1 = $_POST['num1'];
                      $num2 = $_POST['num2'];
                      $operator = $_POST['operator'];
                      
                      if(!empty($num1) && !empty($num2)) {
                        switch ($operator) {
                          case "":
                            echo "Seleziona un operatore";
                            break;
                          case "+":
                            $result = $num1 + $num2;
                            break;
                          case "-":
                            $result = $num1 - $num2;
                            break;
                          case "*":
                            $result = $num1 * $num2;
                            break;
                          case "/":
                            // catch exception if division by zero
                            try {
                              $result = $num1 / $num2;
                            } catch (DivisionByZeroError $e) {
                              echo "Non si può dividere per 0";
                            }
                            break;
                        }

                        $operation = $num1 . " " . $operator . " " . $num2 . " = " . $result;
                        echo $operation;

                        $myfile = fopen("results.txt", "a+") or die("Unable to open file!");
                        fwrite($myfile, $operation . "<br>" . "<br>");
                        fclose($myfile);
                      } else {
                        echo "Inserisci i numeri";
                      }
                    }
                  ?>
                </p>
              </div>
              <div>
                <!-- History -->
                <form action="history.php" method="post">
                  <button class="button" type="submit" name="history" value="history">Cronologia</button>
                </form>
              </div>
              
            </div>
        </body>
</div>
</html>