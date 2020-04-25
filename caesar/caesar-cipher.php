<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Caesar Shift</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="row">
                            <th class="col-12">
                                <h1>Caesar Shift</h1>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="" method="post">
                            <tr class="row">
                                <td class="col-12">Message</td>
                            </tr>
                            <tr class="row">
                                <td class="col-11">
                                    <input type="text" class="form-control" name="message" required />
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-12">Key</td>
                            </tr>
                            <tr class="row">
                                <td class="col-11">
                                    <input type="number" class="form-control" name="key" min="0" max="26" required />
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-12">
                                    <button name="submit" type="submit" class="btn btn-primary float-left">SUBMIT</button>
                                </td>
                            </tr>
                            <tr class="row">
                                <?php
                                //decided to set this condition because it gives a warning onLoad()
                                if (isset($_POST['submit'])) {
                                    $message = $_POST['message'] ? $_POST['message'] : 0;
                                    //make message an array
                                    $message = str_split(strtoupper($message));
                                    $key = $_POST['key'] ? $_POST['key'] : 0;

                                    //start of cipher block
                                    echo '<td class="col-12">RESULT: ';
                                    for ($i = 0; $i < count($message); $i++) {
                                        for ($j = 0; $j < $key; $j++) {
                                            //if needle is found
                                            if (array_search('Z', $message)) {
                                                $message[$i] = 'A';
                                            } else {
                                                $message[$i]++;
                                            }
                                        }
                                    }

                                    //output
                                    foreach ($message as $encrypted) {
                                        echo $encrypted;
                                    }
                                    echo '</td>';
                                    //end of cipher block
                                }
                                ?>
                            </tr>
                        </form>
                    </tbody>
                </table>
                <div class="card-footer">
                    <a class="btn btn-info" href="../index.php">Go Back</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>