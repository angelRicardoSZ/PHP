<?php
$seconds = readline("Enter the time in seconds: ");

$hours =  (int) ($seconds / 3600);

$seconds =  (int) ($seconds % 3600);

$minutes = (int) ($seconds / 60);

$seconds = (int) ($seconds % 60);






echo "Son  $hours horas, $minutes minutos y $seconds segundos ";


echo "\n";