<?php
                  class item {

                    private $itemName;
                    private $Qty;
                    private $name;
                    private $price;

                      public function __get($fieldName){
                        return $this->$fieldName;
                      }

                      public function __set($fieldName,$fieldValue){
                        $this->$fieldName = $fieldValue;
                      }

                  }

                  
                  $Tires = new item();
                  $Oil = new item();
                  $Sparkplugs = new item();
                  

                  $Tires->__set('itemName','Tires');
                  $Oil->__set('itemName','Oil');
                  $Sparkplugs->__set('itemName','Spark Plugs');

                  $Tires->__set('name','TiresQty');
                  $Oil->__set('name','OilQty');
                  $Sparkplugs->__set('name','SparkPlugsQty');

                  $Tires->__set('price',200);
                  $Oil->__set('price',100);
                  $Sparkplugs->__set('price',300);

                  $items = array($Tires, $Oil, $Sparkplugs);

?>