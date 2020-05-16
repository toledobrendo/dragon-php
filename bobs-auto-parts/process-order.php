<?php require_once("service/Product.php") ?>
<?php require_once("view-comp/header.php") ?>
<?php require_once("service/order-service.php") ?>
          <h3 class="card-title">Order Result</h3>
          <?php
            echo "<p>Order Processed at ";
            echo date("H:i, jS F Y");
            echo "<p>";

            $product = array(
              new TireProduct(),
              new OilProduct(),
              new SparkPlugProduct()
            );

            $product[0]->setProductQty($_POST['tireQty']);
            $product[1]->setProductQty($_POST['oilQty']);
            $product[2]->setProductQty($_POST['sparkPlugsQty']);
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
            echo $product[0]->getProductQty()." tires<br/>";
            echo $product[1]->getProductQty()." bottle/s of oil<br/>";
            echo $product[2]->getProductQty()." number of spark plug/s<br/><br/>";

            echo "<p>Prices<br/>";
            echo "Tires: ".$product[0]->getProductPrice()."<br/>";
            echo "Oil: ".$product[1]->getProductPrice()."<br/>";
            echo "Spark Plugs: ".$product[2]->getProductPrice()."<br/><br/>";

            $totalQty = $product[0]->getProductQty() + $product[1]->getProductQty() + $product[2]->getProductQty();
            echo "Total number of items: $totalQty<br/>";
            if ($totalQty == 0) {
              echo "You did not order anything.<br/><br/>";
            } else {
              $tireAmount = $product[0]->getProductQty() * $product[0]->getProductPrice();
              $oilAmount = $product[1]->getProductQty() * $product[1]->getProductPrice();
              $sparkPlugsAmount = $product[2]->getProductQty() * $product[2]->getProductPrice();

              //'@' suppresses the warnings that may be created from a command.
              $totalAmount = (float) @($tireAmount + $oilAmount + $sparkPlugsAmount);
              $otherTotalAmount = &$totalAmount;
              //$otherTotalAmount += $tireAmount;
              echo "Total Amount: Php $totalAmount<br/>";
              //echo "Other Total Amount: Php $otherTotalAmount<br/>";

              echo "Amount exceed 500? ".($totalAmount > 500 ? "Yes" : "No")."<br/><br/>";

              @ define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);

              $VAT_VALUE = "";

              $file = @ fopen(DOCUMENT_ROOT."/dragon-php/bobs-auto-parts/resource/properties.txt", "rb");
              while(!feof($file)) {
                $property = fgets($file, 999);
                if ($property != "") {
                  $text = $property;
                }
              };

              for ($index=0; $index < strlen($text); $index++) {
                if(is_numeric($text[$index]) || $text[$index] == "."){
                  $VAT_VALUE = $VAT_VALUE.$text[$index];
                }
              }

              echo "<p>VAT_VALUE = ".$VAT_VALUE."</p>";

              $vatableAmount = $totalAmount / $VAT_VALUE;
              $valueAddedTax = $totalAmount - $vatableAmount;
              echo "VAT: Php $valueAddedTax<br/>";
              echo "VATable Amount: Php $vatableAmount<br/>";

              saveOrder($product[0]->getProductQty(), $product[1]->getProductPrice(), $product[2]->getProductQty(), $totalAmount);

              echo 'Is $totalAmount string?'.(is_string($totalAmount) ? 'Yes' : 'No').'<br/>';
              echo 'Is $totalAmount set?'.(isset($totalAmount) ? 'Yes' : 'No').'<br/>';
              unset($totalAmount);
              echo 'Is $totalAmount set?'.(isset($totalAmount) ? 'Yes' : 'No').'<br/>';
            }

            fclose($file);

          ?>
        </div>

        <div class="card-footer">
          <a class="btn btn-info" href="order-form.php">Go Back</a>
<?php require_once("view-comp/footer.php") ?>
