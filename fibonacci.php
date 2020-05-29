<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title></title>
</head>
<body>
	<div class="container">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Fibonacci Sequence</h3>
            <form action="" method="post">
                <!--INPUT-->
                <tr class="row">
                  <td class="col-10">
                    <p>Sequence Length</p>
                  </td>
                </tr>
                <tr class="row">
                  <td class="col-12">
                    <input type="number" name="input" class="col-10">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <?php
                        if(isset($_POST['submit'])) {
                          //Set Variables when submitted
                          $input = $_POST['input'];
                          echo "<p>Series Length: ";
                          echo " $input </p>";

                        //Functions
                              function Fibonacci($number){
                              // if and else if to generate first two numbers
                              if ($number == 0)
                                  return 0;
                              else if ($number == 1)
                                  return 1;

                              // Recursive Call to get the upcoming numbers
                              else
                                  return (Fibonacci($number-1) +
                                          Fibonacci($number-2));
                          }

                          //INPUT
                          for ($counter = 0; $counter < $input; $counter++){
                              echo Fibonacci($counter),str_repeat('&nbsp;', 5);
                          }


                        }
                      ?>
                  </td>
                </tr>
            </table>
            </form>
      </div>
    </div>
	</div>
</body>

<!--Functions-->




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
