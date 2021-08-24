<?php
// $date = new DateTime();
// echo $date->format('Y-m-d H:i:s');

require 'vendor/autoload.php';

use Carbon\Carbon;

$dt = Carbon::now();
echo $dt;