<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Order Form</h3>
                <form action="process-order.php" method="post">
                    <table class="table">
                        <thead>
                            <tr class="row">
                                <th class="col-5">Item</th>
                                <th class="col-4">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row">
                                <td class="col-5">Tires</td>
                                <td class="col-4"><input type="number" name="tireQty" maxlength="3" min="0" max="10" class="form-control"></td>
                            </tr>
                            <tr class="row">
                                <td class="col-5">Oil</td>
                                <td class="col-4"><input type="number" name="oilQty" maxlength="3" min="0" max="10" class="form-control"></td>
                            </tr>
                            <tr class="row">
                                <td class="col-5">Spark Plugs</td>
                                <td class="col-4"><input type="number" name="sparkQty" maxlength="3" min="0" max="10" class="form-control"></td>
                            </tr>
                            <tr class="row">
                                <td colspan="2" class="9">
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>