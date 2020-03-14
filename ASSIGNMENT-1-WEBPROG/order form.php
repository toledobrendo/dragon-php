<!DOCTYPE html>
<html>
<head>
	<title>
		Order Form
	</title>
</head>
  <body>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Order Form</h3>
          <form action="process order.php" method="post">
            <table class="table">
              <thead>
                <tr class="row">
                  <td class="col-5">Item</td>
                  <td class="col-4">Quantity</td>
                </tr>
              </thead>
              <tbody>
                <tr class="row">
                  <td class="col-5">Tires</td>
                  <td class="col-4">
                    <input class="form control" type="number" name="tireQty" min="0">
                  </td>
                </tr>
                <tr class="row">
                  <td class="col-5">Oil</td>
                  <td class="col-4">
                    <input class="form control" type="number" name="oilQty" min="0">
                  </td>
                </tr>
                <tr class="row">
                  <td class="col-5">Spark Plugs</td>
                  <td class="col-4">
                    <input class="form control" type="number" name="sparkQty" min="0">
                  </td>
                </tr>
                <tr class="row">
                  <td colspan="2" class="col-9">
                  <button type="submit" class="btn btn-primary submit float-right" name="button">Submit</button>
                </td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"></script>
  </body>
</html>