<?php
    function isActive($page){
        return strpos($_SERVER['REQUEST_URI'],$page);
    }
?>