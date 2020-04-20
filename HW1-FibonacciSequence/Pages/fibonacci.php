<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous">
      
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
        @font-face
        {
            font-family: shoreline; 
            src: url("../Fonts/Shorelines.otf");
        }

        @font-face
        {
            font-family: montserrat; 
            src: url("../Fonts/Montserrat-Regular.ttf");
        }
        
        body{
            background-color: black; 
        }
        
        .container{
            margin-top: 5%; 
            margin-bottom: 5%; 
            padding-bottom: 3%; 
            width: 90%;
            
            border: 1px solid white; 
        }
       
        .text-header{
            font-family: shoreline; 
            font-size: 50px; 
            color: white; 
            text-align: center; 
            margin: 3%; 
        }
        
        .dataSection{
            text-align: center; 
        }
        
        .inputSection{
            margin-bottom: 3%; 
        }
        
        .txtLabel{
            font-family: montserrat; 
            font-size: 100%; 
            text-align: center; 
            margin: 0; 
            color: white; 
            margin-right: 2%; 
        }
        
        input{
            font-family: montserrat; 
            color: black;

            padding-left: 1%; 
            margin-right: 2%; 
        }
        
        .string{   
            width: 50%; 
            border: 0;
            outline: 0;
            background: transparent;
            border-bottom: 1px solid white;

            color: white; 
        }
        
        .button{
            border: solid white;
            box-sizing: border-box;

            margin-top: 1%;
            padding-left: 2%; 
            padding-right: 2%; 

            background-color: transparent; 
            color: white; 
            font-family: montserrat; 
            font-size: 90%; 

            text-align:center;
        }

        .button:hover{
            color:black;
            background-color: white; 
        }

        .button:active{
            color:gray;
            background-color: white; 
            border-color:#BBBBBB;
        }
        
        .submitArea{
            margin-left: 35%; 
        }  
        
        .txtOutput{
            font-family: shoreline; 
            font-size: 100%; 
            text-align: center; 
            margin: 0; 
            color: white; 
            margin-right: 2%; 
        }


    </style>
  </head>
    
  <body>
    <!-- hello-world.php or hello_world.php -->
    <div class="container">
        <h1 class="text-header">Fibonacci Sequence</h1>
        
        <div class="dataSection">
            <div class="inputSection">
                <form name="form" action="" method="post">
                    <label for="quantity" class="txtLabel">Sequence Length</label>
                    <br><input type="number" name="length" min="1" placeholder="e.g. 1" class="string">
                    <div class="submitArea">
                        <td colspan="2" ><button type="submit" class="button">SUBMIT</button></td>
                    </div>
                </form>
            </div>
            
            
            <div class="outputSection">
                
                <table class="table">
                    <tbody>
                        <?php
                            $length = @$_POST['length'];
                            
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