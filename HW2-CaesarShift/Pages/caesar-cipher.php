<?php
    $message = @$_POST['message'];
    $key = @$_POST['key']; 
    $modifiedMsg = @strtoupper($message);
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
      
      <style>
        .inputMsg, .inputKey{
            width: 50%; 
            border: 0;
            outline: 0;
            background: transparent;
            border-bottom: 1px solid white;

            color: white; 
        }

        .inputKey{   
            width: 25%; 
        }
          
      </style>
  </head>
    
  <body>
    <div class="container">
        <h1 class="text-header">Caesar Shift</h1>
        
        <div class="dataSection">
            <div class="inputSection">
                <form name="form" action="" method="post">
                    <br>
                    <label for="message" class="txtLabel">Message</label>
                    <br><input type="text" name="message" placeholder="Please input a string" class="inputMsg" required 
                               value="<?php echo $modifiedMsg ?>">
                    
                    <br><br>
                    <label for="quantity" class="txtLabel">Key</label>
                    <br><input type="number" name="key" min="1" placeholder="e.g. 1" class="inputKey" required 
                               value="<?php echo $key ?>">
                    
                    <br><br>
                    <div class="submitArea">
                        <td colspan="2" ><button type="submit" class="button">SUBMIT</button></td>
                    </div>
                </form>
            </div>
            
        
            <div class="outputSection">
                    <?php
                        
                        $msgArray = str_split($modifiedMsg); 
                        //echo $msgArray[1]; 
                               
                        $numOfLetters = count($msgArray); 
                        //echo $numOfLetters; 
                        
                        echo '<span class="txtLabel">Result: </span>';
                        for ($i = 0; $i < $numOfLetters; $i++) 
                        {
                            for ($j = 0; $j < $key; $j++) {
                                if ($msgArray[$i] == 'Z') {
                                    $msgArray[$i] = 'A';
                                } 
                                
                                else {
                                    $msgArray[$i]++;
                                }
                            }
                            echo '<span class="txtLabel">'.$msgArray[$i].'  </span>';
                        }
                    ?>

            </div>
            
        </div>
    </div>
    
  </body>
</html>