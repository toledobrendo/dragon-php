<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Fibonacci Sequence</title>
</head>

<body>
    <!-- hello-world.php or hello_world.php -->
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="row">
                            <th class="col-12">FIBONACCI SEQUENCE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="" method="post">
                            <tr class="row">
                                <td class="col-12">Sequence Length:</td>
                            </tr>
                            <tr class="row">
                                <td class="col-11">
                                    <input type="number" class="form-control" name="fibonacci" min="1" />
                                </td>
                                <td class="col-1">
                                    <button name="submit" type="submit"
                                        class="btn btn-primary float-right">SUBMIT</button>
                                </td>
                            </tr>
                        </form>
                        <tr class="row">
                            <?php
                                //decided to set this condition because it gives a warning onLoad()
                                if(isset($_POST['submit'])){
                                    $sequence = $_POST['fibonacci'] ? $_POST['fibonacci'] : 0;
                                    echo '<td class="col-12">Series Length: ' . $sequence . '</td>';
                                }
                            ?>
                        </tr>
                        <tr class="row">
                            <?php
                                //decided to set this condition because it gives a warning onLoad() like its brother
                                if (isset($_POST['submit'])) {

                                $sequence = $_POST['fibonacci'] ? $_POST['fibonacci'] : 0;
                                $fibonacci_1=0;
                                $fibonacci_2=1;

                                //Fibonacci logic -> fib(n)=fib(n-1)+fib(n-2)
                                for($i = 0; $i<$sequence; $i++){
                                    //self-reminder: dont print the other variables because no
                                    echo '<td class="col-1"> ' . $fibonacci_1 . '</td>';
                                    $fibonacci_3 = $fibonacci_1+$fibonacci_2;
                                    $fibonacci_1 = $fibonacci_2;
                                    $fibonacci_2 = $fibonacci_3;
                                }
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>