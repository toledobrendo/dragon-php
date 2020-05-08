<?php require_once("model/Product.php") ?>
<?php require_once("view-comp/header.php") ?>
          <h3 class="card-title">Order Result</h3>
          <?php
            echo "<p>Order Processed at ";
            echo date("H:i, jS F Y");
            echo "<p>";

            $tireProduct = new TireProduct();
            $oilProduct = new OilProduct();
            $sparkPlugProduct = new SparkPlugProduct();

            $tireProduct->setProductQty($_POST['tireQty']);
            $oilProduct->setProductQty($_POST['oilQty']);
            $sparkPlugProduct->setProductQty($_POST['sparkPlugsQty']);
            $find = $_POST['find'];

            switch($find) {
              case 'regular':
                echo "Regular Customer<br/><br/>";
                break;
              case 'tv':
                echo "From TV Advertising.<br/><br/>";
                break;
              default:
                echo "unknown Customer";
                break;
            }

            echo "<p>Your order is as follows</p>";
            echo $tireProduct->getProductQty()." tires<br/>";
            echo $oilProduct->getProductQty()." bottle/s of oil<br/>";
            echo $sparkPlugProduct->getProductQty()." number of spark plug/s<br/><br/>";

            echo "<p>Prices<br/>";
            echo "Tires: ".$tireProduct->getProductPrice()."<br/>";
            echo "Oil: ".$oilProduct->getProductPrice()."<br/>";
            echo "Spark Plugs: ".$sparkPlugProduct->getProductPrice()."<br/><br/>";

            $totalQty = $tireProduct->getProductQty() + $oilProduct->getProductQty() + $sparkPlugProduct->getProductQty();
            echo "Total number of items: $totalQty<br/>";
            if ($totalQty == 0) {
              echo "You did not order anything.<br/><br/>";
            } else {
              $tireAmount = $tireProduct->getProductQty() * $tireProduct->getProductPrice();
              $oilAmount = $oilProduct->getProductQty() * $oilProduct->getProductPrice();
              $sparkPlugsAmount = $sparkPlugProduct->getProductQty() * $sparkPlugProduct->getProductPrice();

              //'@' suppresses the warnings that may be created from a command.
              $totalAmount = (float) @($tireAmount + $oilAmount + $sparkPlugsAmount);
              $otherTotalAmount = &$totalAmount;
              //$otherTotalAmount += $tireAmount;
              echo "Total Amount: Php $totalAmount<br/>";
              //echo "Other Total Amount: Php $otherTotalAmount<br/>";

              echo "Amount exceed 500? ".($totalAmount > 500 ? "Yes" : "No")."<br/><br/>";

              $vatableAmount = $totalAmount / 1.12;
              $valueAddedTax = $totalAmount - $vatableAmount;
              echo "VAT: Php $valueAddedTax<br/>";
              echo "VATable Amount: Php $vatableAmount<br/>";

              echo 'Is $totalAmount string?'.(is_string($totalAmount) ? 'Yes' : 'No').'<br/>';
              echo 'Is $totalAmount set?'.(isset($totalAmount) ? 'Yes' : 'No').'<br/>';
              unset($totalAmount);
              echo 'Is $totalAmount set?'.(isset($totalAmount) ? 'Yes' : 'No').'<br/>';
            }

          ?>
        </div>

        <div class="card-footer">
          <a class="btn btn-info" href="order-form.php">Go Back</a>
<?php require_once("view-comp/footer.php") ?>
