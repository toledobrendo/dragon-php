<?php
    function getVatRate(){
        $propertyFile = fopen($_SERVER['DOCUMENT_ROOT'].'/resources/properties.txt','r') or die("File not found!"); //r = Open a file for read only. File pointer starts at the beginning of the file
        $propertyArray = array();
        while(!feof($propertyFile)){
            //Negated Set, anything not 0-9 AND period will be removed
            array_push($propertyArray,preg_replace('/[^0-9.]/','',fgets($propertyFile)));
        }
        fclose($propertyFile);
        //Since we only have one data line in the file, implode it to turn it into a single variable instead of an array
        return implode($propertyArray); 
    }
?>