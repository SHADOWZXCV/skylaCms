<?php

function view($fname, $data = [], $thisController = null, $funcName = ''){
    include(TEMPLATE_PATH . "/" . $fname . ".view.php");
}