<?php
    $length = @$_POST['length'];
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous">
      
    <link rel="stylesheet" type="text/css" href="../CSS/index-stylesheet.css">
      
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"></script>
      
  </head>
    
  <body>
    <!-- hello-world.php or hello_world.php -->
    <div class="container">
        <h1 class="text-header">Fibonacci Sequence</h1>
        
        <div class="dataSection">
            <div class="inputSection">
                <form name="form" action="" method="post">
                    <label for="quantity" class="txtLabel">Sequence Length</label>
                    <br><input type="number" name="length" min="1" placeholder="e.g. 1" class="string" value="<?php echo $length ?>">
                    <div class="submitArea">
                        <td colspan="2" ><button type="submit" class="button">SUBMIT</button></td>
                    </div>
                </form>
            </div>
            
            
            <div class="outputSection">
                
                <table class="table">
                    <tbody>
                        <?php
//                          Note: Great design on this one
                            $num1 = 0;
                            $num2 = 1;
                            
                            if($length>0){
                                echo '<br><p class="txtLabel">Fibonacci Series of '.$length.'</p><br/>';
                            }
                            
                            echo '<label class="txtLabel">Series Length</label><br/>'; 
                            
                            for ($i = 1; $i <= $length; ++$i)
                            {
                                echo '<span class="txtOutput">'.$num1.' </span>';
                                $sumOfPrevTwo = $num1 + $num2;
                                $num1 = $num2;
                                $num2 = $sumOfPrevTwo;
                            }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    
  </body>
</html>