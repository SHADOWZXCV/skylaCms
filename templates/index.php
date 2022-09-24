<?php

function view($fname, $data = [], $thisController = null, $funcName = ''){
    $isAdmin = (strpos($fname, "admin") !== false) ? "admin/" : "";

    include(TEMPLATE_PATH . "/" . $isAdmin . $fname . ".view.php");
}