<?php require_once("view-comp/header.php") ?>
          <h1 class="card-title">Freight Cost</h1>
          <table class="table">
            <thead>
              <tr class="row">
                <th class="col-3">Distance</th>
                <th class="col-3">Cost</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $distance = 50;
                while ($distance <= 250) {
                  echo '<tr class="row">
                          <td class="col-3">'.$distance.'</td>
                          <td class="col-3">'.($distance / 10).'</td>
                        </tr>';
                  $distance += 50;
                }
              ?>
            </tbody>
          </table>
<?php require_once("view-comp/footer.php") ?>
