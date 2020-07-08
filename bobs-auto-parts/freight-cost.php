<?php require_once('view/header.php') ?>
          <!-- //============================ -->
          <h1>FREIGHT COST</h1>
                <!-- //=================================== -->
                <table class="table">
                  <thead>
                    <tr class="row">
                      <th class="col-3">Distance</th>
                      <th class="col-3">Cost</th>
                    </tr>
                  </thead>
                    <tbody>
                      <?php
                        $distance =50;
                        while($distance <=250){
                          echo '<tr class= "row">
                            <td class= "col-3">'.$distance.' Meters </td>
                            <td class= "col-3">'.($distance/10).'</td>
                          </tr>';

                          $distance +=50;
                        }

                        // DOWHILE LOOP
                        for ($distance = 300; $distance <= 500; $distance +=50){
                          echo '<tr class= "row">
                            <td class= "col-3">'.$distance.' Meters </td>
                            <td class= "col-3">'.($distance/10).'</td>
                          </tr>';
                        }

                        $distance =500;
                        do{
                          echo '<tr class= "row">
                            <td class= "col-3">'.$distance.' Meters </td>
                            <td class= "col-3">'.($distance/10).'</td>
                          </tr>';

                          $distance +=50;
                        }while ($distance>=750)

                      ?>
                    </tbody>
                </table>
                <!-- //=================================== -->
<?php require_once('view/footer.php') ?>
