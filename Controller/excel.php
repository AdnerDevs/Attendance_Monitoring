<?php

header('Content-type: application/vnd.ms-excel');
header('Content-disposition: attatchment; filename = '.rand().'.xls');
echo $_GET['data'];