<?php
$inputraw = $_POST['input'];
$keyraw = (int)$_POST['key'];
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous">
    <title>Caesar Shift</title>
  </head>
  <body>
    <div class="container">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">Caesar Shift</h1>
          <form class="" action="" method="post">
          <table class="table">
            <tbody>
              <tr class="row">
                <td class="col">
                  <label for="input">Message</label>
                </td>
              </tr>
              <tr class="row">
                <td class="col">
                  <input type="text" class="form-control" name="input" value="<?php echo $inputraw; ?>">
                </td>
              </tr>
              <tr class="row">
                <td class="col">
                  <label for="key">Key</label>
                </td>
              </tr>
              <tr class="row">
                <td class="col">
                  <input type="number" class="form-control" name="key" value="<?php echo $keyraw; ?>">
                </td>
              </tr>
              <tr class="row">
                <td class="col">
                  <label for="output">Result</label>
                </td>
              </tr>
              <tr class="row">
                <td class="col">
                  <input type="text" class="form-control" name="output" value="<?php
                  if($_POST['input'] && $_POST['key']) {
                    $input = strtolower($_POST['input']);
                    $key = (int)$_POST['key'] % 26;
                    $output = "";
                    for($i = 0; $i < strlen($input); $i++) {
                      if(ctype_alpha($input[$i])) {
                        $val = chr(ord($input[$i]) + $key);
                        $val = (ord($val) > 122) ? chr(ord($val) - 26) : $val;
                        $val = (ord($val) < 97) ? chr(ord($val) + 26) : $val;
                        $output .= $val;
                      } else {
                        $output .= $input[$i];
                      }
                    }
                    echo $output;
                  }
                  ?>" readonly>
                </td>
              </tr>
              <tr class="row">
                <td class="col">
                  <button type="submit" class="btn btn-primary submit" name="submit">Submit</button>
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
