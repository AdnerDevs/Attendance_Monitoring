<?php
header('Content-type: application/vnd.ms-excel');
header('Content-disposition: attachment; filename=' . rand() . '.xls');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    echo $_GET['data'];
}

